<?php declare(strict_types=1);

namespace Acme\Infra\Testing;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface ScenarioTestRunner {

    function scenario (): TestScenario;
}
