<?php
    // Your Unsplash Access Key
    $accessKey = 'DN8_omCyTOJf25QUA-4iJHXbzdrB7Yx36oOyupuzrRs';

    // API endpoint to fetch a random photo
    $apiUrl = "https://api.unsplash.com/photos/random?client_id={$accessKey}&query=nature";

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
        $imageUrl = 'default_image_url_here'; // Fallback image URL
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Image from Unsplash</title>
</head>
<body>
    <h1>Random Unsplash Image</h1>
    <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Random Image">
</body>
</html>
