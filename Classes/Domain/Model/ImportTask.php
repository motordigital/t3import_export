<?php
namespace CPSIT\T3import\Domain\Model;

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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class ImportTask
 * An import task describes an import from one source to one class
 *
 * @package CPSIT\T3import\Domain\Model
 */
class ImportTask extends AbstractEntity {

	/**
	 * Unique identifier for the task
	 *
	 * @var string
	 */
	protected $identifier;

	/**
	 * Target class name
	 *
	 * @var string
	 */
	protected $targetClass;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}

	/**
	 * @param string $identifier
	 */
	public function setIdentifier($identifier) {
		$this->identifier = $identifier;
	}

	/**
	 * @return string
	 */
	public function getTargetClass() {
		return $this->targetClass;
	}

	/**
	 * @param string $targetClass
	 */
	public function setTargetClass($targetClass) {
		$this->targetClass = $targetClass;
	}
}