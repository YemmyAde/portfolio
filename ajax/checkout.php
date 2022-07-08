<?php
require '../config/config.php';
header('Content-Type', 'application/json');

$stripe = new \Stripe\StripeClient("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");

$product = $stripe->products->create([
    'name' => 'Starter Subscription',
    'description' => '$12/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
    'unit_amount' => 1200,
    'currency' => 'usd',
    'recurring' => ['interval' => 'month'],
    'product' => $product['id'],
]);
echo "Success! Here is your premium subscription price id: " . $price->id . "\n";

?>
