<?php
    session_start();
    require_once('shipper_function.php');
    // Set Variables for featured products
    $featuredProductsNames = array();
    $featuredProducts = readFeaturedProducts();
    $featuredProductsCount = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shipper.css">
    <title>Order detail</title>
</head>
<body>
<?php
        require_once('header.php')
?>
    <table class="orders">'
        <thead>
            <tr>
                <th>ID</th>
                <th>Products</th>
                <th>Total</th>
                <th>Name</th>
                <th>Address</th>
                <th>Order time</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($featuredProducts as $featuredProduct) {
                    $id = $featuredProduct['id'];
                    $products = $featuredProduct['products'];
                    $total = $featuredProduct['total'];
                    $name = $featuredProduct['name'];
                    $adress = $featuredProduct['address'];
                    $order_time = $featuredProduct['created_at'];
                    if($featuredProduct['id'] == $_GET['id'] ){  
                    echo "
                        <tr>
                            <td>$id</td>
                            <td>$products</td>
                            <td>$$total</td>
                            <td>$name</td>
                            <td>$adress</td>
                            <td>$order_time</td>
                        </tr>
                        
                        ";}        
                    }
                ?>
        </tbody>
    </table> 
<?php
        require_once('footer.php')
?>

    
</body>
</html>
