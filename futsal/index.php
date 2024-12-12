<?php
        session_start();
        require 'partials/_header.php';    
        include 'partials/_venuemodal.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>W-Futsal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- for forms  -->
    <script>
    // Set the minimum date and time to the current date and time
    document.getElementById('datetime').setAttribute('min', new Date().toISOString().slice(0, 16));
    </script>
</head>

<body style="padding-top:50px">

  
    <?php
       if ($showalert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong>Your account has been created and you can login.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
       }
       if ($showSignerror) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error! </strong>".$showSignerror."
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
       }
        ?>
    <?php
       if ($login) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong>You are logged in.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
       }
       if ($showlogerror) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error! </strong>".$showlogerror."
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
       }
        ?>


    <h1 class="text-center my-4"><a name="venue">Wow - Venues</a></h1>
    <!-- use a for loop to iterate venues (if more) -->
    <div class="container">
        <div class="d-flex col">
            <div class="col-md-4 my-2">
                <button type="button" class="btn btn rounded" data-bs-toggle="modal" data-bs-target="#venue1">
                    <div class='card border-dark' style='width: 18rem;'>
                        <img src='<?php echo htmlspecialchars($imageUrl); ?>' alt='Random Image' height='250'
                            width='287'>
                        <div class='card-body bg-dark text-light'>
                            <h5 class='card-title'>Venue -1</h5>
                            <p class='card-text'>
                            SOmething
                            </p>
                        </div>
                    </div>
                </button>
            </div>

            <div class="col-md-4 my-2">
                <button type="button" class="btn btn rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class='card border-dark' style='width: 18rem;'>
                        <img src='<?php echo htmlspecialchars($imageUrl); ?>' alt='Random Image' height='250'
                            width='287'>
                        <div class='card-body bg-dark text-light'>
                            <h5 class='card-title'>Venue -2</h5>
                            <p class='card-text'>Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-md-4 my-2">
                <button type="button" class="btn btn rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class='card border-dark' style='width: 18rem;'>
                        <img src='<?php echo htmlspecialchars($imageUrl); ?>' alt='Random Image' height='250'
                            width='287'>
                        <div class='card-body bg-dark text-light'>
                            <h5 class='card-title'>Venue -3</h5>
                            <p class='card-text'>
                            <ul>
                                <li>Timing : 6:00 AM - 10:00 PM</li>
                                <li>Location: Biratnagar-11</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <?php
        require 'partials/_footer.php';
    ?>

</body>

</html>