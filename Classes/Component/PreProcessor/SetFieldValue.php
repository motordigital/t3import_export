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

/**
 * Class SetFieldValue
 * Sets the value of a field to a new value from configuration
 *
 * @package CPSIT\T3importExport\Component\PreProcessor
 */
class SetFieldValue
    extends AbstractPreProcessor
    implements PreProcessorInterface
{

    /**
     * Tells whether $configuration is valid
     * $configuration must contain a key 'targetField'
     * and a key 'value'
     * Example:
     * configuration {
     *   targetField = foo
     *   value = bar
     * }
     *
     * @param array $configuration
     * @return bool
     */
    public function isConfigurationValid(array $configuration)
    {
        if (!isset($configuration['targetField'])) {
            return false;
        }
        if (!is_string($configuration['targetField'])) {
            return false;
        }
        if (!isset($configuration['value'])) {
            return false;
        }

        return true;
    }

    /**
     * Sets the value of target field to the value from
     * configuration
     *
     * @param array $configuration
     * @param array $record
     * @return bool
     */
    public function process($configuration, &$record)
    {
        $record[$configuration['targetField']] = $configuration['value'];

        return true;
    }
}
