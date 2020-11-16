<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing\Testing;

use Acme\Infra\EventSourcing\Command;
use Acme\Infra\EventSourcing\Event;
use Acme\Infra\Testing\ScenarioVisualization\VisualScenario;
use Acme\Infra\Testing\ScenarioVisualization\StepDescription;
use Acme\Infra\Testing\TestScenario;
use PHPUnit\Framework\AssertionFailedError;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class EventSourcedCommandHandlerScenario implements TestScenario {

    private $given;
    private $when;
    private $then;

    function __construct () {
        $this->given = StepDescription::forHotspot('No preconditions', 'This scenario is completely autonomous');
        $this->when = StepDescription::forHotspot('No command', 'This scenario is likely incomplete');
        $this->then = StepDescription::forHotspot('No outcome specified', 'If this is desired change your test to use `thenNothing` to signal explicitly that nothing should happen.');
    }

    function given(Event ... $events): EventSourcedCommandHandlerScenario {
        $this->given = StepDescription::forEvents(... $events);

        return $this;
    }

    function when(Command $command): EventSourcedCommandHandlerScenario {
        $this->when = StepDescription::forCommand($command);;

        return $this;
    }

    function then(Event $event): EventSourcedCommandHandlerScenario {
        $this->then = StepDescription::forEvent($event);

        return $this;
    }

    function thenNothing(): EventSourcedCommandHandlerScenario {
        $this->then = StepDescription::forHotspot('Nothing', 'No changes should be recorded');

        return $this;
    }

    /** @throws \PHPUnit\Framework\AssertionFailedError */
    function assert (): void {
        // TODO: Implement assert() method.

        throw new AssertionFailedError('Not yet implemented');
    }

    function visualScenario (): VisualScenario {
        return new VisualScenario(
            StepDescription::forScenario('Unknown scenario', 'You likely broke something in the visualization event listener'),
            $this->given,
            $this->when,
            $this->then
        );
    }
}
