<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

use function Acme\Infra\EventSourcing\fully_qualified_class_name_to_canonical;
use Acme\Infra\Testing\ScenarioTestRunner;
use Exception;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use Stringy\Stringy;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class VisualizeScenario implements TestListener {

    /**
     * @param \PHPUnit\Framework\Test|\PHPUnit\Framework\TestCase $test
     * @param float $time
     */
    function endTest (Test $test, $time): void {
        if ( ! $test instanceof ScenarioTestRunner)
        {
            return;
        }

        $fullTestName = Stringy::create($test->toString());
        $scenario = $fullTestName->substr($fullTestName->indexOf('::') + 2)->humanize();
        $testName = fully_qualified_class_name_to_canonical((string) $fullTestName->substr(0, $fullTestName->indexOf('::'))->replace('Test', ''));
        $description = StepDescription::forScenario($testName, (string) $scenario);
        $visualScenario = $test->scenario()->visualScenario()->withDescription($description);
        $docsDirectory = Stringy::create('docs')->append('/')->append($testName)->replace('.', '/')->append('/');
        $filename = (string) Stringy::create($scenario->dasherize())->prepend($docsDirectory)->append('.html');
        $template = __DIR__ . '/templates/template.html';
        $viewParameters = ['{{title}}' => "{$testName} - {$scenario}", '{{stickyNotes}}' => $visualScenario->toHtml()];

        @mkdir((string) $docsDirectory, 0777, true);
        file_put_contents($filename, strtr(file_get_contents($template), $viewParameters));
    }

    function addFailure (Test $test, AssertionFailedError $e, $time): void {
        // TODO: Add failure icon to image
    }

    function addError (Test $test, Exception $e, $time): void {
        // TODO: Add error icon to image
    }

    function addWarning (Test $test, Warning $e, $time): void {
        // TODO: Add warning icon to image
    }

    function addIncompleteTest (Test $test, Exception $e, $time): void {
        // TODO: Add incomplete icon to image
    }

    function addSkippedTest (Test $test, Exception $e, $time): void {
        // TODO: Add skipped icon to image
    }

    function addRiskyTest (Test $test, Exception $e, $time): void {
        // TODO: Add risky icon to image
    }

    // boring stuff below

    function startTestSuite (TestSuite $suite): void { /* intentionally empty */ }
    function endTestSuite (TestSuite $suite): void { /* intentionally empty */ }
    function startTest (Test $test): void { /* intentionally empty */ }
}

