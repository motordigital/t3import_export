<?php
namespace CPSIT\T3importExport\Component\PreProcessor;

use CPSIT\T3importExport\Component\AbstractComponent;
use TYPO3\CMS\Extbase\Service\TypoScriptService;
use TYPO3\CMS\Frontend\ContentObject\AbstractContentObject;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

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
abstract class AbstractPreProcessor extends AbstractComponent
{
    /**
     * @param array $configuration
     * @param array $record
     * @return bool
     */
    abstract public function process($configuration, &$record);

    /**
     * Tells whether a given configuration is valid
     * Override this method in order to perform validation of
     * configuration
     *
     * @param array $configuration
     * @return bool
     */
    public function isConfigurationValid(array $configuration)
    {
        return true;
    }
}
