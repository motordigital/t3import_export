<?php
namespace CPSIT\T3import\Tests\Unit\Persistence;

use CPSIT\T3import\Persistence\DataSourceDB;
use CPSIT\T3import\Service\DatabaseConnectionService;
use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\Tests\UnitTestCase;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Dirk Wenzel <dirk.wenzel@cps-it.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class DataSourceDBTest
 *
 * @package CPSIT\T3import\Tests\Unit\Persistence
 * @coversDefaultClass \CPSIT\T3import\Persistence\DataSourceDB
 */
class DataSourceDBTest extends UnitTestCase {

	/**
	 * @var \CPSIT\T3import\Persistence\DataSourceDB
	 */
	protected $subject;

	/**
	 *
	 */
	public function setUp() {
		$this->subject = $this->getAccessibleMock(DataSourceDB::class,
			['dummy'], [], '', FALSE);

	}

	/**
	 * @test
	 * @covers ::injectDatabaseConnectionService
	 */
	public function injectConnectionServiceForObjectSetsConnectionService() {
		$expectedConnectionService = $this->getAccessibleMock(
			'CPSIT\\T3import\\Service\\DatabaseConnectionService',
			['dummy'], [], '', FALSE);
		$this->subject->injectDatabaseConnectionService($expectedConnectionService);

		$this->assertSame(
			$expectedConnectionService,
			$this->subject->_get('connectionService')
		);
	}

	/**
	 * @test
	 * @covers ::getRecords
	 */
	public function getRecordsInitiallyReturnsEmptyArray() {
		$configuration = ['foo'];
		$mockConnectionService = $this->getMock(
			DatabaseConnectionService::class
		);
		$mockDataBase = $this->getMock(
			DatabaseConnection::class, [], [], '', false
		);
		$this->subject->injectDatabaseConnectionService($mockConnectionService);
		$mockConnectionService->expects($this->once())
			->method('getDatabase')
			->will($this->returnValue($mockDataBase));
		$this->assertSame(
			[],
			$this->subject->getRecords($configuration)
		);
	}

	/**
	 * @test
	 * @covers ::getRecords
	 */
	public function getRecordsReturnsResultFromDB() {
		$configuration = [
			'fields' => 'foo',
			'table' => 'table',
			'where' => '',
			'groupBy' => '',
			'orderBy' => '',
			'limit' => '1'
		];
		$result = ['baz'];
		$mockConnectionService = $this->getMock(
			DatabaseConnectionService::class
		);
		$mockDataBase = $this->getMock(
			DatabaseConnection::class, ['exec_SELECTgetRows'], [], '', false
		);
		$this->subject->injectDatabaseConnectionService($mockConnectionService);
		$mockConnectionService->expects($this->once())
			->method('getDatabase')
			->will($this->returnValue($mockDataBase));
		$mockDataBase->expects($this->once())
			->method('exec_SELECTgetRows')
			->with(
				$configuration['fields'],
				$configuration['table'],
				$configuration['where'],
				$configuration['groupBy'],
				$configuration['orderBy'],
				$configuration['limit']
			)
			->will($this->returnValue($result));
		$this->assertSame(
			$result,
			$this->subject->getRecords($configuration)
		);
	}

	/**
	 * @test
	 * @covers ::getDatabase
	 */
	public function getDatabaseReturnsDatabaseFromConnectionService() {
		$identifier = 'foo';
		$this->subject->setIdentifier($identifier);
		$mockConnectionService = $this->getMock(
			DatabaseConnectionService::class, ['getDatabase'], [], '', false
		);
		$mockDataBase = $this->getMock(
			DatabaseConnection::class);
		$this->subject->injectDatabaseConnectionService($mockConnectionService);
		$mockConnectionService->expects($this->once())
			->method('getDatabase')
			->with($identifier)
			->will($this->returnValue($mockDataBase));

		$this->assertSame(
			$mockDataBase,
			$this->subject->getDatabase()
		);

	}
}