<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Infra\Standards;
use Faker\Factory;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class AddProductToCartTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     * @dataProvider provide cartId sku priceInCents currency and addedAt
     */
    function ProductWasAddedToCart when AddProductToCart (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $addedAt
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId)
            )
            ->when(new AddProductToCart($cartId, $sku, $priceInCents, $currency, $addedAt))
            ->then(new ProductWasAddedToCart($cartId, $sku, $priceInCents, $currency, $addedAt))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId sku priceInCents currency and addedAt
     */
    function ignore AddProductToCart when ProductWasAddedToCart already (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $addedAt
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency)
                    ->andWithAddedAt($addedAt)
            )
            ->when(new AddProductToCart($cartId, $sku, $priceInCents, $currency, $addedAt))
            ->thenNothing()
            ->assert();
    }

    static public function provide cartId sku priceInCents currency and addedAt(): array {
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => $faker->uuid,
                'sku' => sprintf('ACME-%03d', $faker->numberBetween(0, 999)),
                'priceInCents' => $faker->numberBetween(499, 12999),
                'currency' => $faker->currencyCode,
                'addedAt' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat),
            ]
        ];
    }
}
