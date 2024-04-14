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
        
        <h1 class="h2 mb-4">Showing items from <mark>Your Search</mark></h1>
        <?php
    if(isset($_POST['search_action'])){
        $search_key = trim($_POST['search_key']);
        $get_post = mysqli_query($connect,"SELECT * FROM post WHERE title LIKE '%$search_key%' OR tags LIKE '%$search_key%' OR post LIKE '%$search_key%' ORDER BY date_created DESC");
        if(!$get_post){
            echo "Error Occured";
            echo mysqli_error($connect);
        }else{
            if(!mysqli_num_rows($get_post)){
              echo  '<div class="alert alert-primary">We could not find Matching Feeds - <a class="btn btn-warning" href="./index.php">All Feeds</a></div>' ;
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
        <?}}
        }
    }?>


        <!--  -->
      </div>

      <aside class="col-lg-4 sidebar-inner">
  <!-- Search -->
  <div class="widget">
    <h4 class="widget-title"><span>Search</span></h4>
    <form action="search.php" method='POST' class="widget-search">
      <input class="mb-3" id="search-query" name="search_key" type="search" placeholder="Type &amp; Hit Enter...">
      <i class="ti-search"></i>
      <button type="submit" name='search_action' class="btn btn-primary btn-block">Search</button>
    </form>
  </div>
  
  <!-- Promotion -->
  <div class="promotion m-3">
    <img src="study______________.jpg" class="img-fluid w-100">
    <div class="promotion-content">
      <h5 class="text-white mb-3">Create Post</h5>
      <!-- <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur sociis. Etiam nunc amet id dignissim. Feugiat id tempor vel sit ornare turpis posuere.</p> -->
      <button onClick="window.location.href='./register'" class="btn btn-primary">Get Started</button>
    </div>
  </div>
  

 

  <!-- Social -->
  <div class="widget">
    <h4 class="widget-title"><span>Social Links</span></h4>
    <ul class="list-inline widget-social">
      <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
    </ul>
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