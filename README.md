ProductFlow PHP Client
==========

## Installation
```
composer require productflowbv/php-client
```

## Set-up connection
```php
$client = new \ProductFlow\API\Client($companyId, $secret);
$productFlow = new \ProductFlow\API\ProductFlow($client);
```

## Get a paginated list of products
```php
$products = $productFlow->product($locale)->list();
```

## Get a single product
```php
$product = $productFlow->product($locale)->show($sku);
```

## Create or update a product
```php
$product = $productFlow->product($locale)->upsert($sku,['title' => $productTitle]);
```

## Delete a product
```php
$product = $productFlow->product($locale)->delete($sku);
```