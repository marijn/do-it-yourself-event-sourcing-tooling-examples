<?php declare(strict_types=1);
/**
 * WARNING! This file has been generated.
 *
 * Modify by changing the underlying DSL. Convention stipulates that the file has an identical filename with a .yaml extension.
 * Are you a first-timer? Ask someone to help you. Have a nice day :-)
 *
 * @see \Acme\Infra\EventSourcing\CodeGeneration\CodeGenerator
 */

namespace Acme\OnlineShop {

    /**
     * When the customer enters the online shop the `CustomerStartedShopping` event is recorded.
     *
     * @api
     * @category generated
     */
    final class CustomerStartedShopping implements \Acme\Infra\EventSourcing\Event {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $startedShoppingAt
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $startedShoppingAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->startedShoppingAt = $startedShoppingAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
            'customerId' => 'BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB',
            'startedShoppingAt' => '2017-05-09 09:05:02.999999+0000',
        ];

        static function withCartId (string $cartId): CustomerStartedShopping {
            $payload = CustomerStartedShopping::exampleValues;
            $payload['cartId'] = $cartId;

            return CustomerStartedShopping::fromPayload($payload);
        }

        static function fromPayload (array $payload): CustomerStartedShopping {
            return new CustomerStartedShopping(
                $payload['cartId'],
                $payload['customerId'],
                $payload['startedShoppingAt']
            );
        }

        function andWithCustomerId (string $customerId): CustomerStartedShopping {
            $modified = clone $this;
            $modified->customerId = $customerId;

            return $modified;
        }

