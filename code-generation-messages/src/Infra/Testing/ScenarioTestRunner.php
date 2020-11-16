<?php declare(strict_types=1);

namespace Infra\Testing;

use Infra\Testing\TestScenario;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface ScenarioTestRunner {

    function scenario (): TestScenario;
}
