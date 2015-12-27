<?php
namespace CPSIT\T3import\Tests;

use CPSIT\T3import\IdentifiableTrait;
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
class IdentifiableTraitTest extends UnitTestCase {

	/**
	 * @var IdentifiableTrait
	 */
	protected $subject;

	public function setUp() {
		$this->subject = $this->getObjectForTrait(
			IdentifiableTrait::class, ['dummy']
		);
	}

	/**
	 * @test
	 */
	public function getIdentifierInitiallyReturnsNull() {
		$this->assertNull(
			$this->subject->getIdentifier()
		);
	}

	/**
	 * @test
	 */
	public function setIdentifierSetsIdentifier() {
		$identifier = 'foo';
		$this->subject->setIdentifier($identifier);
		$this->assertSame(
			$identifier,
			$this->subject->getIdentifier()
		);
	}
}