        function andWithStartedShoppingAt (string $startedShoppingAt): CustomerStartedShopping {
            $modified = clone $this;
            $modified->startedShoppingAt = $startedShoppingAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $startedShoppingAt;

        function startedShoppingAt (): string { return $this->startedShoppingAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'startedShoppingAt' => $this->startedShoppingAt,
            ];
        }
    }

    /**
     * @api
     * @category generated
     */
    final class ProductWasAddedToCart implements \Acme\Infra\EventSourcing\Event {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $sku The "Stock Keeping Unit" from the Product Catalog 2.0
         * @param int $priceInCents
         * @param string $currency
         * @param string $addedAt
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $sku,
            int $priceInCents,
            string $currency,
            string $addedAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->addedAt = $addedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
            'customerId' => 'BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB',
            'sku' => 'ACME-001',
            'priceInCents' => 1299,
            'currency' => 'EUR',
            'addedAt' => '2017-05-09 09:07:12.999999+0000',
        ];

        static function withCartId (string $cartId): ProductWasAddedToCart {
            $payload = ProductWasAddedToCart::exampleValues;
            $payload['cartId'] = $cartId;

            return ProductWasAddedToCart::fromPayload($payload);
        }

        static function fromPayload (array $payload): ProductWasAddedToCart {
            return new ProductWasAddedToCart(
                $payload['cartId'],
                $payload['customerId'],
                $payload['sku'],
                $payload['priceInCents'],
                $payload['currency'],
                $payload['addedAt']
            );
        }

        function andWithCustomerId (string $customerId): ProductWasAddedToCart {
            $modified = clone $this;
            $modified->customerId = $customerId;

            return $modified;
        }

        function andWithSku (string $sku): ProductWasAddedToCart {
            $modified = clone $this;
            $modified->sku = $sku;

            return $modified;
        }

        function andWithPriceInCents (int $priceInCents): ProductWasAddedToCart {
            $modified = clone $this;
            $modified->priceInCents = $priceInCents;

            return $modified;
        }

        function andWithCurrency (string $currency): ProductWasAddedToCart {
            $modified = clone $this;
            $modified->currency = $currency;

            return $modified;
        }

        function andWithAddedAt (string $addedAt): ProductWasAddedToCart {
            $modified = clone $this;
            $modified->addedAt = $addedAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $sku;

        function sku (): string { return $this->sku; }

        private $priceInCents;

        function priceInCents (): int { return $this->priceInCents; }

        private $currency;

        function currency (): string { return $this->currency; }

        private $addedAt;

        function addedAt (): string { return $this->addedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'sku' => $this->sku,
                'priceInCents' => $this->priceInCents,
                'currency' => $this->currency,
                'addedAt' => $this->addedAt,
            ];
        }
    }

    /**
     * @api
     * @category generated
     */
    final class ProductWasRemovedFromCart implements \Acme\Infra\EventSourcing\Event {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $sku The "Stock Keeping Unit" from the Product Catalog 2.0
         * @param int $priceInCents
         * @param string $currency
         * @param string $removedAt
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $sku,
            int $priceInCents,
            string $currency,
            string $removedAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->removedAt = $removedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
            'customerId' => 'BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB',
            'sku' => 'ACME-001',
            'priceInCents' => 1299,
            'currency' => 'EUR',
            'removedAt' => '2017-05-09 09:09:59.999999+0000',
        ];

        static function withCartId (string $cartId): ProductWasRemovedFromCart {
            $payload = ProductWasRemovedFromCart::exampleValues;
            $payload['cartId'] = $cartId;

            return ProductWasRemovedFromCart::fromPayload($payload);
        }

        static function fromPayload (array $payload): ProductWasRemovedFromCart {
            return new ProductWasRemovedFromCart(
                $payload['cartId'],
                $payload['customerId'],
                $payload['sku'],
                $payload['priceInCents'],
                $payload['currency'],
                $payload['removedAt']
            );
        }

        function andWithCustomerId (string $customerId): ProductWasRemovedFromCart {
            $modified = clone $this;
            $modified->customerId = $customerId;

            return $modified;
        }

        function andWithSku (string $sku): ProductWasRemovedFromCart {
            $modified = clone $this;
            $modified->sku = $sku;

            return $modified;
        }

        function andWithPriceInCents (int $priceInCents): ProductWasRemovedFromCart {
            $modified = clone $this;
            $modified->priceInCents = $priceInCents;

            return $modified;
        }

        function andWithCurrency (string $currency): ProductWasRemovedFromCart {
            $modified = clone $this;
            $modified->currency = $currency;

            return $modified;
        }

        function andWithRemovedAt (string $removedAt): ProductWasRemovedFromCart {
            $modified = clone $this;
            $modified->removedAt = $removedAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $sku;

        function sku (): string { return $this->sku; }

        private $priceInCents;

        function priceInCents (): int { return $this->priceInCents; }

        private $currency;

        function currency (): string { return $this->currency; }

        private $removedAt;

        function removedAt (): string { return $this->removedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'sku' => $this->sku,
                'priceInCents' => $this->priceInCents,
                'currency' => $this->currency,
                'removedAt' => $this->removedAt,
            ];
        }
    }

    /**
     * @api
     * @category generated
     */
    final class CustomerPlacedOrder implements \Acme\Infra\EventSourcing\Event {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $orderId
         * @param array $orderLines
         * @param string $orderPlacedAt
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $orderId,
            array $orderLines,
            string $orderPlacedAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->orderId = $orderId;
            $this->orderLines = $orderLines;
            $this->orderPlacedAt = $orderPlacedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
            'customerId' => 'BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB',
            'orderId' => 'CCCCCCCC-CCCC-CCCC-CCCC-CCCCCCCCCCCC',
            'orderLines' =>
                [
                    0 =>
                        [
                            'sku' => 'ACME-001',
                            'quantity' => 2,
                            'priceInCents' => 1299,
                            'currency' => 'EUR',
                        ],
                    1 =>
                        [
                            'sku' => 'ACME-007',
                            'quantity' => 1,
                            'priceInCents' => 1499,
                            'currency' => 'EUR',
                        ],
                ],
            'orderPlacedAt' => '2017-05-09 09:07:12.999999+0000',
        ];

        static function withCartId (string $cartId): CustomerPlacedOrder {
            $payload = CustomerPlacedOrder::exampleValues;
            $payload['cartId'] = $cartId;

            return CustomerPlacedOrder::fromPayload($payload);
        }

        static function fromPayload (array $payload): CustomerPlacedOrder {
            return new CustomerPlacedOrder(
                $payload['cartId'],
                $payload['customerId'],
                $payload['orderId'],
                $payload['orderLines'],
                $payload['orderPlacedAt']
            );
        }

        function andWithCustomerId (string $customerId): CustomerPlacedOrder {
            $modified = clone $this;
            $modified->customerId = $customerId;

            return $modified;
        }

        function andWithOrderId (string $orderId): CustomerPlacedOrder {
            $modified = clone $this;
            $modified->orderId = $orderId;

            return $modified;
        }

        function andWithOrderLines (array $orderLines): CustomerPlacedOrder {
            $modified = clone $this;
            $modified->orderLines = $orderLines;

            return $modified;
        }

        function andWithOrderPlacedAt (string $orderPlacedAt): CustomerPlacedOrder {
            $modified = clone $this;
            $modified->orderPlacedAt = $orderPlacedAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $orderId;

        function orderId (): string { return $this->orderId; }

        private $orderLines;

        function orderLines (): array { return $this->orderLines; }

        private $orderPlacedAt;

        function orderPlacedAt (): string { return $this->orderPlacedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'orderId' => $this->orderId,
                'orderLines' => $this->orderLines,
                'orderPlacedAt' => $this->orderPlacedAt,
            ];
        }
    }

    /**
     * After an extended period of no activity the `CustomerStartedShopping` event is recorded.
     *
     * @api
     * @category generated
     */
    final class CustomerAbandonedCart implements \Acme\Infra\EventSourcing\Event {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $abandonedAt
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $abandonedAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->abandonedAt = $abandonedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
            'customerId' => 'BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB',
            'abandonedAt' => '2017-05-09 10:09:59.999999+0000',
        ];

        static function withCartId (string $cartId): CustomerAbandonedCart {
            $payload = CustomerAbandonedCart::exampleValues;
            $payload['cartId'] = $cartId;

            return CustomerAbandonedCart::fromPayload($payload);
        }

        static function fromPayload (array $payload): CustomerAbandonedCart {
            return new CustomerAbandonedCart(
                $payload['cartId'],
                $payload['customerId'],
                $payload['abandonedAt']
            );
        }

        function andWithCustomerId (string $customerId): CustomerAbandonedCart {
            $modified = clone $this;
            $modified->customerId = $customerId;

            return $modified;
        }

        function andWithAbandonedAt (string $abandonedAt): CustomerAbandonedCart {
            $modified = clone $this;
            $modified->abandonedAt = $abandonedAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $abandonedAt;

        function abandonedAt (): string { return $this->abandonedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'abandonedAt' => $this->abandonedAt,
            ];
        }
    }

    /**
     * Start the online shopping process by dispatching this command.
     *
     * @api
     * @category generated
     */
    final class StartShopping implements \Acme\Infra\EventSourcing\Command {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $startTime
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $startTime
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->startTime = $startTime;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $startTime;

        function startTime (): string { return $this->startTime; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'startTime' => $this->startTime,
            ];
        }
    }

    /**
     * @api
     * @category generated
     */
    final class AddProductToCart implements \Acme\Infra\EventSourcing\Command {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $sku
         * @param string $priceInCents
         * @param string $currency Per cart only a single currency is supported
         * @param string $transactionTime
         */
        function __construct (
            string $cartId,
            string $sku,
            string $priceInCents,
            string $currency,
            string $transactionTime
        ) {
            $this->cartId = $cartId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->transactionTime = $transactionTime;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $sku;

        function sku (): string { return $this->sku; }

        private $priceInCents;

        function priceInCents (): string { return $this->priceInCents; }

        private $currency;

        function currency (): string { return $this->currency; }

        private $transactionTime;

        function transactionTime (): string { return $this->transactionTime; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'sku' => $this->sku,
                'priceInCents' => $this->priceInCents,
                'currency' => $this->currency,
                'transactionTime' => $this->transactionTime,
            ];
        }
    }

    /**
     * @api
     * @category generated
     */
    final class RemoveProductFromCart implements \Acme\Infra\EventSourcing\Command {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $sku
         * @param string $priceInCents
         * @param string $currency Per cart only a single currency is supported
         * @param string $transactionTime
         */
        function __construct (
            string $cartId,
            string $sku,
            string $priceInCents,
            string $currency,
            string $transactionTime
        ) {
            $this->cartId = $cartId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->transactionTime = $transactionTime;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $sku;

        function sku (): string { return $this->sku; }

        private $priceInCents;

        function priceInCents (): string { return $this->priceInCents; }

        private $currency;

        function currency (): string { return $this->currency; }

        private $transactionTime;

        function transactionTime (): string { return $this->transactionTime; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'sku' => $this->sku,
                'priceInCents' => $this->priceInCents,
                'currency' => $this->currency,
                'transactionTime' => $this->transactionTime,
            ];
        }
    }

    /**
     * @api
     * @category generated
     */
    final class PlaceOrder implements \Acme\Infra\EventSourcing\Command {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $orderTime
         */
        function __construct (
            string $cartId,
            string $orderTime
        ) {
            $this->cartId = $cartId;
            $this->orderTime = $orderTime;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $orderTime;

        function orderTime (): string { return $this->orderTime; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'orderTime' => $this->orderTime,
            ];
        }
    }
}
