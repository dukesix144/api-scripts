<?php

// API URL and authorization token
$url ='https://api.battlemetrics.com/bans?filter[banList]=1b4c17a0-5770-11ef-9ce1-7d1ec5dfa2b3';

$auth = "bmauth";

// Set context with the Authorization header
$context = stream_context_create([
    'http' => ['header' => "Authorization: Bearer $auth"]
]);

// Get the JSON data
$json = file_get_contents($url, false, $context);
$data = json_decode($json, true);

// MySQL connection details
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Set the correct charset for proper data handling
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the total number of bans
$totalbans = $data['meta']['total'];

// If there are bans, clear the table first
if ($totalbans > 0) {
    mysqli_query($conn, "DELETE FROM banlist");
}

// Loop through each ban in the response data
foreach ($data['data'] as $ban) {
    $ban_id = $ban['attributes']['uid'];
    $reason = $ban['attributes']['reason'];
    $banned_by = $ban['relationships']['user']['data']['id'];
    $banned_date_raw = $ban['attributes']['timestamp'];
    $banned_date = substr($banned_date_raw, 0, 10);

    // Expiration date (if present)
    $expiration_date_raw = $ban['attributes']['expires'];
    $expiration_date = $expiration_date_raw ? substr($expiration_date_raw, 0, 10) : null;

    // Only process active bans (either no expiration or expiration date in the future)
    if (!$expiration_date || $expiration_date >= date('Y-m-d')) {
        $steamid = $ban['attributes']['identifiers'][0]['identifier'];

        // Insert the ban into the MySQL database
        $sql = "INSERT INTO banlist(ban_id, reason, banned_by, banned_date, expiration_date, steamid)
                VALUES('$ban_id', '$reason', '$banned_by', '$banned_date', '$expiration_date', '$steamid')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();

?>

