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
     * @dataProvider provide cartId sku priceInCents currency and transactionTime
     */
    function ProductWasAddedToCart when AddProductToCart (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $transactionTime
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId)
            )
            ->when(new AddProductToCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->then(new ProductWasAddedToCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->assert();
    }

    /**
     * @test
     * @dataProvider provide cartId sku priceInCents currency and transactionTime
     */
    function ignore AddProductToCart when ProductWasAddedToCart already (
        string $cartId,
        string $sku,
        int $priceInCents,
        string $currency,
        string $transactionTime
    ): void {
        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku)
                    ->andWithPriceInCents($priceInCents)
                    ->andWithCurrency($currency)
                    ->andWithAddedAt($transactionTime)
            )
            ->when(new AddProductToCart($cartId, $sku, $priceInCents, $currency, $transactionTime))
            ->thenNothing()
            ->assert();
    }

    static public function provide cartId sku priceInCents currency and transactionTime(): array {
        $faker = Factory::create();

        return [
            'with consistent example data' => [
                'cartId' => $faker->uuid,
                'sku' => sprintf('ACME-%03d', $faker->numberBetween(0, 999)),
                'priceInCents' => $faker->numberBetween(499, 12999),
                'currency' => $faker->currencyCode,
                'transactionTime' => $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat),
            ]
        ];
    }
}
