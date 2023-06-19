<?php
    session_start();
    require_once('shipper_function.php');
    // Set Variables for featured products
    $featuredProductsNames = array();
    $featuredProducts = readFeaturedProducts();
    $featuredProductsCount = 0;
?>
<?php
                
                if(isset($_POST['submit'])){
                $id_order = $_POST['id']; 
                $input = fopen('../data/order.csv', 'r');  //open for reading
                $output = fopen('../data/temporary.csv', 'a'); //open for writing
                $new_status= $_POST['status'];
                $count = 0;
                while( false !== ( $data = fgetcsv($input) )){  //read each line as an array
                    //modify data here
                    if ($new_status[$count] != $data[7] && $new_status[$count] != 'status'){
                       //Replace line here
                       $data[7] = $new_status[$count];
                    }
                    $count++;
                    //write modified data to new file
                    fputcsv( $output, $data);
            
                }
                //close both files
                fclose( $input );
                fclose( $output );
                //clean up
                unlink('../data/order.csv');// Delete obsolete BD
                rename('../data/temporary.csv', '../data/order.csv'); 
                header("Location: shipper.php");
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shipper.css">
    <title>Document</title>
</head>
<body>
<?php
        require_once('header.php')
?>
<form action='' method='post'>
    <table class="orders">'
        <thead>
            <tr>
                <th>ID</th>
                    <input type='hidden' name='id[]' value='id'>
                <th>Products</th>
                <th>Status
                    <input type="hidden" name='status[]' value="status">
                </th>
            </tr>
        </thead>

        <tbody>
            <?php
                $count_id = 1;
                foreach ($featuredProducts as $featuredProduct) {
                    $id = $featuredProduct['id'];
                    $products = $featuredProduct['products'];
                    $status = $featuredProduct['status'];
                    $hub = $featuredProduct['hub'];
                    if($status == "Active" && $hub == $_SESSION['hub'] ){  
                    echo "
                        <tr>
                            <td><a class='id_link' href='..\www\order_detail.php?id=".$id."'>$id</a><input type='hidden' name='id[]' value='$count_id'></td>
                            <td>$products</td>
                            <td><select name='status[]' class='status'>
                                <option value='$status' selected='selected'>$status</option>
                                <option value='Canceled'>Canceled</option>
                                <option value='Delivered'>Delivered</option>
                            </select>
                            </td>
                        </tr>
                        
                        ";} else{
                            echo "
                            <tr class='invisible'>
                                <th>$id <input type='hidden' name='id[]' value='$count_id'></th>
                                <th>$products</th>
                                <th><select name='status[]'>
                                    <option value='$status' selected='selected'>$status</option>
                                    <option value='Canceled'>Canceled</option>
                                    <option value='Delivered'>Delivered</option>
                                </select>
                                </th>
                            </tr>";
                        }
                        $count_id++;
                        $featuredProductsCount++;
                        if ($featuredProductsCount == 45) {
                            break;
                        }         
                    }
                ?>
            <tr>
                <td> </td>
                <td> </td>
                <td> <button class="form_button" type="submit" name="submit" >Submit</button> </td>
            </tr>
        </tbody>
    </table> 
</form>
<?php
        require_once('footer.php')
?>

</body>
</html>
