<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing\Testing;

use Acme\Infra\TestScenario;
use PHPUnit\Framework\TestCase;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
abstract class EventSourcedCommandHandlerTestCase extends TestCase {

    /** @var \Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerScenario */
    protected $scenario;

    protected function setUp () {
        parent::setUp();

        $this->scenario = new EventSourcedCommandHandlerScenario(
            // TODO inject required services
        );
    }

    protected function assertPreConditions () {
        parent::assertPreConditions();

        assertThat($this->scenario, isInstanceOf(TestScenario::class));
    }
}
