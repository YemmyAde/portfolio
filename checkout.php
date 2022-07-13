<?php
require 'config/config.php';
header('Content-Type', 'application/json');

$stripe = new Stripe\StripeClient('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');
print_r($stripe);
$session = $stripe->checkout->sessions->create([
    "success_url" => "https://www.cedamoney.com/dashboard",
    "cancel_url" => "https://www.cedamoney.com/bank-transfer",
    "payment_method_types" => ['card', 'alipay'],
    "mode" => 'payment',
    "line_items" => [
        [
            "price_data" =>[
                "currency" =>"gbp",
                "product_data" =>[
                    "name"=> "Mobile",
                    "description" => "Latest mobile 2021"
                ],
                "unit_amount" => 5000
            ],
            "quantity" => 1
        ],

        [
            "price_data" =>[
                "currency" =>"gbp",
                "product_data" =>[
                    "name"=> "Shirt",
                    "description" => "Light summer shirt"
                ],
                "unit_amount" => 2000
            ],
            "quantity" => 2
        ]
    ]
]);

echo json_encode($session);

?>