<?php
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'Item_name');
            if(in_array($_POST['Item_name'],$myitems))
            {
                echo"<script>
                    window.location.href='Buy.php';
                    </script>";
            }
           
                    $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_name'=>$_POST['Item_name'],'price'=>$_POST['price'],'Quantity'=>1);
                echo"<script>
                    window.location.href='Buy.php';
                    </script>";
                
        }
        else
        {
            $_SESSION['cart'][0]=array('Item_name'=>$_POST['Item_name'],'price'=>$_POST['price'],'Quantity'=>1);
            echo"<script>
                    window.location.href='Buy.php';
                    </script>";
        }
    }
    if(isset($_POST['pp']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['Item_name']==$_POST['Item_name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>

                window.location.href='cart.php';
                </script>";

            }
        }
    }
}

?>