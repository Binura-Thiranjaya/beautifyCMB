<?php
session_start();

// Set the timezone to your desired timezone
date_default_timezone_set('Asia/Colombo');


define("DB_HOST", "localhost");

define("DB_USER", "root");

define("DB_PASS", "");

define("DB_NAME", "Beautify");




$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


/*

Configurations

*/


date_default_timezone_set('Asia/Colombo');
$loader = "BeautifyCMB";
$productImageDirectory = "data:image/jpeg;base64,";


//Functions

function db(){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    return $conn;
}

function isLoggedIn(){
    if((isset($_SESSION['logged_in']))){
        if($_SESSION['logged_in']){
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function redirect($url){
    echo "<script>location.href = '$url';</script>";
    exit;
}

function get($data){
    $return = mysqli_real_escape_string(db(), $_GET[$data]);

    return "$return";
}

function post($data){
    $return = mysqli_real_escape_string(db(), $_POST[$data]);

    return "$return";
}

function getCurrentScript(){
    $current_script = basename($_SERVER['PHP_SELF']);

    return "$current_script";
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function currentDatenTime(){
    $data = date('Y-m-d H:i');
    
    return "$data";
}

function categories(){
    $sql = 'SELECT * FROM `categories` ' ;
    $data = db()->query($sql);

    return $data;
}

function isCategoryAvailable($cat){
    $sql = mysqli_query(db(), 'SELECT * FROM `categories` WHERE cat = "'.$cat.'" ') or die(mysqli_error());
    $count = mysqli_num_rows($sql);

    if($count >= 1){
        return true;
    } else {
        return false;
    }
}

function getCatData($cat, $data){
    $sql = mysqli_query(db(), 'SELECT * FROM `categories` where cat = "'.$cat.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result[$data];

    return "$return";
        
}

function jslog($log){
    echo "<script>console.log('$log');</script>";
}

function getProducts($cat){
    $sql = 'SELECT * FROM `products` WHERE product_category = "'.$cat.'" ' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "N/A";
    }

    return $data;
}

function getProductImages($product){
    $sql = 'SELECT * FROM `product_images` WHERE product_uniqueID = "'.$product.'" ORDER BY img_id ASC LIMIT 1,18446744073709551615' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "noimage.png";
    }

    return $data;
}

function getProductAllImages($product){
    $sql = 'SELECT * FROM `product_images` WHERE product_uniqueID = "'.$product.'" ORDER BY img_id ASC' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "noimage.png";
    }

    return $data;
}

function getProductMainImage($product, $data){
    $sql = mysqli_query(db(), 'SELECT * FROM `product_images` WHERE product_uniqueID = "'.$product.'" ORDER BY img_id ASC LIMIT 1') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $count = mysqli_num_rows($sql);
    $return = $result[$data];

    if($count <= 0){
        return "noimage.png";
    }

    return "$return";
}


function isProductExist($product){
    $sql = mysqli_query(db(), 'SELECT * FROM `products` WHERE product_uniqueID = "'.$product.'" ') or die(mysqli_error());
    $count = mysqli_num_rows($sql);

    if($count >= 1){
        return true;
    } else {
        return false;
    }
}

function getProductData($product, $data){
    $sql = mysqli_query(db(), 'SELECT * FROM `products` where product_uniqueID = "'.$product.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result[$data];

    return "$return";
}



function getStock()
{
    $sql = mysqli_query(db(), 'SELECT * FROM `products`') or die(mysqli_error());
    
    if ($sql) {
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;
    } else {
        return null;
    }
}


function getOrderHistory()
{
    $sql = mysqli_query(db(), 'SELECT * FROM `orders`') or die(mysqli_error());
    
    if ($sql) {
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;
    } else {
        return null;
    }
}


function getPaymentHistory()
{
    $sql = mysqli_query(db(), 'SELECT * FROM `payments_history`') or die(mysqli_error());
    
    if ($sql) {
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;
    } else {
        return null;
    }
}


function getFeedback()
{
    $sql = mysqli_query(db(), 'SELECT * FROM `comments`') or die(mysqli_error());
    
    if ($sql) {
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;
    } else {
        return null;
    }
}




function getLatestProducts($limit) {
    $sql = 'SELECT * FROM `products` ORDER BY id DESC LIMIT ' . $limit;
    $data = db()->query($sql);

    if ($data->num_rows == 0) {
        return "N/A";
    }

    return $data;
}


function getMaxLatestProductMens($limit) {
    $sql = 'SELECT p.*, c.cat AS product_category
            FROM products p
            INNER JOIN categories c ON p.product_category = c.cat
            WHERE p.product_category IN ("GENTS")
            ORDER BY p.product_price DESC
            LIMIT ' . $limit;

    $data = db()->query($sql);

    if ($data->num_rows == 0) {
        return "N/A";
    }

    return $data;
}

function getMaxLatestProductLadies($limit) {
    $sql = 'SELECT p.*, c.cat AS product_category
            FROM products p
            INNER JOIN categories c ON p.product_category = c.cat
            WHERE p.product_category IN ("LADIES")
            ORDER BY p.product_price DESC
            LIMIT ' . $limit;

    $data = db()->query($sql);

    if ($data->num_rows == 0) {
        return "N/A";
    }

    return $data;
}



function isUserExistFrom($data, $value){
    $sql = mysqli_query(db(), 'SELECT * FROM `users` WHERE '.$data.' = "'.$value.'" ') or die(mysqli_error());
    $count = mysqli_num_rows($sql);

    if($count >= 1){
        return true;
    } else {
        return false;
    }
}

function setScriptClassActive($script){

    $current_script = getCurrentScript();

    if($script == $current_script){
        return 'active';
    } else {
        return 'not-active';
    }

}

function username(){
    if(isLoggedIn()){
        $user = $_SESSION['user_id'];

        return "$user";
    } else {
        return "N/A";
    }
}

function getUserData($data){
    $user = username();
    $sql = mysqli_query(db(), 'SELECT * FROM `users` where user_uniqueID = "'.$user.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result[$data];

    return "$return";
}

function isCouponApplicableStatus($coupon){
    $sql = mysqli_query(db(), 'SELECT * FROM `coupons` where coupon_code = "'.$coupon.'" ') or die(mysqli_error());
    $data = mysqli_fetch_array($sql);
    $count = mysqli_num_rows($sql);

    if($count >= 1){
        $isExpired = $data['expired'];
        if($isExpired){
            return "expired";
        } else {
            $isTemp = $data['isTemp'];
            if($isTemp){
                $attempts = $data['attempts'];
                if($attempts >= 1){
                    return "applicable";
                } else {
                    return "noattempts";
                }
            } else {
                return "applicable";
            }
        }

    } else {
        return "invalid";
    }
}

function getCouponData($coupon, $data){
    $sql = mysqli_query(db(), 'SELECT * FROM `coupons` where coupon_code = "'.$coupon.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result[$data];

    return "$return";
}

function sendCustomerOrderMail($to, $toName, $sub, $orderID){
    ob_start();
    include "libraries/phpmailer/templates/orderPlaced.php";
    $HTMLtemplate = ob_get_clean();

    include "libraries/phpmailer/config.php";
    $mail->addAddress($to, $toName);

    $mail->isHTML(true);

    $mail->Subject = $sub;
    
    $mail->MsgHTML($HTMLtemplate);

    $mail->send();
}

function sendAdminOrderMail($sub, $orderID){
    ob_start();
    include "libraries/phpmailer/templates/orderPlacedAdmin.php";
    $HTMLtemplate = ob_get_clean();

    include "libraries/phpmailer/config.php";
    $mail->addAddress('h.kaushi49@gmail.com', "NGA Admin");

    $mail->isHTML(true);

    $mail->Subject = $sub;
    
    $mail->MsgHTML($HTMLtemplate);

    $mail->send();
}



function placeOrder($order_id, $order_by, $order_status, $order_paymentStatus, $order_isCoupon, $order_note, $order_to, $order_toZipCode, $order_products, $order_subTotal, $order_discount, $order_deliveryFree, $order_totalAmount){

    $order_on = currentDatenTime();
    $sql = "INSERT INTO `orders`(`order_id`, `order_by`, `order_on`, `order_status`, `order_paymentStatus`, `order_payment_card`, `order_isCoupon`, `order_note`, `order_to`, `order_toZipCode`, `order_products`, `order_subTotal`, `order_discount`, `order_deliveryFree`, `order_totalAmount`) VALUES ('$order_id','$order_by','$order_on','$order_status','$order_paymentStatus','none','$order_isCoupon','$order_note','$order_to','$order_toZipCode','$order_products','$order_subTotal','$order_discount','$order_deliveryFree','$order_totalAmount')";
    $result = mysqli_query(db(), $sql);

    if($result){
        return true;
    } else {
        return false;
    }

}

function getMyLatest10Orders(){
    $user = username();
    $sql = 'SELECT * FROM `orders` WHERE order_by = "'.$user.'" ORDER BY id DESC LIMIT 10' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "N/A";
    }

    return $data;
}

function getMyOrders(){
    $user = username();
    $sql = 'SELECT * FROM `orders` WHERE order_by = "'.$user.'" ORDER BY id DESC' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "N/A";
    }

    return $data;
}

function getMyLatest10Payments(){
    $user = username();
    $sql = 'SELECT * FROM `payments_history` WHERE done_by = "'.$user.'" ORDER BY id DESC LIMIT 10' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "N/A";
    }

    return $data;
}

function getMyPayments(){
    $user = username();
    $sql = 'SELECT * FROM `payments_history` WHERE done_by = "'.$user.'" ORDER BY id DESC' ;
    $data = db()->query($sql);

    if($data->num_rows == 0){
        return "N/A";
    }

    return $data;
}


function getOrderStatusOrder($orderID){
    $sql = mysqli_query(db(), 'SELECT * FROM `orders` where order_id = "'.$orderID.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result['order_status'];

    if($return == "0"){
        $return = "Pending";
    } else if($return == "1"){
        $return = "Verified";
    } else if($return == "2"){
        $return = "Proccessing";
    } else if($return == "3"){
        $return = "Dispatched";
    } else if($return == "4"){
        $return = "Delivered";
    } else {
        $return = "N/A";
    }


    return "$return";
}

function textPaymentStatus($variable){
    if($variable == "0"){
        $variable = "Pending";
    } else if($variable == "2"){
        $variable = "Verified";
    } else if($variable == "-1"){
        $variable = "Canceled";
    } else if($variable == "-2"){
        $variable = "Failed";
    } else if($variable == "-3"){
        $variable = "Charged Back";
    } else {
        $variable = "N/A";
    }

    return "$variable";
}

function getPaymentStatusOrder($orderID){
    $sql = mysqli_query(db(), 'SELECT * FROM `orders` where order_id = "'.$orderID.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result['order_paymentStatus'];

       
    $return = textPaymentStatus($return);

    return "$return";
}

function updateQuantity($product, $quantity){
    $current_quantity = getProductData($product, "product_stock");

    if($quantity >= $current_quantity){
        $new_quantity = 0; 
    } else {
        $new_quantity = $current_quantity - $quantity;
    }

    if($new_quantity < 0){
        $new_quantity = 0;
    }

    $sql = "UPDATE `products` SET `product_stock` = '$new_quantity' WHERE `products`.`product_uniqueID` = '$product' ";
    $result = mysqli_query(db(), $sql);

    if($result){
        return true;
    } else {
        return false;
    }
}

function orderExist($order){
    $sql = mysqli_query(db(), 'SELECT * FROM `orders` WHERE order_id = "'.$order.'" ') or die(mysqli_error());
    $count = mysqli_num_rows($sql);

    if($count >= 1){
        return true;
    } else {
        return false;
    }
}

function isOrderBelongsToUser($order){
    $sql = mysqli_query(db(), 'SELECT * FROM `orders` WHERE order_id = "'.$order.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $order_by = $result['order_by'];
    $user = username();

    if($order_by == $user){
        return true;
    } else {
        return false;
    }
}

function getOrderData($order, $data){
    $sql = mysqli_query(db(), 'SELECT * FROM `orders` WHERE order_id = "'.$order.'" ') or die(mysqli_error());
    $result = mysqli_fetch_array($sql);
    $return = $result[$data];

    return "$return";
}

function displayDiscount($product){
    $sql = mysqli_query(db(), 'SELECT * FROM `discounts` WHERE product = "'.$product.'" ') or die(mysqli_error());
    $data = mysqli_fetch_array($sql);
    $count = mysqli_num_rows($sql);

    if($count <= 0){
        return;
    }
    $droppedPrice = $data['droppedPrice'];
    $droppedPercentage = $data['droppedPercentage'];

    if($droppedPercentage == "0"){
        $msg = "<sup><del>Rs.$droppedPrice.00</del></sup>";
    } else {
        $msg = "<sup><del>Rs.$droppedPrice.00</del> <a>-$droppedPercentage%</a></sup>";
    }

    return "$msg";
}

function payForOrder($user_mobile, $user_email, $user_firstName, $user_lastName, $order, $orderTotal, $order_address){

    $hash = strtoupper(
    md5(
        '1220939' . 
        $order . 
        number_format($orderTotal, 2, '.', '') . 
        'LKR' .  
        strtoupper(md5('NDEwNDIzODA3MDQwMjEwMzc1NTc3MzAxNDM2MTMzNDc4MjAzMTk4')) 
    ) 
    );
    $username = username();
    // set POST variables
    $url = 'https://sandbox.payhere.lk/pay/checkout'; // payment gateway URL
    $fields = array(
        'merchant_id' => '1220939', // Replace your Merchant ID
        'return_url' => 'http://112.135.216.36/NGA/my-paymentStatus.php',
        'cancel_url' => 'http://112.135.216.36/NGA/my-paymentStatus.php?cancel=true',
        'notify_url' => 'http://112.135.216.36/NGA/my-paymentUpdate.php',
        'order_id' => $order,
        'items' => 'NGA Neutrons',
        'currency' => 'LKR',
        'amount' => $orderTotal,
        'first_name' => $user_firstName,
        'last_name' => $user_lastName,
        'email' => $user_email,
        'custom_1' => $username,
        'phone' => $user_mobile,
        'address' => $order_address,
        'city' => 'Colombo',
        'country' => 'Sri Lanka',
        'hash' => $hash // Replace with generated hash
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
}


class comments{

    public function add(){
        $sql = "INSERT INTO `comments`(`id`, `comment_by`, `comment_product`, `comment_text`, `comment_on`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')";
        $result = mysqli_query(db(), $sql);
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function count($product){
        $sql = mysqli_query(db(), 'SELECT * FROM `comments` WHERE comment_product = "'.$product.'" ') or die(mysqli_error());
        $count = mysqli_num_rows($sql);

        return $count;

    }

    public function fetch($product, $limit){

        if($limit != "*"){
            $sql = 'SELECT * FROM `comments` WHERE comment_product = "'.$product.'"  ORDER BY id DESC LIMIT '.$limit.'' ;   
        } else {
            $sql = 'SELECT * FROM `comments` WHERE comment_product = "'.$product.'"  ORDER BY id DESC ' ;   
        }
        $data = db()->query($sql);

        if($data->num_rows == 0){
            return "N/A";
        }

        return $data;

    }
}
?>

