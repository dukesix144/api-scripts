<?

$json_options = [
  "http" => [
	  "method" => "GET",
	  "header" => "Accept: application/json",
       "header" => "Authorization: Bot <botauthkey>"
  ]
];

$json_context = stream_context_create($json_options);






// director
$json_get    = file_get_contents('https://discordapp.com/api/guilds/<guildid>/preview', false, $json_context);
$total  = json_decode($json_get, true);



//echo '<pre>';
//print_r($total);




$online = $total["approximate_member_count"];
print_r($online);
?>
