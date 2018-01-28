<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

use Acme\Infra\EventSourcing\Command;
use function Acme\Infra\EventSourcing\fully_qualified_class_name_to_canonical;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CommandDescription extends StepDescription {

    private $commandName;
    private $data;

    function __construct (Command $command) {
        $this->commandName = fully_qualified_class_name_to_canonical(get_class($command));
        $this->data = $command->rawMessagePayload();
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
