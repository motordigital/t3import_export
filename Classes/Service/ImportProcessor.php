<?php
namespace CPSIT\T3import\Service;

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
use CPSIT\T3import\Component\Converter\AbstractConverter;
use CPSIT\T3import\ConfigurableInterface;
use CPSIT\T3import\Domain\Model\Dto\DemandInterface;
use CPSIT\T3import\Component\PostProcessor\AbstractPostProcessor;
use CPSIT\T3import\Component\PreProcessor\AbstractPreProcessor;
use CPSIT\T3import\Domain\Model\ImportTask;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/**
 * Class ImportProcessor
 *
 * @package CPSIT\T3import\Service
 */
class ImportProcessor {
	/**
	 * Queue
	 * Records to import
	 *
	 * @var array
	 */
	protected $queue = [];

	/**
	 * @var PersistenceManager
	 */
	protected $persistenceManager;

	/**
	 * injects the persistence manager
	 *
	 * @param PersistenceManager $persistenceManager
	 */
	public function injectPersistenceManager(PersistenceManager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}

	/**
	 * gets the queue
	 *
	 * @return array
	 */
	public function getQueue() {
		return $this->queue;
	}

	/**
	 * builds the import queue
	 *
	 * @param \CPSIT\T3import\Domain\Model\Dto\DemandInterface
	 */
	public function buildQueue(DemandInterface $importDemand) {
		$tasks = $importDemand->getTasks();
		foreach ($tasks as $task) {
			/** @var ImportTask $task */
			$dataSource = $task->getSource();
			$recordsToImport = $dataSource->getRecords(
				$dataSource->getConfiguration()
			);
			$this->queue[$task->getIdentifier()] = $recordsToImport;
		}
	}

	/**
	 * Processes the queue
	 *
	 * @param \CPSIT\T3import\Domain\Model\Dto\DemandInterface
	 * @return array
	 */
	public function process(DemandInterface $importDemand) {
		$result = [];
		$tasks = $importDemand->getTasks();
		foreach ($tasks as $task) {
			/** @var ImportTask $task */
			if (!isset($this->queue[$task->getIdentifier()])) {
				continue;
			}
			$records = $this->queue[$task->getIdentifier()];

			if ((bool) $records) {
				foreach ($records as $record) {
					$this->preProcessSingle($record, $task);
					$convertedRecord = $this->convertSingle($record, $task);
					$this->postProcessSingle($convertedRecord, $record, $task);
					$target = $task->getTarget();
					if ($target instanceof ConfigurableInterface) {
						$config = $target->getConfiguration();
					}
					$target->persist($convertedRecord, $config);
					$result[] = $convertedRecord;
				}
				$this->processFinishers($records, $task);
			}
			$this->persistenceManager->persistAll();
		}

		return $result;
	}

	/**
	 * Pre processes a single record if any preprocessor is configured
	 *
	 * @param array $record
	 * @param ImportTask $task
	 */
	protected function preProcessSingle(&$record, $task) {
		$preProcessors = $task->getPreProcessors($task);
		foreach ($preProcessors as $preProcessor) {
			/** @var AbstractPreProcessor $preProcessor */
			$singleConfig = $preProcessor->getConfiguration();
			if (!$preProcessor->isDisabled($singleConfig, $record)) {
				$preProcessor->process($singleConfig, $record);
			}
		}
	}

	/**
	 * Post processes a single record if any post processor is configured
	 *
	 * @param mixed $convertedRecord
	 * @param array $record
	 * @param ImportTask $task
	 */
	protected function postProcessSingle(&$convertedRecord, &$record, $task) {
		$postProcessors = $task->getPostProcessors();
		foreach ($postProcessors as $singleProcessor) {
			/** @var AbstractPostProcessor $singleProcessor */
			$config = $singleProcessor->getConfiguration();
			if (!$singleProcessor->isDisabled($config, $record)) {
				$singleProcessor->process(
					$config,
					$convertedRecord,
					$record
				);
			}
		}
	}

	/**
	 * Converts a record into an object
	 *
	 * @param array $record Record which should be converted
	 * @param ImportTask $task Import type
	 * @return mixed The converted object
	 */
	protected function convertSingle($record, $task) {
		$convertedRecord = $record;
		$converters = $task->getConverters();
		foreach ($converters as $converter) {
			/** @var AbstractConverter $converter */
			$config = $converter->getConfiguration();
			if (!$converter->isDisabled($config)) {
				$convertedRecord = $converter->convert($convertedRecord, $config);
			}
		}

		return $convertedRecord;
	}

	/**
	 * Processes all finishers
	 *
	 * @param array $records Processed records
	 * @param ImportTask $task Import task
	 */
	protected function processFinishers($records, $task) {
	}

}
