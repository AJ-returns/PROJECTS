<?php
echo '<nav class="navbar navbar-expand-lg  bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Topics
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" >Contacts</a>
        </li>
      </ul>
      <div class="row mx-2">
      <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success me-2" type="submit">Search</button>
      <button class="btn btn-outline-info ml-2">Login</button> 
      <button class="btn btn-outline-info mx-2">Signup</button>
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
      </form>
      
      </div>
    </div>
  </div>
</nav>';

?>