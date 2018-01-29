<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Acme\Infra\Standards;
use Faker\Factory;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class StartShoppingTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     * @dataProvider provide cartId and startedAt
     */
    function CustomerStartedShopping when StartShopping (string $cartId, string $startedAt): void {
        $this->scenario
            ->when(new StartShopping($cartId, $startedAt))
            ->then(new CustomerStartedShopping($cartId, $startedAt))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId and startedAt
     */
    function ignore StartShopping when CustomerStartedShopping already (string $cartId, string $startedAt): void {
        $this->scenario
            ->given(CustomerStartedShopping::withCartId($cartId))
            ->when(new StartShopping($cartId, $startedAt))
            ->thenNothing()
            ->assert();
    }

    static public function provide cartId and startedAt(): array {
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => $faker->uuid,
                'startedAt' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat),
            ]
        ];
    }
}
