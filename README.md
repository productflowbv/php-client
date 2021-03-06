ProductFlow PHP Client
==========

### Installation
```
composer require productflowbv/php-client
```

### Set-up connection
```php
$client = new \ProductFlow\API\Client($companyId, $secret);
$productFlow = new \ProductFlow\API\ProductFlow($client);
```

## Products
### Get a paginated list of products
```php
$products = $productFlow->product($locale)->setPage(1)->list();
```

### Get a single product
```php
$product = $productFlow->product($locale)->show($sku);
```

### Create or update a product
```php
$productFlow->product($locale)->upsert($sku, ['title' => 'Awesome product']);
```

### Delete an product
```php
$productFlow->product($locale)->delete($sku);
```

## Orders
### Get a paginated list of open orders
```php
$orders = $productFlow->order()->setPage(1)->list(['open']);
```

### Get a single order
```php
$order = $productFlow->order()->show($identifier);
```

### Accept a single order
```php
$productFlow->order()->accept($identifier);
```

### Add shipment for an order
```php
$productFlow->shipment()->create($identifier, [
    'identifier' => 'PACK01',
    'method' => 'Shipment name',
    'track_and_trace' => 'ATRACKANDTRACECODE'
]);
```

### Add cancellation for an order
```php
$productFlow->cancel()->create($identifier, []);
```

### Add note for an order
```php
$productFlow->note()->create($identifier, [
    'message' => 'Sample note for this order',
]);
```

## Offers
### Get a paginated list of offers
```php
$productFlow->offer()->setPage(1)->list();
```
### Get a single offer
```php
$productFlow->offer()->show($sku);
```
### Create or update an product offer
```php
$productFlow->offer()->upsert($sku, [
    'title' => 'Awesome product',
    'qty_available' => 2,
    'proposition' => 'Fast delivery',
    'prices' => [
        'EUR' => [
            'sell_price' => 19.95,
            'base_price' => 24.95,
            'suggested_retail_price' => 29.95,
            'purchase_price' => 9.25,
            'cost_price' => 4.50
        ]        
    ]
]);
```

### Delete an offer
```php
$productFlow->offer()->delete($sku);
```

## Misc
### List languages
```php
$languages = $productFlow->language()->list();
```
### List marketplaces
```php
$marketplaces = $productFlow->marketplace()->list();
```