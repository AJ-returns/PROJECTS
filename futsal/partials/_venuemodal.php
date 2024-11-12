<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="venue1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="venue1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="venue1Label">Venue -1</h1>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- carousel -->
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/240/70" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/2400/700?grayscale" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/2400/700?grayscale&blur=2" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <p>
                <ul align="left">
                    <h3>About</h3>
                    <li>Timing : 6:00 AM - 10:00 PM</li>
                    <li>Location: Biratnagar-11</li>
                </ul>
                </p>
                <!-- logged in checking php here, if not logged then on instead of reserve now button please login to continue alert or button will be added and if logged in then the process to reserve will continue as usual-->
                <?php

                  if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
                    echo " <div class='modal-footer'> 
                            <button class='btn btn-info col-md-12'data-bs-toggle='modal' data-bs-target='#loginmodal'>Please Login to book now!</button>
                            <button type='button' class='btn btn-dark col-md-12' data-bs-dismiss='modal'>Close</button>
                        </div>";
                  }
                  else{
                   echo "<div class='row'>
                    <form action='index.php' method='post'>
                        <div class='col-md-4 position-relative'>
                            <label for='first_name' class='form-label'>First name</label>
                            <input type='text' class='form-control' id='first_name' name='first_name' required>
                        </div>
                        <div class='col-md-4 position-relative'>
                            <label for='last_name' class='form-label'>Last name</label>
                            <input type='text' class='form-control' id='last_name' name='last_name' required>
                        </div>
                        <div class='col-md-6 position-relative'>
                            <label for='city' class='form-label'>City</label>
                            <input type='text' class='form-control' id='city' name='city' required>
                        </div>

                        <div class='mb-3'>
                            <label for='datetime' class='form-label'>Date and time</label>
                            <input type='datetime-local' class='form-control' id='datetime' name='datetime' required>
                        </div>
                        <div class='modal-footer'>
                            <button class='btn btn-info col-md-12' type='submit'>Reserve now!</button>
                            <button type='button' class='btn btn-dark col-md-12' data-bs-dismiss='modal'>Close</button>
                        </div>
                    </form>
                </div>";
                    }
?>
                
            </div>
        </div>
    </div>
</div>