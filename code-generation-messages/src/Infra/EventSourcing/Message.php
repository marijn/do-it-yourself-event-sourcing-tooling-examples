<?php declare(strict_types=1);

namespace Infra\EventSourcing;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface Message {

    function rawMessagePayload(): array;
}
