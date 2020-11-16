<?php declare(strict_types=1);

namespace Infra\Testing\ScenarioVisualization;

use Infra\EventSourcing\Command;
use Infra\EventSourcing\Event;
use Infra\Testing\ScenarioVisualization\CommandDescription;
use Infra\Testing\ScenarioVisualization\EventDescription;
use Infra\Testing\ScenarioVisualization\EventsDescription;
use Infra\Testing\ScenarioVisualization\HotspotDescription;
use Infra\Testing\ScenarioVisualization\ScenarioDescription;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
abstract class StepDescription {

    static function forEvent (Event $event): StepDescription { return new EventDescription($event); }
    static function forEvents (Event ... $event): StepDescription { return new EventsDescription(... $event); }
    static function forCommand (Command $command): StepDescription { return new CommandDescription($command); }
    static function forHotspot (string $hotspot, string $detail): StepDescription { return new HotspotDescription($hotspot, $detail); }
    static function forScenario (string $scenario, string $detail): StepDescription { return new ScenarioDescription($scenario, $detail); }

    protected static function dataToHtml (array $data): string {
        return self::hasNumericKeys($data) ? self::dataToHtmlList($data) : self::dataToHtmlTable($data);
    }

    private static function dataToHtmlList (array $data): string {
        $elements = [];

        foreach ($data as $key => $value)
        {
            $valueCode = is_array($value) ? self::dataToHtml($value) : $value;
            $elements[] = <<<HTML
<li>{$valueCode}</li>
HTML;
        }

        $elementsCode = implode(PHP_EOL, $elements);

        return <<<HTML
<ul>{$elementsCode}</ul>
HTML;

    }

    abstract function toHtml (): string;

    static protected function dataToHtmlTable (array $data): string {
        $rows = [];

        foreach ($data as $key => $value)
        {
            $valueCode = is_array($value) ? self::dataToHtml($value) : $value;
            $rows[] = <<<HTML
<tr class="{$key}">
  <th>{$key}</th>
  <td>{$valueCode}</td>
</tr>
HTML;
        }

        $rowCode = implode(PHP_EOL, $rows);

        return <<<HTML
<table>{$rowCode}</table>
HTML;
    }

    private static function hasNumericKeys (array $candidate): bool {
        foreach (array_keys($candidate) as $key)
        {
            if ( ! is_int($key))
            {
                return false;
            }
        }

        return true;
    }
}
