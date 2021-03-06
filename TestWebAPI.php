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
<br />East: 26
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['east']; 
?>
<br />Central: 21
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['central']; 
?>
<br />South: 21
<?php 
echo $json['items'][0]['readings']['pm25_one_hourly']['south']; 
?>
<br />North: 14
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


/*

{
  "api_info": {
    "status": "healthy"
  },
  "region_metadata": [
    {
      "name": "string",
      "label_location": {
        "longitude": 0,
        "latitude": 0
      }
    }
  ],
  "items": [
    {
      "update_timestamp": "2018-09-20T13:25:45.452Z",
      "timestamp": "2018-09-20T13:25:45.452Z",
      "readings": {
        "pm25_one_hourly": {
          "national": 0,
          "north": 0,
          "south": 0,
          "east": 0,
          "west": 0,
          "central": 0
        }
      }
    }
  ]
}
*/
  ?>
  </body> 
</html>