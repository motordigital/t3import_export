<?php

namespace CPSIT\T3importExport\Component\Finisher;

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

use CPSIT\T3importExport\ConfigurableInterface;
use CPSIT\T3importExport\Domain\Model\Dto\FileInfo;
use CPSIT\T3importExport\Domain\Model\TaskResult;
use CPSIT\T3importExport\Resource\ResourceFactoryTrait;
use CPSIT\T3importExport\Resource\ResourceStorageTrait;
use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * Class WriteFileFromStream
 */
class WriteFile extends AbstractFinisher implements FinisherInterface, ConfigurableInterface
{
    use ResourceFactoryTrait, ResourceStorageTrait;

    /**
     * Tells whether the given configuration is valid
     *
     * @param array $configuration
     * @return bool
     */
    public function isConfigurationValid(array $configuration)
    {
        if (
            empty($configuration)
            ||
            (
                isset($configuration['target'])
                && is_array($configuration['target'])
                && (empty($configuration['target']['name']) || !is_string($configuration['target']['name'])))
        ) {
            return false;
        }
        if (!empty($configuration['target']['storage']) && !MathUtility::canBeInterpretedAsInteger($configuration['target']['storage'])) {
            return false;
        }
        if (!empty($configuration['target']['directory']) && !is_string($configuration['target']['directory'])) {
            return false;
        }

        return true;
    }

    /**
     *
     * @param array $configuration
     * @param array $records
     * @param array $result
     * @return bool
     */
    public function process($configuration, &$records, &$result)
    {
        if (
        !($result instanceof TaskResult && $result->getInfo() instanceof FileInfo)
        ) {
            return false;
        }

        /** @var FileInfo $fileInfo */
        $fileInfo = $result->getInfo();

        if (!empty($configuration['target']['storage'])) {
            $storage = $this->resourceFactory->getStorageObject((int)$configuration['target']['storage']);
        } else {
            $storage = $this->resourceFactory->getDefaultStorage();
        }

        return true;
    }
}
