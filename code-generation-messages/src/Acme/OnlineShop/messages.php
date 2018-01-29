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
         * @param string $startedAt
         */
        function __construct (
            string $cartId,
            string $startedAt
        ) {
            $this->cartId = $cartId;
            $this->startedAt = $startedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
            'startedAt' => '2017-05-09 09:05:02.999999+0000',
        ];

        static function withCartId (string $cartId): CustomerStartedShopping {
            $payload = CustomerStartedShopping::exampleValues;
            $payload['cartId'] = $cartId;

            return CustomerStartedShopping::fromPayload($payload);
        }

        static function fromPayload (array $payload): CustomerStartedShopping {
            return new CustomerStartedShopping(
                $payload['cartId'],
                $payload['startedAt']
            );
        }

        function andWithStartedAt (string $startedAt): CustomerStartedShopping {
            $modified = clone $this;
            $modified->startedAt = $startedAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $startedAt;

        function startedAt (): string { return $this->startedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'startedAt' => $this->startedAt,
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
         * @param string $sku The "Stock Keeping Unit" from the Product Catalog 2.0
         * @param int $priceInCents
         * @param string $currency
         * @param string $addedAt
         */
        function __construct (
            string $cartId,
            string $sku,
            int $priceInCents,
            string $currency,
            string $addedAt
        ) {
            $this->cartId = $cartId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->addedAt = $addedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
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
                $payload['sku'],
                $payload['priceInCents'],
                $payload['currency'],
                $payload['addedAt']
            );
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
         * @param string $sku The "Stock Keeping Unit" from the Product Catalog 2.0
         * @param int $priceInCents
         * @param string $currency
         * @param string $removedAt
         */
        function __construct (
            string $cartId,
            string $sku,
            int $priceInCents,
            string $currency,
            string $removedAt
        ) {
            $this->cartId = $cartId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->removedAt = $removedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
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
                $payload['sku'],
                $payload['priceInCents'],
                $payload['currency'],
                $payload['removedAt']
            );
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
         * @param string $orderedAt
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $orderId,
            array $orderLines,
            string $orderedAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->orderId = $orderId;
            $this->orderLines = $orderLines;
            $this->orderedAt = $orderedAt;
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
            'orderedAt' => '2017-05-09 09:07:12.999999+0000',
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
                $payload['orderedAt']
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

        function andWithOrderedAt (string $orderedAt): CustomerPlacedOrder {
            $modified = clone $this;
            $modified->orderedAt = $orderedAt;

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

        private $orderedAt;

        function orderedAt (): string { return $this->orderedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'orderId' => $this->orderId,
                'orderLines' => $this->orderLines,
                'orderedAt' => $this->orderedAt,
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
         * @param string $abandonedAt
         */
        function __construct (
            string $cartId,
            string $abandonedAt
        ) {
            $this->cartId = $cartId;
            $this->abandonedAt = $abandonedAt;
        }

        private const exampleValues = [
            'cartId' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA',
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
                $payload['abandonedAt']
            );
        }

        function andWithAbandonedAt (string $abandonedAt): CustomerAbandonedCart {
            $modified = clone $this;
            $modified->abandonedAt = $abandonedAt;

            return $modified;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $abandonedAt;

        function abandonedAt (): string { return $this->abandonedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
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
         * @param string $startedAt The time to register when the `CustomerStartedShopping` if the command is acknowledged
         */
        function __construct (
            string $cartId,
            string $startedAt
        ) {
            $this->cartId = $cartId;
            $this->startedAt = $startedAt;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $startedAt;

        function startedAt (): string { return $this->startedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'startedAt' => $this->startedAt,
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
         * @param int $priceInCents
         * @param string $currency Per cart only a single currency is supported
         * @param string $addedAt The time to register when the `ProductWasAddedToCart` if the command is acknowledged
         */
        function __construct (
            string $cartId,
            string $sku,
            int $priceInCents,
            string $currency,
            string $addedAt
        ) {
            $this->cartId = $cartId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->addedAt = $addedAt;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

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
    final class RemoveProductFromCart implements \Acme\Infra\EventSourcing\Command {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $sku
         * @param int $priceInCents
         * @param string $currency Per cart only a single currency is supported
         * @param string $removedAt The time to register when the `ProductWasRemovedFromCart` if the command is acknowledged
         */
        function __construct (
            string $cartId,
            string $sku,
            int $priceInCents,
            string $currency,
            string $removedAt
        ) {
            $this->cartId = $cartId;
            $this->sku = $sku;
            $this->priceInCents = $priceInCents;
            $this->currency = $currency;
            $this->removedAt = $removedAt;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

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
    final class PlaceOrder implements \Acme\Infra\EventSourcing\Command {

        /**
         * @api
         *
         * @param string $cartId
         * @param string $customerId
         * @param string $orderedAt The time to register when the `CustomerPlacedOrder` if the command is acknowledged
         */
        function __construct (
            string $cartId,
            string $customerId,
            string $orderedAt
        ) {
            $this->cartId = $cartId;
            $this->customerId = $customerId;
            $this->orderedAt = $orderedAt;
        }

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $orderedAt;

        function orderedAt (): string { return $this->orderedAt; }

        function rawMessagePayload (): array {
            return [
                'cartId' => $this->cartId,
                'customerId' => $this->customerId,
                'orderedAt' => $this->orderedAt,
            ];
        }
    }
}
