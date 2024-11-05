
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - CFF</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
  </head>
  <body>

  <?php
        include 'partials/_header.php';
        include 'partials/_dbconnect.php';
   
 
 //for unsplash API         or use lorem picsum       
        // Your Unsplash Access Key
        $accessKey = 'DN8_omCyTOJf25QUA-4iJHXbzdrB7Yx36oOyupuzrRs';
        
        // API endpoint to fetch a random photo
        $apiUrl = "https://api.unsplash.com/photos/random?client_id={$accessKey}&query=coding-python";

        // Initialize cURL session
        $ch = curl_init($apiUrl);

        // Set options for cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Decode JSON response
        $imageData = json_decode($response, true);
        
        // Check if image data is available
        if (isset($imageData['urls']['regular'])) {
          $imageUrl = $imageData['urls']['regular']; // Get the regular size URL
        } else {
          $imageUrl = 'https://contentstatic.techgig.com/thumb/msid-107923788,width-800,resizemode-4/Python-programming-Must-have-tools-for-ML-and-Data-Science.jpg?9098'; // Fallback image URL
        }
        ?>  
      <!-- SLider starts here -->
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://picsum.photos/2400/700" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/2400/700?grayscale" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/2400/700?grayscale&blur=2" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- category container starts here -->
     <h1 class="text-center my-4">iDiscuss- Categories</h1>
      <!-- fetch all categories and use a for loop to iterate categories -->
  <div class="container">
   <div class="row">
    <?php
       $sql="SELECT * FROM `categories` ";
       $result=mysqli_query($conn,$sql);
       while ($row=mysqli_fetch_assoc($result)) {
        // echo $row['category_id'];
        echo 
      "
       <div class='col-md-3 my-2'>
          <div class='card' style='width: 18rem;'>
            <img src='<?php echo htmlspecialchars($imageUrl); ?>' alt='Random Image' height='250' width='287'>
            <div class='card-body'>
                <h5 class='card-title'>".$row['category_name']."</h5>
                <p class='card-text'>".substr($row['category_description'],0,85)."....</p>
                <a href='#' class='btn btn-primary'>View Threads</a>
            </div>
          </div>
       </div>";
       }
    ?>
   </div>
  </div>
    
    <?php
        require 'partials/_footer.php';
    ?>
    
  </body>
</html>