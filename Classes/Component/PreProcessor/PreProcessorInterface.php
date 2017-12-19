<?php
namespace CPSIT\T3importExport\Component\PreProcessor;

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

use CPSIT\T3importExport\Domain\Model\TaskResult;

/**
 * Interface PreProcessorInterface
 */
interface PreProcessorInterface
{
    /**
     * @param array $configuration
     * @param array $record
     * @return bool
     */
    public function process($configuration, &$record);

    /**
     * @param array $configuration
     * @return bool
     */
    public function isConfigurationValid(array $configuration);

    /**
     * Tells if the component is disabled
     * @param array $configuration
     * @param array $record
     * @param TaskResult|\Iterator|array $result
     * @return mixed
     */
    public function isDisabled($configuration, $record = null, TaskResult $result = null);

    /**
     * Sets the configuration
     *
     * @param array $configuration
     * @return mixed
     */
    public function setConfiguration(array $configuration);

    /**
     * Returns the configuration
     *
     * @return array | null
     */
    public function getConfiguration();
}
