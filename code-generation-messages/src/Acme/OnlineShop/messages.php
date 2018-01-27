<?php declare(strict_types=1);

namespace Acme\OnlineShop {

    final class CustomerStartedShopping implements \Acme\Infra\EventSourcing\Event {

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

    final class ProductWasAddedToCart implements \Acme\Infra\EventSourcing\Event {

        function __construct (
            string $cartId,
            string $customerId,
            string $sku,
            string $priceInCents,
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

        function priceInCents (): string { return $this->priceInCents; }

        private $currency;

        function currency (): string { return $this->currency; }

        private $addedAt;

        function addedAt (): string { return $this->addedAt; }
    }

    final class ProductWasRemovedFromCart implements \Acme\Infra\EventSourcing\Event {

        function __construct (
            string $cartId,
            string $customerId,
            string $sku,
            string $priceInCents,
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

        function priceInCents (): string { return $this->priceInCents; }

        private $currency;

        function currency (): string { return $this->currency; }

        private $removedAt;

        function removedAt (): string { return $this->removedAt; }
    }

    final class CustomerAbandonedCart implements \Acme\Infra\EventSourcing\Event {

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
