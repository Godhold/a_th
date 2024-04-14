<!DOCTYPE html>


<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Ashesi Travel Hub | Home - Welcome to the Official Website</title>

 <?php include("includes/head.php"); ?>
</head>
<body>
    <?php
            if(($_SESSION["login"])==1){
        
            }else{
                
                header("Location:./login");
            }
    ?>
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
          <h2 id="we-would-love-to-hear-from-you">Share your Travel Experience Now!</h2>

          <?php
            if(isset($_POST['save_post'])){
                $title = trim(mysqli_real_escape_string($connect,$_POST['title']));
                $post = trim(mysqli_real_escape_string($connect,$_POST['post']));
                $tags = trim(mysqli_real_escape_string($connect,$_POST['tags']));
                $category = trim(mysqli_real_escape_string($connect,$_POST['category']));
                $map = trim(mysqli_real_escape_string($connect,$_POST['map']));
                $banner_tmp = $_FILES['banner']['tmp_name'];
                $banner_name = $_FILES['banner']['name'];
                $user_id = $_SESSION['id'];
                

                            $new_directory = './post_banners';
                            $banner_url = $new_directory.'/'.$banner_name;
                            $move_file = move_uploaded_file($banner_tmp,$banner_url);
                            
                            if($move_file){
                                $query = "INSERT INTO post (title,post,tags,category,post_banner,user_id,map) VALUES ('{$title}','{$post}','{$tags}','{$category}','{$banner_url}','{$user_id}','{$map}')";
                                $create_post = mysqli_query($connect,$query);
                                if(!$create_post){
                                    echo mysqli_error($connect);
                                    echo '<div class="alert alert-danger">
                                        Unable to Create Post, try another time
                                    </div>';
                                    
                                }else{
                                    header("Location:./index.php");
                                }
                            }else{
                                echo '<div class="alert alert-danger">
                                        Invalide File Extension, try anther Format
                                    </div>';
                            }
                    }
                

            ?>
        
        </div>
        
        <form method="POST" class='mb-3' enctype='multipart/form-data'>
        <div class="card-header text-center">
                    <h2>Add your Experience</h2>
                </div>
          <div class="form-group">
            <label for="title">Set Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Post Title" required>
          </div>
          <div class="form-group">
            <label for="banner">Post Banner(Share Your Post Featured Image)</label>
            <input type="file" name="banner" accept='image/png,image/jpeg,image/jpg,image/gif' id="banner" class="form-control" required>
          </div>
          
          
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category" required>
                <option value="">Category</option>
                <option value="America"> America</option>
                <option value="Uk">Uk</option>
                <option value="Europe">Europe</option>
                <option value="Asia">Asia</option>
                <option value="Africa">Africa</option>
                <option value="Australia">Australia</option>
            </select>
          </div>
          <div class="form-group">
            <label for="PasswordC">Tags (Separated with Commas (,))</label>
            <input type="text" name="tags" id="tags" class="form-control" placeholder='Tags eg. Student, Teacher, Academic, Experience' required>
          </div>

          <div class="form-group">
            <label for="map">Share on Map - <a target='_window' href="https://www.google.com/maps">Get Google Map Embed</a> </label>
            <input type="text" name="map" id="map" class="form-control" placeholder='Example - <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4046783.8258010466!2d-3.673123012118863!3d7.901616489444894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfd75acda8dad6c7%3A0x54d7f230d093d236!2sGhana!5e0!3m2!1sen!2sgh!4v1713063404154!5m2!1sen!2sgh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' required>
          </div>

          <div class="form-group">
            <label for="post">Write Post here</label>
            <textarea  name="post"  class="form-control" placeholder="Your post here" required></textarea>
          </div>
          
          
          <button type="submit" name='save_post' class="btn btn-primary">Share My Experience</button>
        </form>

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