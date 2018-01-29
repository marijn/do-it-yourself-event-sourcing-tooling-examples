<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Acme\Infra\EventSourcing\Testing\EventSourcedCommandHandlerTestCase;
use Acme\Infra\Standards;
use Faker\Factory;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class PlaceOrderTest extends EventSourcedCommandHandlerTestCase {

    /**
     * @test
     */
    function CustomerPlacedOrder when PlaceOrder (): void {
        $faker = Factory::create();

        $cartId = $faker->uuid;
        $customerId = $faker->uuid;
        $orderId = $faker->uuid;
        $currency = $faker->currencyCode;
        $sku1stProduct = $faker->ean13;
        $priceInCents1stProduct = $faker->numberBetween(499, 12999);
        $sku2ndProduct = $faker->ean13;
        $priceInCents2ndProduct = $faker->numberBetween(499, 12999);
        $placedAt = $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat);
        $orderLines = [
            [
                'sku' => $sku1stProduct,
                'quantity' => 1,
                'priceInCents' => $priceInCents1stProduct,
                'currency' => $currency,
            ],[
                'sku' => $sku2ndProduct,
                'quantity' => 1,
                'priceInCents' => $priceInCents2ndProduct,
                'currency' => $currency,
            ],
        ];

        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku1stProduct)
                    ->andWithPriceInCents($priceInCents1stProduct)
                    ->andWithCurrency($currency),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku2ndProduct)
                    ->andWithPriceInCents($priceInCents2ndProduct)
                    ->andWithCurrency($currency)
            )
            ->when(new PlaceOrder($cartId, $customerId, $placedAt))
            ->then(new CustomerPlacedOrder($cartId, $customerId, $orderId, $orderLines, $placedAt))
            ->assert();
    }

    /**
     * @test
     */
    function order lines are combined in CustomerPlacedOrder when PlaceOrder (): void {
        $faker = Factory::create();

        $cartId = $faker->uuid;
        $customerId = $faker->uuid;
        $orderId = $faker->uuid;
        $currency = $faker->currencyCode;
        $sku1stProduct = $faker->ean13;
        $priceInCents1stProduct = $faker->numberBetween(499, 12999);
        $sku2ndProduct = $faker->ean13;
        $priceInCents2ndProduct = $faker->numberBetween(499, 12999);
        $placedAt = $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat);
        $orderLines = [
            [
                'sku' => $sku1stProduct,
                'quantity' => 2,
                'priceInCents' => $priceInCents1stProduct,
                'currency' => $currency,
            ],[
                'sku' => $sku2ndProduct,
                'quantity' => 1,
                'priceInCents' => $priceInCents2ndProduct,
                'currency' => $currency,
            ],
        ];

        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku1stProduct)
                    ->andWithPriceInCents($priceInCents1stProduct)
                    ->andWithCurrency($currency),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku1stProduct)
                    ->andWithPriceInCents($priceInCents1stProduct)
                    ->andWithCurrency($currency),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku2ndProduct)
                    ->andWithPriceInCents($priceInCents2ndProduct)
                    ->andWithCurrency($currency)
            )
            ->when(new PlaceOrder($cartId, $customerId, $placedAt))
            ->then(new CustomerPlacedOrder($cartId, $customerId, $orderId, $orderLines, $placedAt))
            ->assert();
    }

    /**
     * @test
     */
    function ignore PlaceOrder when CustomerPlacedOrder already (): void {
        $faker = Factory::create();

        $cartId = $faker->uuid;
        $customerId = $faker->uuid;
        $orderId = $faker->uuid;
        $currency = $faker->currencyCode;
        $sku1stProduct = $faker->ean13;
        $priceInCents1stProduct = $faker->numberBetween(499, 12999);
        $sku2ndProduct = $faker->ean13;
        $priceInCents2ndProduct = $faker->numberBetween(499, 12999);
        $placedAt = $faker->dateTimeThisYear('3 months ago', 'UTC')->format(Standards::dateTimeFormat);
        $orderLines = [
            [
                'sku' => $sku1stProduct,
                'quantity' => 1,
                'priceInCents' => $priceInCents1stProduct,
                'currency' => $currency,
            ],[
                'sku' => $sku2ndProduct,
                'quantity' => 1,
                'priceInCents' => $priceInCents2ndProduct,
                'currency' => $currency,
            ],
        ];

        $this->scenario
            ->given(
                CustomerStartedShopping::withCartId($cartId),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku1stProduct)
                    ->andWithPriceInCents($priceInCents1stProduct)
                    ->andWithCurrency($currency),

                ProductWasAddedToCart::withCartId($cartId)
                    ->andWithSku($sku2ndProduct)
                    ->andWithPriceInCents($priceInCents2ndProduct)
                    ->andWithCurrency($currency),

                CustomerPlacedOrder::withCartId($cartId)
                    ->andWithOrderId($orderId)
                    ->andWithOrderLines($orderLines)
                    ->andWithPlacedAt($placedAt)
            )
            ->when(new PlaceOrder($cartId, $customerId, $placedAt))
            ->thenNothing()
            ->assert();
    }
}
