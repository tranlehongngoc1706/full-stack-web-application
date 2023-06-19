<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="help.css">
    <title>Help</title>
</head>
<body>
<?php 
  require_once ('header.php') ?> 
    <div class="help">

        <div class="eachQues">
            <button class="btn">My Account</button>    
            <p class="context" >
                <details>
                    <summary>Manage My Acount</summary>
                    <p>Protect your account</p>
                </details>
                <details>
                    <summary>Cancellation</summary>
                    <p>How to cancel your order</p>
                </details>
                <Details>
                    <summary>Delete account</summary>
                    <p>How to delete your account</p>
                </Details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Refunds</button>    
            <p class="context" >
                <details>
                    <summary>Refund process</summary>
                    <ul>FAQs about refund</ul>
                </details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Vouchers & Promotions</button>    
            <p class="context active">
            <Details>
                <summary>Vouchers</summary>
                <ul>Why Vouchers don't work</ul>
                <ul>Hwo to check my Vouchers</ul>
                <ul>How to use Vouchers</ul>
                <ul>Policies and Conditions of using Voucher</ul>
                <ul>FAQs about Vouchers</ul>
            </Details>
            <Details>
                <summary>Cashback</summary>
                <ul>FAQs-Cashback</ul>
                <ul>Information about Cashback</ul>
            </Details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Returns</button>    
            <p class="context" >
            <Details>
                <summary>An overview of Returns</summary>
                <ul>What is Return to Merchant?</ul>
                <ul>An overview of Returns</ul>
            </Details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Shipping</button>
            <p class="context" >
            <Details>
                <summary>Delivery</summary>
                <ul>What are the most important ...</ul>
            </Details>
            <Details>
                <summary>Shipping</summary>
                <ul>Why is your order failed attemp</ul>
            </Details>
            <Details>
                <summary>Track Your Order</summary>
                <ul>Estimated delivery times</ul>
            </Details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Payment</button>
            <p class="context" >
            <Details>
                <summary>Payment Methods</summary>
                <ul>What is COD</ul>
                <ul>How does our web verify credit card information</ul>
            </Details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Products</button>
            <p class="context" >
            <Details>
                <summary>Product Information</summary>
                <ul>Who should I contact if problems occur</ul>
            </Details>
            <Details>
                <summary>VAT</summary>
                <ul>How to add VAT invoice information</ul>
            </Details>
            </p>
        </div>

        <div class="eachQues">
            <button class="btn">Data privacy</button>
            <p class="context" >
            <Details>
                <summary>General</summary>
                <ul>What is Lazada's privacy policy</ul>
            </Details>
            <Details>
                <summary>Access to Personal Data</summary>
                <ul>How do i access my personal data this is stored on the website</ul>
            </Details>
            </p>
        </div>
        <div class="eachQues">
            <button class="btn">Community Policies</button>
            <p class="context" >
            <Details>
                <summary>Community Policies</summary>
                <ul>Dos and Donts </ul>
            </Details>
            </p>
        </div>
    </div>
    <?php require_once ('footer.php') ?>
<script src="help.js"></script>
</body>
</html>