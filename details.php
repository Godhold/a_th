<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Ashesi Travel Hub | Post Details</title>

  <?php include("includes/head.php") ?>
</head>
<body>
  <!-- navigation -->
<header class="navigation fixed-top">

    <?php include("includes/header.php") ?>
</header>
<!-- /navigation -->

<div class="py-4"></div>
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class=" col-lg-9   mb-5 mb-lg-0">
        <?php
        $post_id = $_GET['post_id'];
        $get_post = mysqli_query($connect,"SELECT * FROM post  WHERE id = '{$post_id}'");
        
            $post_row = mysqli_fetch_assoc($get_post);
                $post = $post_row['post'];
                $date_created = $post_row['date_created'];
                $user_id = $post_row['user_id'];
                $post_banner = $post_row['post_banner'];
                $title = $post_row['title'];
                $tags = $post_row['tags'];
                $map = $post_row['map'];
                $category = $post_row['category'];
                $rating = $post_row['ratings'];
                $ratings = $post_row['ratings'];
                $rate_val = $ratings==''?0:$ratings;

        ?>
        <article>
          <div class="post-slider mb-4">
            <img src="<?php echo $post_banner ?>" class="card-img" alt="post-thumb">
          </div>
          
          <h1 class="h2"><?php echo $title; ?> </h1>
          <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <?php 
                $get_post_owner = mysqli_query($connect,"SELECT * FROM users WHERE id = '{$user_id}'");
                if(!$get_post_owner){
                    echo "Error";
                }else{
                    $user_row = mysqli_fetch_assoc($get_post_owner);
                    $name = $user_row['name'];
                    $profile = $user_row['profile'];
                }

                ?>
                <a href="details?post_id=<?php echo $id ?>" class="card-meta-author">
                  <img src="<?php echo $user_row['profile'] ?>">
                <span><?php echo $name; ?></span>
                </a>
              </li>
              <!-- <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li> -->
              <li class="list-inline-item">
                <i class="ti-calendar"></i><?php echo $date_created ?>
              </li>
              <li class="list-inline-item">
              <?php echo str_repeat('<i class="ti-star text-danger"></i>',$rate_val); ?>
            </li>
            <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <?php  
                      $tags_replace =str_replace(","," ",$tags);
                      $tags_split = explode(" ",$tags_replace);
                     // print_r($tags_split);
                      foreach($tags_split as $item){
                        if($item!=''){
                    ?>
                        <li class="list-inline-item"><a href="tag_view?tag=<?php echo $item ?>">
                            <?php echo $item;}?>
                        </a></li>
                  <?}?> 
                </ul>
              </li>
            </ul>
          <div class="content"><p>
                <?php echo $post; ?>
          </p>
            
          </div>
        </article>
        
      </div>

      <div class="col-lg-9 col-md-12">
          <div class="mb-5 border-top mt-4 pt-5">
              <h3 class="mb-4">View My Location Map</h3>
                    <?php echo $map; ?>
          </div>

          <div>
              <h3 class="mb-4">Rate the Post</h3>
              <?php
              if(isset($_POST['rate'])){
                $rating = $_POST['rating'];
                $post_id = $_GET['post_id'];
                $update = mysqli_query($connect,"UPDATE post SET ratings = '{$rating}' WHERE id = '{$post_id}'");
                if($update){
                  echo  '<div class="alert alert-success">
                        Post Rated
                    </div>';
                }
              }

              ?>
              <!-- <i class="ti-facebook"></i> -->
              <form method="POST">
                  <div class="row">
                      <div class="form-group col-md-12">
                          <select name="rating" id="" class='form-control'>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5  </option>
                          </select>
                      </div>
                      
                  </div>
                  <button name='rate' class="btn btn-primary" type="submit">Rate Now</button>
              </form>
          </div>
      </div>
      
    </div>
  </div>
</section>

<footer class="footer">
<?php  include("includes/footer.php") ?>
  </footer>


  <!-- JS Plugins -->
  <script src="plugins/jQuery/jquery.min.js"></script>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>

  <script src="plugins/slick/slick.min.js"></script>

  <script src="plugins/instafeed/instafeed.min.js"></script>


  <!-- Main Script -->
  <script src="js/script.js"></script></body>
</html>