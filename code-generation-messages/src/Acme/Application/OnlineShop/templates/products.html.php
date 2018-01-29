<?php /** @var \Acme\OnlineShop\Products|\Acme\OnlineShop\Product[] $products */ ?>
<?php $formatter = new \Money\Formatter\DecimalMoneyFormatter(new \Money\Currencies\ISOCurrencies()); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Acme, Inc. - Products</title>
    <link href="/enough.css" rel="stylesheet" type="text/css" />
    <link href="/acme.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <article>
      <h1>Acme, Inc. - Products</h1>
      <table>
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product): ?>
            <tr>
              <th scope="row"><?= esc($product->name()); ?> (<?= esc($product->description()); ?>)</th>
              <td><?= esc($formatter->format($product->price())); ?> <?= esc($product->price()->getCurrency()->getCode()); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </article>
  </body>
</html>
