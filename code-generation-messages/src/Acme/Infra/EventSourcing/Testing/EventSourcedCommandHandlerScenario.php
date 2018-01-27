<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing\Testing;

use Acme\Infra\EventSourcing\Command;
use Acme\Infra\EventSourcing\Event;
use Acme\Infra\TestScenario;
use PHPUnit\Framework\AssertionFailedError;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class EventSourcedCommandHandlerScenario implements TestScenario {

    function when(Command $command): EventSourcedCommandHandlerScenario {
        // TODO: Implement when() method.

        return $this;
    }

    function then(Event $event): EventSourcedCommandHandlerScenario {
        // TODO: Implement then() method.

        return $this;
    }

    /** @throws \PHPUnit\Framework\AssertionFailedError */
    function assert (): void {
        // TODO: Implement assert() method.

        throw new AssertionFailedError('Not yet implemented');
    }
}
