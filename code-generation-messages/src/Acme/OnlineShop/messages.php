<?php declare(strict_types=1);
/**
 * WARNING! This file has been generated.
 *
 * Modify by changing the underlying DSL. Convention stipulates that the file has an identical filename with a .yaml extension.
 * Are you a first-timer? Ask someone to help you. Have a nice day :-)
 *
 * @see \Acme\CodeGeneration\CodeGenerator
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
}
