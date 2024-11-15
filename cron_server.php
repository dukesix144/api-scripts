<?php

$url ='https://api.battlemetrics.com/servers/bmserver';

$auth = "bmauth";

$context = stream_context_create([
    'http' => ['header' => "Authorization: Bearer $auth"]
]);

$json = file_get_contents($url, false, $context);

$data = json_decode($json, true);



$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset( $conn, 'utf8');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
    
    //get the details
    $server_id = $data['data']['attributes']['id'];
    $server_name = $data['data']['attributes']['name'];
    $ip = $data['data']['attributes']['ip'];
$port = $data['data']['attributes']['port'];
    $rank = $data['data']['attributes']['rank'];
    $map = $data['data']['attributes']['details']['map'];
    $nextmap = $data['data']['attributes']['details']['map'];
    $teamone = $data['data']['attributes']['details']['squad_teamOne'];
    $teamtwo = $data['data']['attributes']['details']['squad_teamTwo'];
    $gamemode = $data['data']['attributes']['details']['gameMode'];
    $version = $data['data']['attributes']['details']['version'];
    $gametype = $data['data']['relationships']['game']['data']['id'];
    $licensedserver = $data['data']['attributes']['details']['licensedServer'];
    $publicqueue = $data['data']['attributes']['details']['squad_publicQueue'];
    $publicqueuelimit = $data['data']['attributes']['details']['squad_publicQueueLimit'];
    $players = $data['data']['attributes']['players'];
    $maxplayers = $data['data']['attributes']['maxPlayers'];
    $status = $data['data']['attributes']['status'];

    
    
$sql = "UPDATE `servers` SET `server_name`='$server_name',`rank`='$rank',`map`='$map',`nextmap`='$nextmap',`teamone`='$teamone',`teamtwo`='$teamtwo',`gamemode`='$gamemode',`version`='$version',`gametype`='$gametype',`licensedserver`='$licensedserver',`publicqueue`='$publicqueue',`publicqueuelimit`='$publicqueuelimit',`players`='$players',`maxplayers`='$maxplayers',`status`='$status' WHERE `server_id`='28969897'";



if ($conn->query($sql) === TRUE) {

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}



	
	
	

?>
