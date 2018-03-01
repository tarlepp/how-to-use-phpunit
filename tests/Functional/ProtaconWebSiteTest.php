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
        // Open specified page on browser
        $this->url('');

        static::assertSame('Etusivu - Protacon', $this->title(), 'Site title is not expected');
    }

    public function testThatHekku2EmployeePlayerCardIsExpected(): void
    {
        // Open specified page on browser
        $this->url('uratarinat/heikki-jussi-niemi/');

        // Nothing can go wrong with selector - right?
        $content = $this->byCssSelector('#fws_5a98022ba9ccc > div.col.span_12.left > div.vc_col-sm-8.wpb_column.column_container.vc_column_container.col.no-extra-padding.instance-2 > div > div > div > div > p:nth-child(2)')->text();

        static::assertContains('missä tein opiskelujen ohella myös töitä', $content, 'Hekku2 has not done any work...');
    }

    protected function setUp(): void
    {
        $this->setHost('hub');
        $this->setBrowserUrl('https://www.protacon.com/');
    }
}
