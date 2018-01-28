<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

use Acme\Infra\EventSourcing\Command;
use Acme\Infra\EventSourcing\Event;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
abstract class StepDescription {

    static function forEvent (Event $event): StepDescription { return new EventDescription($event); }
    static function forEvents (Event ... $event): StepDescription { return new EventsDescription(... $event); }
    static function forCommand (Command $command): StepDescription { return new CommandDescription($command); }
    static function forHotspot (string $hotspot, string $detail): StepDescription { return new HotspotDescription($hotspot, $detail); }
    static function forScenario (string $scenario, string $detail): StepDescription { return new ScenarioDescription($scenario, $detail); }

    abstract function toHtml (): string;

    static protected function dataToHtmlTable (array $data): string {
        $rows = [];

        foreach ($data as $key => $value)
        {
            $rows[] = <<<HTML
<tr>
  <th>{$key}</th>
  <td>{$value}</td>
</tr>
HTML;
        }

        $rowCode = implode(PHP_EOL, $rows);

        return <<<HTML
<table>{$rowCode}</table>
HTML;
    }
}
