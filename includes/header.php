<div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="/">
        <img class="img-fluid" width="150px" src="ath.jpg"
          alt="Alumni Travel Hub | Sharing Unimaginable Traveling Experience">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="/">My Feeds</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./post">Create Feed</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./all-profiles">All Profiles</a>
          </li>
          
            <?php
                    if(isset($_SESSION["login"])&&($_SESSION["login"])==1){?>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Account <i class="ti-angle-down ml-1"></i>
                                </a>
                            <div class="dropdown-menu">
              
                            <a class="dropdown-item" href="my-profile">Profile</a>
                            
                            <a class="dropdown-item" href="logout">Logout</a>
                            
                            </div>
                            </li>
                   <?php }else{?>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="login">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="register">Register</a>
                            </li>
                        
                   <?php }?>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="all_profiles">Profiles</a>
                            </li> -->
            
          

          
        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>

    </nav>
  </div>