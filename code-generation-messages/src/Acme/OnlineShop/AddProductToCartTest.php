<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Acme\Infra\Standards;
use Faker\Factory;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class AddProductToCartTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     * @dataProvider provide cartId customerId sku priceInCents currency and transactionTime
     */
    function ProductWasAddedToCart when AddProductToCart (
        string $cartId,
        string $customerId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $transactionTime
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId)
                    ->andWithCustomerId($customerId)
            )
            ->when(new AddProductToCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->then(new ProductWasAddedToCart($cartId, $customerId, $sku, $priceInCents, $currency, $transactionTime))
            ->assert();
    }

    static public function provide cartId customerId sku priceInCents currency and transactionTime(): array {
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => $faker->uuid,
                'customerId' => $faker->uuid,
                'sku' => $faker->ean13,
                'priceInCents' => $faker->numberBetween(499, 12999),
                'currency' => $faker->currencyCode,
                'transactionTime' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat),
            ]
        ];
    }
}
