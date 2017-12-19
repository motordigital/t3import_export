<?php

namespace CPSIT\T3importExport\Tests\Unit;

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

use CPSIT\T3importExport\ObjectManagerTrait;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Class ObjectManagerTraitTest
 */
class ObjectManagerTraitTest extends UnitTestCase
{

    /**
     * subject
     * @var ObjectManagerTrait|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $subject;

    /**
     * set up subject
     */
    public function setUp()
    {
        $this->subject = $this->getMockBuilder(ObjectManagerTrait::class)
            ->getMockForTrait();
    }

    /**
     * @test
     */
    public function objectManagerCanBeInjected()
    {
        $objectManager = $this->getMockBuilder(ObjectManager::class)->getMock();
        $this->subject->injectObjectManager($objectManager);

        $this->assertAttributeSame(
            $objectManager,
            'objectManager',
            $this->subject
        );
    }
}
