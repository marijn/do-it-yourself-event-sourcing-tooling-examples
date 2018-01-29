<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
abstract class EventRecordingCommandHandler implements CommandHandler {

    function recordThat (Event $event): void {
        // TODO: Record that the event happened
    }
}
