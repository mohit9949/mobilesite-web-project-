        <?php
        session_start();
        if(!$_SESSION['SName']){
           session_destroy();
           header("location:index.html");
           exit();
        }?>
      <html>
      <head>
       <script>
function myFunction() {
    alert("[*] Mail is sent to your email regarding your purchase. Thank you.");
}
</script>
      <link rel="stylesheet" href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="style.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <title>Mobibazar</title>
        <link rel="shortcut icon" href="mohit.ico"/>
        <style>body { font-family: Ubuntu, sans-serif; }
               
        </style>
        </head>
        <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>                        
                 </button>
                 <a class="navbar-brand" href="check.php" style="color: white; font-family: Ubuntu, sans-serif;"><img class="img-responsive center-block" src="mohit.png" alt="Mohit logo" width="15" height="10" style="padding-bottom: 3px;">Mobibazar</a>
              </div>
              <div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
              <?php $name=$_SESSION["SName"] ?>
                <li><a href="#" style="color: white; font-family: Ubuntu, sans-serif;"><?php print($_SESSION['SName']);?></a></li>
                <li><a href="logout.php" style="color: white; font-family: Ubuntu, sans-serif;">Logout</a></li>
                <li><a href="About.html " style="color: white; font-family: Ubuntu, sans-serif;">ABOUT</a></li>  
              </ul>
            </div>
          </div>
        </div>
      </nav> 
     <?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>
<br>
<br>
<br><br>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="check.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>  
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr> 
<?php   
    foreach ($_SESSION["cart_item"] as $item){
    ?>
        <tr>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"> <i class="fa fa-inr"></i><?php echo $item["price"]; ?></td>
        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="check.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
        </tr>
        <?php
        $item_total += ($item["price"]*$item["quantity"]);
    }
    ?>
<tr>
<td colspan="5" align=right><strong>Total:</strong><i class="fa fa-inr"></i> <?php echo $item_total;?></td>
<td><center><button type="button" class="btn btn-warning" onclick="myFunction()">Buy Now</button></center></td>
</tr>
</tbody>

</table> 

  <?php
}
?>
</div>

<div id="product-grid">
  <div class="txt-heading">Products</div>
  <?php
  $i=0;
  $page_array=array("iphone7.php","moto.php","sony.php");
  $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
    <div class="product-item">
      <form method="post" action="check.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
      <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="100" height="160"></div>
      <br><br>
      <div><a href=<?php echo $page_array[$i]; ?> ><strong><?php echo $product_array[$key]["name"]; ?></strong></a></div>
      <div class="product-price"><i class="fa fa-inr"></i><?php echo $product_array[$key]["price"]; ?></div>
      <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
      </form>
    </div>
  <?php
    $i++;
      }
  }
  ?>
</div>
</BODY>
</HTML>