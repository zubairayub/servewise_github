<?php
//AIzaSyCXlOYPN59pZycZzUee1ee0YYLbwaiDPg8

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'gogolee/vendor/autoload.php';
$KEY_FILE_LOCATION =  'gogolee/servewise-f14444187f92.json';

$client = new Google_Client();
$client->setAuthConfig($KEY_FILE_LOCATION);
$client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
$analytics = new Google_Service_Analytics($client);

$result = $analytics->data_realtime->get(
  'ga:237049540',
  'rt:activeVisitors',
  ['dimensions' => 'rt:deviceCategory,rt:pageTitle,rt:pagePath,rt:country,rt:region,rt:city']
);

$arr = [
  'online' => $result->getTotalResults(),
  'data' => $result->getRows()
];
echo json_encode($arr);
//print_r($arr);
// foreach($result as $key => $value):
	//echo 'Device '.$value[0][0];
	?>
<?php 
	//print_r($value[0][0]);
// endforeach;
?>
<script>

</script>