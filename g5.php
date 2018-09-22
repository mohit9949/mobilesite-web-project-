        <?php
        session_start();
        if(!$_SESSION['SName']){
           session_destroy();
           header("location:index.html");
           exit();
        }?>
<!DOCTYPE html>
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
<div class="card mb-3" style="padding-top: 2cm;">
  <img class="card-img-top" src="lgg5.jpg" alt="Card image cap" >
  <div class="card-block">
    <h2 class="card-title">LG G5</h2>
    <ul>
    	<li><p style="font-size: 15px">16MP Primary Camera</p></li>
                      <li><p style="font-size: 15px">2800 mAh Li-Ion Battery</p></li>
                      <li><p style="font-size: 15px">4 GB RAM|32GB ROM|Expandable Upto 200 GB</p></li>

    </ul>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
 <h3 style="font-family: Ubuntu, sans-serif; font-size: 18px;"> Price:<i class="fa fa-inr"></i> 59,999</h3></center>
 <button type="button" class="btn btn-warning" onclick="myFunction()">Buy Now</button>
</body>
</html>