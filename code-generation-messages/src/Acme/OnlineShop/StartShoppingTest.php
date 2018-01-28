<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class StartShoppingTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     * @dataProvider provide cartId customerId and startTime
     */
    function CustomerStartedShopping when StartShopping (string $cartId, string $customerId, string $startTime): void {
        $this->scenario
            ->when(new StartShopping($cartId, $customerId, $startTime))
            ->then(new CustomerStartedShopping($cartId, $customerId, $startTime))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId customerId and startTime
     */
    function ignore StartShopping when CustomerStartedShopping already (string $cartId, string $customerId, string $startTime): void {
        $this->scenario
            ->given(CustomerStartedShopping::withCartId($cartId))
            ->when(new StartShopping($cartId, $customerId, $startTime))
            ->thenNothing()
            ->assert();
    }

    static public function provide cartId customerId and startTime(): array {
        return [
            'with consistent example data' => [
                'cartId' => 'aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa',
                'customerId' => 'bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb',
                'startTime' => '2017-10-07T09:12:15.999999+0000',
            ]
        ];
    }
}
