<?php

namespace CPSIT\T3importExport;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Dirk Wenzel <wenzel@cps-it.de>
 *  All rights reserved
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * A copy is found in the text file GPL.txt and important notices to the license
 * from the author is found in LICENSE.txt distributed with these scripts.
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;

/**
 * Trait ObjectManagerTrait
 * provides the object manager
 */
trait ObjectManagerTrait
{
    /**
     * @var ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * Inject the object manager
     *
     * @param \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $factory
     */
    public function injectObjectManager(ObjectManagerInterface $factory)
    {
        $this->objectManager = $factory;
    }
}
