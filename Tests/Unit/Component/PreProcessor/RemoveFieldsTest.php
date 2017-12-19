<?php
namespace CPSIT\T3importExport\Tests\Unit\Component\PreProcessor;

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
use TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class RemoveFieldsTest
 *
 * @coversDefaultClass \CPSIT\T3importExport\Component\PreProcessor\RemoveFields
 */
class RemoveFieldsTest extends UnitTestCase
{
    /**
     * @var \CPSIT\T3importExport\Component\PreProcessor\RemoveFields
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = $this->getAccessibleMock('CPSIT\\T3importExport\\Component\\PreProcessor\\RemoveFields',
            ['dummy'], [], '', false);
    }

    /**
     * @test
     */
    public function configurationContainsIllegalStructure()
    {
        $testConfig = [
            'fields' => [
                'myStuff' => 'fooBar',
                'children' => [],
                'otherStuff' => 2
            ]
        ];

        $this->assertFalse(
            $this->subject->isConfigurationValid($testConfig)
        );
    }

    /**
     * @test
     */
    public function isConfigurationValidReturnsTrueForValidNestedConfiguration()
    {
        $testConfig = [
            'fields' => [
                'FieldC' => true,
                'children' => [
                    'fieldB' => true,
                    'children' => [
                        'fieldA' => true
                    ]
                ]
            ]
        ];

        $this->assertTrue(
            $this->subject->isConfigurationValid($testConfig)
        );
    }

    /**
     * @test
     */
    public function isConfigurationValidReturnsFalseForEmptyConfiguration()
    {
        $testConfig = [];

        $this->assertFalse(
            $this->subject->isConfigurationValid($testConfig)
        );
    }

    /**
     * @test
     */
    public function isConfigurationValidReturnsFalseIfFieldsIsNotArray()
    {
        $invalidConfig = [
            'fields' => 'foo'
        ];

        $this->assertFalse(
            $this->subject->isConfigurationValid($invalidConfig)
        );
    }

    /**
     * @test
     */
    public function processWithValidConfig()
    {
        $testConfig = [
            'fields' => [
                'foo' => true,
                'otherFields' => true,
                'notExistingField' => true,
                'staticArray' => [
                    'subField' => true
                ],
                'multiChildrenField' => [
                    'children' => [
                        'foo' => true,
                        'subMultiChildrenField' => [
                            'children' => [
                                'foo' => true
                            ]
                        ],
                        'staticField' => [
                            'foo' => true
                        ]
                    ]
                ]
            ]
        ];

        $testData = [
            'constField' => 'Dur',
            'foo' => 'bar',
            'otherFields' => [
                'subField' => 123
            ],
            'staticArray' => [
                'subField' => 'a',
                'keepField' => 'a'
            ],
            'multiChildrenField' => [
                [
                    'foo' => 'bar',
                    'keepField' => 'a',
                    'staticField' => [
                        'keepField' => 'a',
                        'foo' => 'bar'
                    ],
                    'subMultiChildrenField' => [
                        [
                            'foo' => 'bar',
                            'keepField' => 'a'
                        ],
                        [
                            'foo' => 'bar',
                            'keepField' => 'a'
                        ]
                    ]
                ],
                [
                    'foo' => 'bar',
                    'keepField' => 'a',
                    'staticField' => [
                        'keepField' => 'a',
                        'foo' => 'bar'
                    ]
                ]
            ]
        ];

        $expectedResult = [
            'constField' => 'Dur',
            'staticArray' => [
                'keepField' => 'a'
            ],
            'multiChildrenField' => [
                [
                    'keepField' => 'a',
                    'staticField' => [
                        'keepField' => 'a',
                    ],
                    'subMultiChildrenField' => [
                        [
                            'keepField' => 'a'
                        ],
                        [
                            'keepField' => 'a'
                        ]
                    ]
                ],
                [
                    'keepField' => 'a',
                    'staticField' => [
                        'keepField' => 'a',
                    ],
                ]
            ]
        ];

        $this->assertTrue(
            $this->subject->isConfigurationValid($testConfig)
        );

        $this->subject->process($testConfig, $testData);
        $this->assertEquals($expectedResult, $testData);
    }
}
