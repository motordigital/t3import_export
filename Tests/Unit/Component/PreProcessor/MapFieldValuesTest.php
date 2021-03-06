<?php
namespace CPSIT\T3importExport\Tests\Unit\Component\PreProcessor;

use TYPO3\CMS\Core\Tests\UnitTestCase;
use CPSIT\T3importExport\Component\PreProcessor\MapFieldValues;

/***************************************************************
 *  Copyright notice
 *  (c) 2015 Dirk Wenzel <dirk.wenzel@cps-it.de>
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

/**
 * Class GuessSeminarLanguageTest
 *
 * @package CPSIT\T3importExport\Tests\Service\PreProcessor
 * @coversDefaultClass \CPSIT\T3importExport\Component\PreProcessor\MapFieldValues
 */
class MapFieldValuesTest extends UnitTestCase
{

    /**
     * @var \CPSIT\T3importExport\Component\PreProcessor\MapFieldValues
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = $this->getAccessibleMock('CPSIT\\T3importExport\\Component\\PreProcessor\\MapFieldValues',
            ['dummy'], [], '', false);
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsInitiallyFalse()
    {
        $mockConfiguration = ['foo'];
        $this->assertFalse(
            $this->subject->isConfigurationValid($mockConfiguration)
        );
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsFalseIfFieldsIsNotArray()
    {
        $config = [
            'fields' => 'foo'
        ];
        $this->assertFalse(
            $this->subject->isConfigurationValid($config)
        );
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsFalseIfTargetFieldIsNotSet()
    {
        $config = [
            'fields' => [
                'foo' => ['bar']
            ]
        ];
        $this->assertFalse(
            $this->subject->isConfigurationValid($config)
        );
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsFalseIfTargetFieldIsNotString()
    {
        $config = [
            'fields' => [
                'foo' => [
                    'targetField' => 99
                ]
            ]
        ];
        $this->assertFalse(
            $this->subject->isConfigurationValid($config)
        );
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsFalseIfValuesIsNotSet()
    {
        $config = [
            'fields' => [
                'foo' => [
                    'targetField' => 'bar',
                ]
            ]
        ];
        $this->assertFalse(
            $this->subject->isConfigurationValid($config)
        );
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsFalseIfValuesIsNotArray()
    {
        $config = [
            'fields' => [
                'foo' => [
                    'targetField' => 'bar',
                    'values' => 'illegalStringValue'
                ]
            ]
        ];
        $this->assertFalse(
            $this->subject->isConfigurationValid($config)
        );
    }

    /**
     * @test
     * @covers ::isConfigurationValid
     */
    public function isConfigurationValidReturnsTrueForValidConfiguration()
    {
        $config = [
            'fields' => [
                'foo' => [
                    'targetField' => 'bar',
                    'values' => [
                        'baz' => 0
                    ]
                ]
            ]
        ];
        $this->assertTrue(
            $this->subject->isConfigurationValid($config)
        );
    }

    /**
     * provides data for testing process
     *
     * @return array
     */
    public function processDataProvider()
    {
        $configuration = [
            'fields' => [
                'foo' => [
                    'targetField' => 'foo',
                    'values' => [
                        'bar' => 'baz'
                    ]
                ]
            ]
        ];

        return [
            [
                //matching value is replaced
                $configuration,
                ['foo' => 'bar'],
                ['foo' => 'baz']
            ],
            [
                // non matching value is kept
                $configuration,
                ['foo' => 'boom'],
                ['foo' => 'boom']
            ]
        ];
    }

    /**
     * @test
     * @dataProvider processDataProvider
     * @param array $configuration
     * @param array $record
     * @param array $result
     */
    public function processMapsFieldValues($configuration, $record, $result)
    {
        $this->subject->process($configuration, $record);
        $this->assertEquals(
            $result,
            $record
        );
    }
}
