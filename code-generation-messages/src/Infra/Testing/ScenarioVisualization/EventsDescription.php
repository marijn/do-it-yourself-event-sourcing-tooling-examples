<?php declare(strict_types=1);

namespace Infra\Testing\ScenarioVisualization;

use Infra\EventSourcing\Event;
use Infra\Testing\ScenarioVisualization\StepDescription;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class EventsDescription extends StepDescription {

    /** @var \Infra\Testing\ScenarioVisualization\StepDescription[] */
    private $events;

    function __construct (Event ... $events) {
        $this->events = [];

        foreach ($events as $event)
        {
            $this->events[] = StepDescription::forEvent($event);
        }
    }

    function toHtml (): string {
        $events = [];

        foreach ($this->events as $event)
        {
            $events[] = $event->toHtml();
        }

        return implode(PHP_EOL, $events);
    }
}
