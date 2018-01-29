<?php declare(strict_types=1);

namespace Acme\Application\OnlineShop;

use Acme\OnlineShop\Product;
use Acme\OnlineShop\ProductDescription;
use Acme\OnlineShop\ProductName;
use Acme\OnlineShop\ProductRepository;
use Acme\OnlineShop\Products;
use Acme\OnlineShop\Sku;
use Money\Currency;
use Money\Money;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class HardCodedProductRepository implements ProductRepository {

    function findAllProducts (): Products {
        return new Products(
            new Product(
                ProductName::fromString('Orange Sticky Notes'),
                ProductDescription::fromString('90 squared notes 76mm X 76mm'),
                Sku::fromString('ACME-001'),
                new Money(299, new Currency('EUR'))
            ),
            new Product(
                ProductName::fromString('Fuchsia Sticky Notes'),
                ProductDescription::fromString('90 squared notes 76mm X 76mm'),
                Sku::fromString('ACME-002'),
                new Money(299, new Currency('EUR'))
            ),
            new Product(
                ProductName::fromString('Lilac Sticky Notes'),
                ProductDescription::fromString('90 squared notes 76mm X 76mm'),
                Sku::fromString('ACME-003'),
                new Money(299, new Currency('EUR'))
            ),
            new Product(
                ProductName::fromString('Blue Sticky Notes'),
                ProductDescription::fromString('90 squared notes 76mm X 76mm'),
                Sku::fromString('ACME-004'),
                new Money(299, new Currency('EUR'))
            ),
            new Product(
                ProductName::fromString('Pink Sticky Notes'),
                ProductDescription::fromString('90 rectangular notes 76mm X 127mm'),
                Sku::fromString('ACME-005'),
                new Money(399, new Currency('EUR'))
            ),
            new Product(
                ProductName::fromString('Green Sticky Notes'),
                ProductDescription::fromString('90 large rectangular notes 99mm X 147mm'),
                Sku::fromString('ACME-006'),
                new Money(499, new Currency('EUR'))
            )
        );
    }
}
