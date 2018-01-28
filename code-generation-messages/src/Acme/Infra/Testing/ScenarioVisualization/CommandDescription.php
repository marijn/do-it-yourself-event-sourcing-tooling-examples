<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CommandDescription extends StepDescription {

    private $commandName;
    private $data;

    function __construct (string $commandName, array $data) {
        $this->commandName = $commandName;
        $this->data = $data;
    }

    function toHtml (): string {
        $data = self::dataToHtmlTable($this->data);

        return <<<HTML
<div class="command sticky like-paper">
  <h2>{$this->commandName}</h2>
  {$data}
</div>
HTML;
    }
}
