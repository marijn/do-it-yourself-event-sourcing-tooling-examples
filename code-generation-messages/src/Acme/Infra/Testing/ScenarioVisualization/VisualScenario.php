<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

final class VisualScenario {

    private $description;
    private $given;
    private $when;
    private $then;

    function __construct (StepDescription $description, StepDescription $given, StepDescription $when, StepDescription $then) {
        $this->description = $description;
        $this->given = $given;
        $this->when = $when;
        $this->then = $then;
    }

    function withDescription (StepDescription $description): VisualScenario {
        return new VisualScenario($description, $this->given, $this->when, $this->then);
    }

    function withGiven (StepDescription $given): VisualScenario {
        return new VisualScenario($this->description, $given, $this->when, $this->then);
    }

    function withWhen (StepDescription $when): VisualScenario {
        return new VisualScenario($this->description, $this->given, $when, $this->then);
    }

    function withThen (StepDescription $then): VisualScenario {
        return new VisualScenario($this->description, $this->given, $this->when, $then);
    }

    function toHtml (): string {
        return <<<HTML
{$this->description->toHtml()}
{$this->given->toHtml()}
{$this->when->toHtml()}
{$this->then->toHtml()}
HTML;
    }
}
