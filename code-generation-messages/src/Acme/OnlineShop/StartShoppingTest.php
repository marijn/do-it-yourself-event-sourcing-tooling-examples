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
     * @dataProvider provide cartId and startTime
     */
    function CustomerStartedShopping when StartShopping (string $cartId, string $startTime): void {
        $this->scenario
            ->when(new StartShopping($cartId, $startTime))
            ->then(new CustomerStartedShopping($cartId, $startTime))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId and startTime
     */
    function ignore StartShopping when CustomerStartedShopping already (string $cartId, string $startTime): void {
        $this->scenario
            ->given(CustomerStartedShopping::withCartId($cartId))
            ->when(new StartShopping($cartId, $startTime))
            ->thenNothing()
            ->assert();
    }

    static public function provide cartId and startTime(): array {
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => $faker->uuid,
                'startTime' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat),
            ]
        ];
    }
}
