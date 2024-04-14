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
          <h2 id="we-would-love-to-hear-from-you">Register to Share your Travel Experience Now!</h2>

          <?php
            if(isset($_POST['register'])){
                $user_name = trim($_POST['username']);
                $email = trim($_POST['email']);
                $name = trim($_POST['name']);
                $contact = trim($_POST['contact']);
                $profile = $_FILES['profile']['tmp_name'];
                $image_name = $_FILES['profile']['name'];
                $user_name = trim($_POST['username']);
                $role = trim($_POST['role']);
                $password = trim($_POST['password']);
                $passwordc = trim($_POST['passwordc']);

                    $uppercase = preg_match('@[A-Z]@', $password);
                    $lowercase = preg_match('@[a-z]@', $password);
                    $number    = preg_match('@[0-9]@', $password);
                    $specialChars = preg_match('@[^\w]@', $password);

                if(!strlen($password)<8){
                    if($password!==$passwordc){
                        echo '<div class="alert alert-danger">
                                Password mismatch!!
                            </div>';   
                    }else if(!$uppercase||!$lowercase||!$number||!$specialChars){
                        echo "<div class='alert alert-danger'>Password must contain Characters, Uppercase, Lowercase, Numbers</div>";
                    }else{
                       
                            $new_directory = './profile';
                            $profile_url = $new_directory.'/'.$image_name;
                            $move_file = move_uploaded_file($profile,$profile_url);
                            
                            if($move_file){
                                $query = "INSERT INTO users (user_name,email,contact,password,user_role,profile,name) VALUES ('{$user_name}','{$email}','{$contact}','{$password}','{$role}','{$profile_url}','{$name}')";
                                $register = mysqli_query($connect,$query);
                                if(!$register){
                                    echo mysqli_error($connect);
                                    echo '<div class="alert alert-danger">
                                        Unable to Create Account, try another time
                                    </div>';
                                    
                                }else{
                                    echo '<div class="alert alert-success">
                                        User Registered - <a href="./login"><b>Login here</b></a>
                                    </div>';
                                }
                            }else{
                                echo '<div class="alert alert-danger">
                                        Invalide File Extension, try anther Format
                                    </div>';
                            }
                    }

                }else{
                    echo '<div class="alert alert-danger">
                            Password too short
                        </div>'; 
                }

                

                
            }

            ?>
        
        </div>
        
        <form method="POST" class='mb-3' enctype='multipart/form-data'>
        <div class="card-header text-center">
                    <h2>Register Here</h2>
                </div>
          <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" name="username" id="name" class="form-control" placeholder="John Doe" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact</label>
            <input type="tel" name="contact" id="contact" class="form-control" placeholder="Contact" required>
          </div>
          <div class="form-group">
            <label for="profile">Profile</label>
            <input type="file" name="profile" accept='image/png,image/jpeg,image/jpg,image/gif' id="profile" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="profile">Account Type</label>
            <select name="role" class="form-control" id="" required>
                <option value="">Account Type</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="staff">Staff</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" id="Password" class="form-control" placeholder='*********' required>
          </div>
          <div class="form-group">
            <label for="PasswordC">Password Confirm</label>
            <input type="password" name="passwordc" id="PasswordC" class="form-control" placeholder='*********' required>
          </div>
          
          <button type="submit" name='register' class="btn btn-primary">Register</button>
        </form>
        <a href="login" class=''>I have an Account, Login here</a>

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