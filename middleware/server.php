<?php
// Get PHP to report all errors
error_reporting(E_ALL);

// making curl more modular
function cURL_POST(string $url, array $arr) : string {
    // Initalize curl resource
    $ch = curl_init();

    // Curl Setopt Info
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($arr)
    );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // output response from curl
    $output = curl_exec($ch);

    // close curl resource to free system resources
    curl_close($ch);

    // return response from curl : string
    return $output;
}

// sends $arr from php://input to curl backend
$response = cURL_POST("https://web.njit.edu/~aeo34/server.php", $arr);

// Printing Output of $arr
echo json_encode($_POST);
?>