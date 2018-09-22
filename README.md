# phpwebapi

$ php phpwebapi.php

<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.data.gov.sg/v1/environment/pm25?date=".date("Y-m-d") ,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$json = json_decode($response, true); 
//echo 'Online: '. $response['api_info']['status'];


?> 


<html> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head> 
<body> 
<table>
<tr><td>
<br />Status :
<?php echo $json['api_info']['status']; 
?>

<br />Region :
<?php echo $json['region_metadata'][0]['name'] . "-"; 
echo $json['region_metadata'][0]['label_location']['longitude'].","
.$json['region_metadata'][0]['label_location']['latitude']; 
?>

<br />Event time: 
<?php
echo $json['items'][0]['update_timestamp']; 
?>
<br />Timestamp: 
<?php
echo $json['items'][0]['timestamp']; 
?>
<br />West: 
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['west']; 
?>
<br />East: 
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['east']; 
?>
<br />Central: 
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['central']; 
?>
<br />South: 
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['south']; 
?>
<br />North: 
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['north']; 
?>


</td>
</tr>
</table>

<?php

//echo $response;
//echo $json;


    curl_close($curl);
    
      ?>
  </body> 
</html>
