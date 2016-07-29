 <?php //include("auth.php"); //include auth.php file on all secure pages ?>
  <?php //include("logedinHeader.php"); //include file on all secure pages ?>
  <?php include("mainHeader.php"); //include file on all secure pages ?>
   <?php include("db.php"); //include db.php file ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google Ajax Support -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
  <!-- BootStrap CDN --> 
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
 <!-- custom Styling -->
  <link rel="stylesheet" href="Styles/WebStore.css">

  <!-- Dashboard Styles  Templates-->


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- custom bubble comment Box -->
    <link rel="stylesheet" href="Styles/avater.css">


</head>
<body id="signinHomebody" >
  
 
    <div >

    
          <div id="page-wrapper">

            <div class="container-fluid">

 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Product Details
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-th-large" aria-hidden="true"></i> Product</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"> 
                                
                                <?Php

                                    $getid=$_GET['id'];

                                    $_SESSION['productid']=$getid;

                                    $sql = "SELECT * From products where productid =  '$getid'  ";

                                    
                                        
                                     
                                    $result = mysql_query($sql) or die(mysql_error());
                                     
                                     echo '<div class="table-responsive">';
                                        echo '<table class="table table-bordered">';
                                                                        
                                           echo '<tr class="tableHeaderColor">
                                                     
                                                      <th>Product</th>
                                                      <th>Name</th>
                                                      <th>Price(<i class="fa fa-usd" aria-hidden="true"></i>)</th>
                                                      <th>ProductDescription</th>
                                                      <th>Add  Cart</th>
                                                      <th>View Cart</th>
                                                      
                                                     </tr>';
                                                     
                                                    
                                                   
                                        $row = mysql_fetch_array($result);
                                        
                                       
                                         echo '<tr>';
                                          
                                            echo '<td> <a href="#"> <img src="'.$row['productimage'] .'" class="viewImage"/></td>';
                                             echo '<td>'.$row['productname'].'</td>';
                                               echo '<td>'.$row['productprice'].'</td>'; 
                                               echo '<td>'.$row['productdetail'].'</td>';
                                                echo '<td> <a href="customerAddCart.php?page=product&action=add&id='.$row['productid'].'" class="btn btn-success btn-lg" >Add Cart </a></td>';

                                                echo '<td> <a href="customerCart.php" class="btn btn-success btn-lg" >View Cart </a></td>';
                                                
                                               

                                                  echo '</tr>';
                                                      
                                        

                                          
                                        echo '<table>';

                                        echo '</div>';

                                ?>



                          <!-- Add Comment box  -->
<!-- 
                  <?php
                     $adminnotallowid="SELECT productadmin From products Where productid='$getid'";
                      $result = mysql_query($adminnotallowid) or die(mysql_error());
                      $row = mysql_fetch_array($result);

                      if(!($row['productadmin'] == $_SESSION['id'])){
                   ?>
                  <div class="bubble-list ">
                    <div class="bubble clearfix">
                     <img  src="<?php echo $_SESSION['ImagePath']; ?>"  />
                     <div class="bubble-content ">
                  <form action="addReview.php" method="POST">
                    <textarea name="usercomment" class="textarea"></textarea>
                    <button class="btn btn-primary  btn-xs">Comment</button>
                  </form>

                     <div class="triangle"></div>
                     <br/>
                    
                    <div>

                  <?php
                    }
                    ?>  -->





                                </div>
                            </div>
                        </div>
                    </div>
                </div>





    


                  <!-- comments dispaly code -->


                 <?php
                     $fetchreviews="SELECT * From reviews Where reviewproductid='$getid'";
                      $result = mysql_query($fetchreviews) or die(mysql_error());

                                            
                       $admin=" superadmin";
                      $product_admin=" productadmin";
                                           
                       
                    // While loop start
                  while ($row = mysql_fetch_array($result)){
                       $reviewid=$row['reviewid'];
                        $userid=$row['U_Id'];
                         $imagepath="SELECT ImagePath From users where id='$userid'"; 
                          $results = mysql_query($imagepath) or die(mysql_error());
                          $imagepath = mysql_fetch_array($results);
                           
                   ?>
                   
                  
                  <div class="bubble-list ">
                  <div class="bubblelistStyle">
                    <div class="bubble clearfix">
                     <img  src="<?php echo $imagepath['ImagePath']; ?>"  />

                     <div class="bubble-content ">
                        
                      <?php echo $row['reviewdetail']; ?>

                     <div class="triangle"></div>
                     <br/>
                      
                    </div>

                    </div>
                      </div>
                        </div>

                  
                    
                  <?php
                    }  // while loop ending..
                    ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>





</body>
</html>










                 <!-- Add to cart code -->

<?php
if(isset($_GET['action']) && $_GET['action']=="add"){
  $id=intval($_GET['id']);
  if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['quantity']++;
    
  }else{
    $sql_p="SELECT * FROM products WHERE productid= '$getid' ";
    $query_p=mysql_query($sql_p);
    if(mysql_num_rows($query_p)!=0){
      
      $row_p=mysql_fetch_array($query_p);
      $_SESSION['cart'][$row_p['productid']]=array("quantity" => 1, "price" => $row_p['productprice']);
      
    }else{
      $message="Product ID is invalid";
    }
  }
}
?>

