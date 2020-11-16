<?php declare(strict_types=1);

namespace Infra\Testing\ScenarioVisualization;

use Infra\Testing\ScenarioVisualization\StepDescription;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class HotspotDescription extends StepDescription {

    private $title;
    private $detail;

    function __construct (string $title, string $detail) {
        $this->title = $title;
        $this->detail = $detail;
    }

    function toHtml (): string {
        return <<<HTML
<div class="hotspot sticky like-paper">
  <h2>{$this->title}</h2>
  <p>{$this->detail}</p>
</div>
HTML;
    }
}
