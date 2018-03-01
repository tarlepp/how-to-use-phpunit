<?php
declare(strict_types = 1);
/**
 * /tests/Functional/ProtaconSeleniumTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Tests\Functional;

/**
 * Class ProtaconSeleniumTest
 *
 * @package App\Tests\Functional
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class ProtaconWebSiteTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function testThatProtaconSiteHasExpectedTitle(): void
    {
        $this->url('');
        $this->assertSame('', $this->title());
    }

    public function testThatHekku2EmployeePlayerCardIsExpected(): void
    {
        static::markTestSkipped('You need to implement this test');
    }

    protected function setUp(): void
    {
        $this->setHost('hub');
        $this->setBrowserUrl('http://www.protacon.com/');
    }
}
