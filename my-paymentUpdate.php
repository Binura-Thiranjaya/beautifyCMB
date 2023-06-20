<?php 
include __DIR__.'/includes/database.php';

$merchant_id = $_POST['merchant_id'];
$order_id = $_POST['order_id'];
$payhere_amount = $_POST['payhere_amount'];
$payhere_currency = $_POST['payhere_currency'];
$status_code = $_POST['status_code'];
$md5sig = $_POST['md5sig'];
$done_by = $_POST['custom_1'];

$VisaMaster = false;
if(isset($_POST['card_holder_name'])){
  $VisaMaster = true;
  $card_holder_name = $_POST['card_holder_name'];
  $card_no = $_POST['card_no'];
  $card_no = str_replace('*', '', $card_no);
  $card_expiry = $_POST['card_expiry'];
} else {
  $card_holder_name = 0;
  $card_no = 0;
  $card_expiry = 0;
}

$merchant_secret = 'NDEwNDIzODA3MDQwMjEwMzc1NTc3MzAxNDM2MTMzNDc4MjAzMTk4'; // Replace with your Merchant Secret

$local_md5sig = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        $payhere_amount . 
        $payhere_currency . 
        $status_code . 
        strtoupper(md5($merchant_secret)) 
    ) 
);
       
if ($local_md5sig === $md5sig){
  
  $sql = "INSERT INTO `payments_history`(`done_by`, `merchant_id`, `order_id`, `payhere_amount`, `payhere_currency`, `status_code`, `md5sig`, `card_holder_name`, `card_no`, `card_expiry`) VALUES ('$done_by','$merchant_id','$order_id','$payhere_amount','$payhere_currency','$status_code','$md5sig','$card_holder_name','$card_no','$card_expiry')";
  mysqli_query(db(), $sql);

  $sql2 = "UPDATE `orders` SET `order_paymentStatus` = '$status_code' WHERE `orders`.`order_id` = '$order_id'";
  mysqli_query(db(), $sql2);

  if($status_code == 2){
    if($VisaMaster){
      $sql3 = "UPDATE `orders` SET `order_status` = '1', `order_payment_card` = '$card_no' WHERE `orders`.`order_id` = '$order_id'";
    } else {
      $sql3 = "UPDATE `orders` SET `order_status` = '1' WHERE `orders`.`order_id` = '$order_id'";
    }
    mysqli_query(db(), $sql3);
  }
}
?>
  