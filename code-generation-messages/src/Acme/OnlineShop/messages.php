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

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $startedShoppingAt;

        function startedShoppingAt (): string { return $this->startedShoppingAt; }
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

        private $cartId;

        function cartId (): string { return $this->cartId; }

        private $customerId;

        function customerId (): string { return $this->customerId; }

        private $abandonedAt;

        function abandonedAt (): string { return $this->abandonedAt; }
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
    }
}
