<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Faker\Factory;
use Ramsey\Uuid\Uuid;

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
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => (string) Uuid::uuid4(),
                'customerId' => (string) Uuid::uuid4(),
                'startTime' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format('Y-m-d\TH:i:s.uO'),
            ]
        ];
    }
}
