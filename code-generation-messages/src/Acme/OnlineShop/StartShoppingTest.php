<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class StartShoppingTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     */
    function CustomerStartedShopping when StartShopping (): void {
        $cartId = 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa';
        $customerId = 'bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb';
        $startTime = '2017-10-07T09:12:14.999999+0000';

        $this->scenario

            ->when(new StartShopping($cartId, $customerId, $startTime))

            ->then(new CustomerStartedShopping($cartId, $customerId, $startTime))

            ->assert();
    }
}
