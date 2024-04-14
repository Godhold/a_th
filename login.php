<!DOCTYPE html>


<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Ashesi Travel Hub | Home - Welcome to the Official Website</title>

 <?php include("includes/head.php"); ?>
</head>
<body>
  <!-- navigation -->
<header class="navigation fixed-top">

<?php include("includes/header.php");  ?>
</header>
<!-- /navigation -->
    <section class="section">
    <div class="py-4"></div>
    <div class="container">
        <div class="row">

        <div class="col-lg-8 mx-auto">
        
        <div class="content mb-5">
          <h2 id="we-would-love-to-hear-from-you">Login to Share your Travel Experience Now!</h2>

          <?php
            if(isset($_POST['login'])){
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
               
                
                                $query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
                                $login = mysqli_query($connect,$query);
                                if(!$login){
                                   // echo mysqli_error($connect);
                                    echo '<div class="alert alert-danger">
                                        Incorrect Logins
                                    </div>';
                                    
                                }else{
                                    if(mysqli_num_rows($login)){
                                        $login_row = mysqli_fetch_assoc($login);
                                        $_SESSION['role']=$login_row['user_role'];
                                        $_SESSION['email']=$login_row['email'];
                                        $_SESSION['id']=$login_row['id'];
                                        $_SESSION['login']=1;
                                        header("Location:./index.php");
                                    }else{
                                        echo '<div class="alert alert-danger">
                                        Incorrect Logins
                                    </div>';
                                    }
                                   
                                    
                                }
                }
                
            ?>
        
        </div>
        
        <form method="POST" class='mb-3' enctype='multipart/form-data'>
                <div class="card-header text-center">
                    <h2>Login Here</h2>
                </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" id="Password" class="form-control" placeholder='*********' required>
          </div>
          
          <button type="submit" name='login' class="btn btn-info">Login</button>
        </form>
        <a href="register" class=''>I dont have an Account, Register here</a>

      </div>


        </div>
    </div>
    </section>
<footer class="footer">
  <?php include("includes/footer.php"); ?>
  </footer>


  <!-- JS Plugins -->
  <script src="plugins/jQuery/jquery.min.js"></script>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>

  <script src="plugins/slick/slick.min.js"></script>

  <script src="plugins/instafeed/instafeed.min.js"></script>


  <!-- Main Script -->
  <script src="js/script.js"></script></body>
</html>