<?php
include 'config.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>
   <link rel="stylesheet" href="css/admin.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
   <?php
   include 'admin_header.php';
   ?>
   <section class="dashboard">
      <h1 class="title">Dashboard</h1>
      <div class="box-container">
         <div class="box">
         <?php
         $nb=mysqli_query($conn,"SELECT * from `orders` ") or die("query failed");
         $nb_order=mysqli_num_rows($nb);
         ?>
         <h3><?php echo $nb_order ?></h3>
         <p>orders</p>
      </div>
      <div class="box">
         <?php
         $products=mysqli_query($conn,"SELECT * FROM `products` ") or die("query failed");
         $nb_products=mysqli_num_rows($products);
         ?>
         <h3><?php echo $nb_products ?></h3>
         <p>products</p>
      </div>

      <div class="box">
         <?php
         $users=mysqli_query($conn,"SELECT *FROM `user`") or die ("query failed");
         $nb_users=mysqli_num_rows($users);
         ?>
         <h3><?php echo $nb_users?></h3>
         <p>total accounts</p>
      </div>
      <div class="box">
         <?php
           $admin=mysqli_query($conn,"SELECT *FROM `user` WHERE user_type='admin'") or die ("query failed"); $nb_admin=mysqli_num_rows($admin);?>
         <h3><?php echo $nb_admin?></h3>
         <p>admin users</p>
      </div>
      <div class="box">
         <?php
         $client=mysqli_query($conn,"SELECT * FROM `user` WHERE user_type='client'")or die ("query failed");
         $nb_client=mysqli_num_rows($client);
         ?>
         <h3><?php echo $nb_client; ?></h3>
         <p> clients</p>
         </div>
      </div>
   </section>
   <script src="js/admin_script.js"></script>
</body>
</html>