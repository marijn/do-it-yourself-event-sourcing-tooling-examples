<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

use Acme\Infra\EventSourcing\Event;
use function Acme\Infra\EventSourcing\fully_qualified_class_name_to_canonical;
use ReflectionObject;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class EventDescription extends StepDescription {

    private $eventName;
    private $data;

    function __construct (Event $event) {
        $this->eventName = fully_qualified_class_name_to_canonical(get_class($event));
        $this->data = [];
        $exampleValues = (new ReflectionObject($event))->getConstant('exampleValues');

        foreach ($event->rawMessagePayload() as $key => $value)
        {
            $this->data[$key] = $value === $exampleValues[$key] ? '...' : $value;
        }
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
