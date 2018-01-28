<?php declare(strict_types=1);

namespace Acme\Infra\Testing\ScenarioVisualization;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class ScenarioDescription extends StepDescription {

    private $title;
    private $detail;

    function __construct (string $title, string $detail) {
        $this->title = $title;
        $this->detail = $detail;
    }

    function toHtml (): string {
        return <<<HTML
<div class="sticky like-paper">
  <h2>{$this->title}</h2>
  <p>{$this->detail}</p>
</div>
HTML;
    }
}
