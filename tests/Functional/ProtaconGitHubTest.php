<?php
declare(strict_types = 1);
/**
 * /tests/Functional/ProtaconGitHubSeleniumTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Tests\Functional;

/**
 * Class ProtaconGitHubSeleniumTest
 *
 * @package App\Tests\Functional
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class ProtaconGitHubTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    /**
     * Search term | Repository count
     * ------------+-----------------
     * docker      | 3
     * hackday     | 18
     * vf          | 1
     */
    public function testThatFindRepositorySearchReturnsExpectedRepositoryList(): void
    {
        static::markTestIncomplete('Implement this test');
    }

    /**
     * Current list you can find here https://github.com/protacon/github-xperience/blob/master/repositories
     */
    public function testThatRepositoryListDoesNotContainPrivateRepositories(): void
    {
        static::markTestIncomplete('Implement this test');
    }

    protected function setUp(): void
    {
        $this->setHost('hub');
        $this->setBrowserUrl('https://github.com/protacon/');
    }
}
