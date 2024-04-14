<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Ashesi Travel Hub | My Profile</title>

<?php include("includes/head.php") ?>
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
<?php include("includes/header.php") ?>
</header>
<!-- /navigation -->

<div class="author">
	<div class="container">
		<div class="row no-gutters justify-content-center">
			<div class="col-lg-3 col-md-4 mb-4 mb-md-0">
				<?php 

				$get_profile = mysqli_query($connect,"SELECT * FROM users WHERE id = '{$_SESSION['id']}'");
				if(!$get_profile){
					echo "EEROR";
				
				}else{
					$profile_row = mysqli_fetch_assoc($get_profile);
				}
				?>
				
				<img class="author-image" src="<?php  echo $profile_row['profile'] ?>">
				
			</div>
			<div class="col-md-8 col-lg-6 text-center text-md-left">
				<h3 class="mb-2"><?php echo $profile_row['name']; ?></h2>
					<strong class="mb-2 d-block  bg-primary text-center border-lg"  style='width:100px;border-radius:20px;'><?php echo $profile_row['user_role']; ?></strong>
					<div class="content">
						<h4>My Preferences</h4>
					 <table class="card-meta-tag list-inline">
						<?php $user_id = $_SESSION['id'];
						$get_preferences = mysqli_query($connect,"SELECT * FROM preferences WHERE user_id = '{$user_id}'");
						while($preference_row = mysqli_fetch_assoc($get_preferences)){
							$preference = $preference_row['preference_name'];
							?>
							<tr>
								<td class="list-item"><?php echo $preference ?></td>
							 </tr>
							<?}?>

					  </div>
					</table>

					
			</div>
		</div>
	</div>
	
	<svg class="author-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
			stroke-miterlimit="10" />
		<path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
		<path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
			stroke-miterlimit="10" />
	</svg>

	
	<svg class="author-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
		<g filter="url(#filter0_d)">
			<path class="path"
				d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
			<path
				d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
				stroke="#040306" stroke-miterlimit="10" />
		</g>
		<defs>
			<filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
				color-interpolation-filters="sRGB">
				<feFlood flood-opacity="0" result="BackgroundImageFix" />
				<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
				<feOffset dy="4" />
				<feGaussianBlur stdDeviation="2" />
				<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
				<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
				<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
			</filter>
		</defs>
	</svg>

	
	<svg class="author-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
			stroke-miterlimit="10" />
		<path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
		<path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
			stroke-miterlimit="10" />
	</svg>

	
	<svg class="author-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
      stroke-width="2" />
  </svg>
</div>

<section class="section-sm" id="post">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-8 mx-auto">
				<div class="card mb-4">
					<?php
					if(isset($_POST['save_preferences'])){
					$preference = $_POST['preference'];
					$user_id = $_SESSION['id'];
					$save_preference = mysqli_query($connect,"INSERT INTO preferences (preference_name,user_id) VALUES ('{$preference}','{$user_id}')");
					if(!$save_preference){
						echo "Error";
					}else{
						echo	'<div class="alert alert-success">
							Preferences Saved
						</div>';
					}
				}
					?>
					
					<div class="card-body">
					<h5>Set Preferences</h5>
					 <form action="" method='POST'>
					 <div class="form-group">
						<label for="preference">Preference</label>
						<select name="preference" class="form-control" id="preference" required>
							<option value="">Preferences</option>
							<option value="student"> Luxury travel</option>
							<option value="faculty">Educational Travel</option>
							<option value="staff">Business Travel</option>
							<option value="Honeymoon travel">Honeymoon travel</option>
							<option value="Pilgrimage travel">pilgrimage travel</option>
							<option value="Religious tourism">Religious tourism</option>
							<option value="Medical tourism">Medical tourism</option>
							<option value="Volunteer travel">Volunteer travel</option>
							<option value="America"> America</option>
							<option value="Uk">Uk</option>
							<option value="Europe">Europe</option>
							<option value="Asia">Asia</option>
							<option value="Africa">Africa</option>
							<option value="Australia">Australia</option>
							<option value="Hotel">Hotel</option>
							<option value="Car">Car</option>
							<option value="Bus">Bus</option>
							<option value="Taxi">Taxi</option>
							<option value="Train">Train</option>
							<option value="Areoplane">Areoplane</option>
						</select>
					</div>
					<button tyupe='submit' name='save_preferences' class="btn btn-primary">Save My Preferences</button>
					 </form>

					</div>
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