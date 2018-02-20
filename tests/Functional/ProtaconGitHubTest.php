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
     * @dataProvider dataProviderTestThatFindRepositorySearchReturnsExpectedRepositoryList
     *
     * @param string $searchWord
     * @param array  $expectedRepositories
     */
    public function testThatFindRepositorySearchReturnsExpectedRepositoryList(
        string $searchWord,
        array $expectedRepositories
    ): void {
        // Open specified page on browser
        $this->url('');

        $this
            ->setSearchTerm($searchWord)
            ->waitUntilFormIsNotSendingData()
            ->waitUntilListIsUpdated($expectedRepositories);

        // Fetch all <a> elements from repository list
        $repositories = $this->elements($this->using('css selector')->value('.org-repos li h3 a'));

        $repositoryNames = function (\PHPUnit_Extensions_Selenium2TestCase_Element $element) {
            return $element->text();
        };

        static::assertEmpty(\array_diff($expectedRepositories, \array_map($repositoryNames, $repositories)));
        static::assertCount(\count($expectedRepositories), $repositories);
    }

    /**
     * Current list you can find here https://github.com/protacon/github-xperience/blob/master/repositories
     */
    public function testThatRepositoryListDoesNotContainPrivateRepositories(): void
    {
        static::markTestIncomplete('Implement this test');
    }

    /**
     * @return array
     */
    public function dataProviderTestThatFindRepositorySearchReturnsExpectedRepositoryList(): array
    {
        return [
            [
                'docker',
                [
                    'docker-dotnet-node-sdk',
                    'docker-git-lfs',
                    'docker-kompose',
                ],
            ],
            [
                'hackday',
                [
                    'iot-hackday-r2d2',
                    'hackday-2015',
                    'hackday-2016-haksu',
                    'iot-hackday-2015',
                    'hackday-2017-pappi',
                    'hackday-2017-autonomous-car',
                    'iot-hackday-iotkukka',
                    'hackday-2016-beat',
                    'hackday-2016-spectre',
                    'iot-hackday-puhuvapaa',
                    'iot-hackday-2015-obd2-gui',
                    'iot-hackday-brewtacon-olutions',
                    'hackday-2016-db-mikko',
                    'iot-hackday-puhuvapaa-frontend',
                    'iot-hackday-iotkukka-kukka',
                    'iot-hackday-gui-boilerplate',
                    'iot-hackday-iotkukka-ruukku',
                    'iot-hackday-2015-obd2',
                ],

            ],
            [
                'vf',
                [
                    'vf-rest',
                ],
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->setHost('hub');
        $this->setBrowserUrl('https://github.com/protacon/');
    }

    /**
     * @param string   $searchWord
     * @param int|null $timeout
     *
     * @return ProtaconGitHubTest
     */
    private function setSearchTerm(string $searchWord, ?int $timeout = null): ProtaconGitHubTest
    {
        $timeout = $timeout ?? 5000;

        $callback = function (ProtaconGitHubTest $testCase) use ($searchWord): ?ProtaconGitHubTest {
            try {
                $element = $testCase->byId('your-repos-filter');
                $element->value($searchWord);
            } /** @noinspection BadExceptionsProcessingInspection */ catch (\Exception $exception) {
                return null;
            }

            return $testCase;
        };

        return $this->waitUntil($callback, $timeout);
    }

    /**
     * @param int|null $timeout
     *
     * @return ProtaconGitHubTest
     */
    private function waitUntilFormIsNotSendingData(?int $timeout = null): ProtaconGitHubTest
    {
        $timeout = $timeout ?? 5000;

        $callback = function (ProtaconGitHubTest $testCase): ?ProtaconGitHubTest {
            try {
                $element = $testCase->byCssSelector('form.TableObject');

                if (strpos($element->attribute('class'), 'is-sending') !== false) {
                    /** @noinspection ThrowRawExceptionInspection */
                    throw new \Exception('not ready');
                }
            } /** @noinspection BadExceptionsProcessingInspection */ catch (\Exception $exception) {
                return null;
            }

            return $testCase;
        };

        return $this->waitUntil($callback, $timeout);
    }

    /**
     * @param array    $expectedRepositories
     * @param int|null $timeout
     *
     * @return ProtaconGitHubTest
     */
    private function waitUntilListIsUpdated(array $expectedRepositories, ?int $timeout = null): ProtaconGitHubTest
    {
        $timeout = $timeout ?? 5000;

        $callback = function (ProtaconGitHubTest $testCase) use
            ($expectedRepositories) : ?ProtaconGitHubTest {
            $repositoryCount = $testCase->elements($this->using('css selector')->value('.org-repos li'));

            return \count($repositoryCount) !== \count($expectedRepositories) ? null : $testCase;
        };

        return $this->waitUntil($callback, $timeout);
    }
}
