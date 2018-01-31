<?php declare(strict_types=1);
/**
 * WARNING! This file has been generated.
 *
 * Modify by changing the underlying DSL. Convention stipulates that the file is called after the type of code generator.
 * Are you a first-timer? Ask someone to help you. Have a nice day :-)
 *
 * @see \Acme\Infra\EventSourcing\CodeGeneration\CommandHandlersCodeGenerator
 */

namespace Acme\OnlineShop {

    final class Handles_StartShopping extends \Acme\Infra\EventSourcing\EventRecordingCommandHandler {

        function handle (StartShopping $command): void {
            $this->recordThat(
                new CustomerStartedShopping(
                    $command->cartId(),
                    $command->startedAt()
                )
            );
        }
    }

    final class Handles_AddProductToCart extends \Acme\Infra\EventSourcing\EventRecordingCommandHandler {

        function handle (AddProductToCart $command): void {
            $this->recordThat(
                new ProductWasAddedToCart(
                    $command->cartId(),
                    $command->sku(),
                    $command->priceInCents(),
                    $command->currency(),
                    $command->addedAt()
                )
            );
        }
    }

    final class Handles_RemoveProductFromCart extends \Acme\Infra\EventSourcing\EventRecordingCommandHandler {

        function handle (RemoveProductFromCart $command): void {
            $this->recordThat(
                new ProductWasRemovedFromCart(
                    $command->cartId(),
                    $command->sku(),
                    $command->priceInCents(),
                    $command->currency(),
                    $command->removedAt()
                )
            );
        }
    }
}
