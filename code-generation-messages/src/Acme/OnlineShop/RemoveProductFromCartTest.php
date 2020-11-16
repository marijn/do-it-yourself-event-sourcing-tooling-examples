<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Infra\Standards;
use Faker\Factory;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class RemoveProductFromCartTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     * @dataProvider provide cartId sku priceInCents currency and removedAt
     */
    function ProductWasRemovedFromCart when RemoveProductFromCart (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $removedAt
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency)
            )
            ->when(new RemoveProductFromCart($cartId, $sku, $priceInCents, $currency, $removedAt))
            ->then(new ProductWasRemovedFromCart($cartId, $sku, $priceInCents, $currency, $removedAt))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId sku priceInCents currency and removedAt
     */
    function ignore RemoveProductFromCart when ProductWasRemovedFromCart already (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $removedAt
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency),

                ProductWasRemovedFromCart::withCartId($cartId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency)
            )
            ->when(new RemoveProductFromCart($cartId, $sku, $priceInCents, $currency, $removedAt))
            ->thenNothing()
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId sku priceInCents currency and removedAt
     */
    function ignore RemoveProductFromCart when no corresponding ProductWasAddedToCart (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $removedAt
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId)
            )
            ->when(new RemoveProductFromCart($cartId, $sku, $priceInCents, $currency, $removedAt))
            ->thenNothing()
            ->assert();
    }

    static public function provide cartId sku priceInCents currency and removedAt(): array {
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => $faker->uuid,
                'sku' => sprintf('ACME-%03d', $faker->numberBetween(0, 999)),
                'priceInCents' => $faker->numberBetween(499, 12999),
                'currency' => $faker->currencyCode,
                'removedAt' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat),
            ]
        ];
    }
}
