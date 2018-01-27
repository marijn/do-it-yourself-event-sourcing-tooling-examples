<?php declare(strict_types=1);

namespace Acme\Infra;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface TestScenario {
    /** @throws \PHPUnit\Framework\AssertionFailedError */
    function assert(): void;
}
