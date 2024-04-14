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
      <div
        class="col-lg-8  mb-5 mb-lg-0">
        <button class="btn btn-dark ">
            <a href="post" class='text-light'>
                 Create New Post<i class="ti-pencil-alt"></i>
            </a>
        </button>
        
        <h1 class="h2 mb-4">Showing items from <mark> #<?php  echo $_GET['tag'] ?></mark></h1>
        <?php $tag_name = $_GET['tag'];
        $get_post = mysqli_query($connect,"SELECT * FROM post WHERE tags LIKE '%$tag_name%'  ORDER BY date_created DESC");
        if(!$get_post){
            echo mysqli_error($connect);
        }else{
            while($post_row = mysqli_fetch_assoc($get_post)){
                $post = $post_row['post'];
                $date_created = $post_row['date_created'];
                $user_id = $post_row['user_id'];
                $post_banner = $post_row['post_banner'];
                $title = $post_row['title'];
                $tags = $post_row['tags'];
                $map = $post_row['map'];
                $category = $post_row['category'];
                $id = $post_row['id'];
                $ratings = $post_row['ratings'];
                $rate_val = $ratings==''?0:$ratings;

        ?>
        <article class="card mb-4">
          <div class="post-slider">
            <img src="<?php echo $post_banner ?>" class="card-img-top" style='object-fit:cover;' alt="<?php echo $title ?>">
          </div>
          <div class="card-body">
            <h3 class="mb-3"><a class="post-title" href=""><?php echo $title ?></a></h3>

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
            <p><?php echo substr($post,0,200).'....' ?></p>
            <?php echo $map ?>
            <?php //echo $post ?>
            <a href="details?post_id=<?php echo $id ?>" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
        <?}
    }?>


        <!--  -->
      </div>

  <aside class="col-lg-4 sidebar-inner mt-5">
  <!-- Promotion -->
  <div class="promotion">
    <img src="study______________.jpg" style='object-fit:cover;' class="img-fluid w-100">
    <div class="promotion-content">
      <p class="text-white mb-3">Create An Amazing Experience!</p>
      <p class="text-white mb-4">Join Great Writers as they share their travelling Experience</p>
      <a href="./register" class="btn btn-primary">Get Started</a>
    </div>
  </div>
  

  <!-- -------- -->
 <!-- categories -->
 <div class="widget widget-categories">
    <h4 class="widget-title"><span>Categories</span></h4>
    <ul class="list-unstyled widget-list">
      <li><a href="category?cat=America" class="d-flex">America </a></li>
      <li><a href="category?cat=Europe" class="d-flex">Europe </a></li>
      <li><a href="category?cat=Uk" class="d-flex">Uk </a></li>
      <li><a href="category?cat=Africa" class="d-flex">Africa </a></li>
      <li><a href="category?cat=Asia" class="d-flex">Asia</a></li>
      <li><a href="category?cat=Australia" class="d-flex">Australia </a></li>
    </ul>
  </div><!-- tags -->
  <div class="widget">
    <h4 class="widget-title"><span>Tags</span></h4>
    <ul class="list-inline widget-list-inline widget-card">
    <?php
        $get_tags = mysqli_query($connect,"SELECT tags FROM post");
        if(!$get_tags){
            echo "Error";
        }else{
            while($tags_row = mysqli_fetch_assoc($get_tags)){
                 
                      $tags_replace =str_replace(","," ",$tags_row['tags']);
                      $tags_split = explode(" ",$tags_replace);
                     // print_r($tags_split);
                      foreach($tags_split as $item){
                        if($item!=''){
                    ?>
                        <li class="list-inline-item"><a href="tag_view?tag=<?php echo $item ?>">
                            <?php echo $item;}?>
                        </a></li>
                        <?php
            }
        }
            
    }             
    ?>      
    </ul>
  </div><!-- recent post -->

  <!--  -->
  

  </div>

</aside>

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