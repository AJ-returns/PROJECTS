<?php
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
include 'partials/_logoutmodal.php';
echo '<nav class="navbar navbar-expand-lg  bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Projects/futsal">W-Futsal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Projects/futsal">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#venue">Venue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reservations
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">My reservations</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">All reservations</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>';
      if (!$login) {
       
     echo '<button class="btn btn-outline-info " data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button> 
      <button class="btn btn-outline-info mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
      </div>
  </div>
</nav>';}
    else {
      echo '<button class="btn btn-outline-info mx-2" data-bs-toggle="modal" data-bs-target="#logoutmodal">Logout</button>
                <!-- 
                    primary-blue
                    secondary-blackish
                    danger-red
                    warning-orangish yellow
                    success-green
                    info-aqua
                    light-grey
                    dark-black
                -->
      
    </div>
  </div>
</nav>';
 
      }
?>