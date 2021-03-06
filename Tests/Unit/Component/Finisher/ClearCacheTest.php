<?php
namespace CPSIT\T3importExport\Tests\Unit\Component\Finisher;

use CPSIT\T3importExport\Component\Finisher\ClearCache;
use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\CacheService;

/***************************************************************
 *  Copyright notice
 *  (c) 2016 Dirk Wenzel <dirk.wenzel@cps-it.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class ClearCacheTest extends UnitTestCase
{
    /**
     * @var ClearCache
     */
    protected $subject;

    /**
     * Set up
     */
    public function setUp()
    {
        $this->subject = $this->getAccessibleMock(
            ClearCache::class, ['dummy']
        );
    }

    /**
     * @return mixed
     */
    protected function mockCacheService()
    {
        $mockCacheService = $this->getMock(
            CacheService::class, ['clearPageCache']
        );
        $this->subject->injectCacheService($mockCacheService);

        return $mockCacheService;
    }

    /**
     * @test
     */
    public function injectCacheServiceSetsObject()
    {
        $mockCacheService = $this->getMock(
            CacheService::class
        );
        $this->subject->injectCacheService($mockCacheService);

        $this->assertAttributeSame(
            $mockCacheService,
            'cacheService',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function processDoesNotClearCacheForEmptyResult()
    {
        $configuration = [];
        $records = ['foo'];
        $result = [];

        $mockCacheService = $this->mockCacheService();
        $mockCacheService->expects($this->never())
            ->method('clearPageCache');

        $this->subject->process($configuration, $records, $result);
    }

    /**
     * @test
     */
    public function processClearsAllCachesIfGlobalOptionIsset()
    {
        $configuration = [
            'all' => '1'
        ];
        $records = ['foo'];
        $nonEmptyResult = ['bar'];

        $mockCacheService = $this->mockCacheService();
        $mockCacheService->expects($this->once())
            ->method('clearPageCache')
            ->with(null);

        $this->subject->process($configuration, $records, $nonEmptyResult);
    }

    /**
     * @test
     */
    public function processClearsSelectedPagesCachesIfGlobalOptionIsset()
    {
        $configuration = [
            'pages' => '1,5,7'
        ];
        $records = ['foo'];
        $nonEmptyResult = ['bar'];
        $expectedPagesToClear = GeneralUtility::intExplode(
            ',', $configuration['pages'], true
        );
        $mockCacheService = $this->mockCacheService();
        $mockCacheService->expects($this->once())
            ->method('clearPageCache')
            ->with($expectedPagesToClear);

        $this->subject->process($configuration, $records, $nonEmptyResult);
    }

    /**
     * @test
     */
    public function processClearsAllCachesIfResultClassMatchesConfiguration()
    {
        $configuration = [
            'classes' => [
                'stdClass' => [
                    'all' => '1'
                ]
            ]
        ];
        $records = ['foo'];
        $nonEmptyResult = [
            new \stdClass()
        ];

        $mockCacheService = $this->mockCacheService();
        $mockCacheService->expects($this->once())
            ->method('clearPageCache')
            ->with(null);

        $this->subject->process($configuration, $records, $nonEmptyResult);
    }

    /**
     * @test
     */
    public function processClearsSelectedPageCachesIfResultClassMatchesConfiguration()
    {
        $configuration = [
            'classes' => [
                'stdClass' => [
                    'pages' => '1,5,7'
                ]
            ]
        ];
        $expectedPagesToClear = GeneralUtility::intExplode(
            ',', $configuration['classes']['stdClass']['pages'], true
        );

        $records = ['foo'];
        $nonEmptyResult = [
            new \stdClass()
        ];

        $mockCacheService = $this->mockCacheService();
        $mockCacheService->expects($this->once())
            ->method('clearPageCache')
            ->with($expectedPagesToClear);

        $this->subject->process($configuration, $records, $nonEmptyResult);
    }

    /**
     * @test
     */
    public function isConfigurationValidAlwaysReturnsTrue()
    {
        $configuration = [];
        $this->assertTrue(
            $this->subject->isConfigurationValid($configuration)
        );
    }

    /**
     * @test
     */
    public function processSkipsIfResultClassDoesNotMatch()
    {
        $configuration = [
            'classes' => [
                'NonMatchingClassName' => [
                    'pages' => '1,5,7'
                ]
            ]
        ];

        $records = ['foo'];
        $nonEmptyResult = [
            new \stdClass()
        ];

        $mockCacheService = $this->mockCacheService();
        $mockCacheService->expects($this->never())
            ->method('clearPageCache');

        $this->subject->process($configuration, $records, $nonEmptyResult);
    }
}
