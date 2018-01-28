<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class EventDescription extends StepDescription {

    private $eventName;
    private $data;

    function __construct (string $eventName, array $data) {
        $this->eventName = $eventName;
        $this->data = $data;
    }

    function toHtml (): string {
        $data = self::dataToHtmlTable($this->data);

        return <<<HTML
<div class="event sticky like-paper">
  <h2>{$this->eventName}</h2>
  {$data}
</div>
HTML;
    }
}
