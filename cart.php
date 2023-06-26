<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="about.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="mt-3 ms-2">
        <nav id="nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="Buy.php">Product</a></li>
                <li><a href="cart.php">cart</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
<div class="col-lg-8">
    <table class="table">
    <thead class="text-center">
        <tr>

         <th scope="col">Item</th>
         <th scope="col">Price</th>
   
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        
        session_start();
        $total=0;
      
        if(isset($_SESSION['cart']))
        {
        foreach($_SESSION['cart'] as $key => $value)
        {
            $total=$total+$value['price'];
        echo"
        <tr>
        <td>$value[Item_name]</td>
        <td>$value[price]</td>
        <form method='post' action='managecart.php'>
        <td><button name='pp' class='btn btn-sm btn-outline-danger'>REMOVE</button><td>
        <input type='hidden' name='Item_name' value='$value[Item_name]'>
        </form>
        ";
           }
        }
        ?>
        </div>
    </table>
    </div>
    <div class="col-lg-4">
        <div class="border bg-light rounded p-4">
            <h4>Total:</h4>
            <h5 class="text-right"><?php
            echo"$total";
            ?></h3>
            <form>
                <button class="btn btn-primary btn-block" name="remove_item">Make the purchase</button>
             </form>
        </div>

    </div>
</body>
</html>