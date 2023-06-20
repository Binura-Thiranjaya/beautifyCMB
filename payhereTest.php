<?php

// set POST variables
$url = 'https://sandbox.payhere.lk/pay/checkout'; // payment gateway URL
$fields = array(
    'merchant_id' => '121XXXX', // Replace your Merchant ID
    'return_url' => 'http://sample.com/return',
    'cancel_url' => 'http://sample.com/cancel',
    'notify_url' => 'http://sample.com/notify',
    'order_id' => 'ItemNo12345',
    'items' => 'Door bell wireless',
    'currency' => 'LKR',
    'amount' => '1000',
    'first_name' => 'Saman',
    'last_name' => 'Perera',
    'email' => 'samanp@gmail.com',
    'phone' => '0771234567',
    'address' => 'No.1, Galle Road',
    'city' => 'Colombo',
    'country' => 'Sri Lanka',
    'hash' => '098F6BCD4621D373CADE4E832627B4F6' // Replace with generated hash
);

// create hidden input fields for the form
$inputs = '';
foreach ($fields as $key => $value) {
    $inputs .= "<input type='hidden' name='$key' value='$value' />";
}

// create the form
$form = "<form id='payment-form' method='post' action='$url'>$inputs</form>";

// output the form and JavaScript code to submit it
echo $form;
echo "<script type='text/javascript'>document.getElementById('payment-form').submit();</script>";

?>