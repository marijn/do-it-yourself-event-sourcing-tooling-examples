<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Acme\Infra\Standards;
use Faker\Factory;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class RemoveProductFromCartTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     * @dataProvider provide cartId customerId sku priceInCents currency and transactionTime
     */
    function ProductWasRemovedFromCart when RemoveProductFromCart (
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
                    ->andWithCustomerId($customerId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithCustomerId($customerId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency)
            )
            ->when(new RemoveProductFromCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->then(new ProductWasRemovedFromCart($cartId, $customerId, $sku, $priceInCents, $currency, $transactionTime))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId customerId sku priceInCents currency and transactionTime
     */
    function ignore RemoveProductFromCart when ProductWasRemovedFromCart already (
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
                    ->andWithCustomerId($customerId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithCustomerId($customerId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency),

                ProductWasRemovedFromCart::withCartId($cartId)
                    ->andWithCustomerId($customerId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency)
            )
            ->when(new RemoveProductFromCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->thenNothing()
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId customerId sku priceInCents currency and transactionTime
     */
    function ignore RemoveProductFromCart when no corresponding ProductWasAddedToCart (
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
            ->when(new RemoveProductFromCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->thenNothing()
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
