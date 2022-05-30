
<?php
$id = $_GET['station_id'];
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'http://rajibpalit.me/rest-api/public/api/station/'.$id.'/show');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($phoneList);

// echo '<pre>'; print_r($jsonArrayResponse->company); exit;
?>


<!DOCTYPE HTML>
<html>  
<body>

<form action="http://rajibpalit.me/rest-api/public/api/station/<?= $jsonArrayResponse->company->id;?>/update" method="post">
Name: <input type="text" name="name" value="<?= $jsonArrayResponse->company->name;?>"><br>
Latitude: <input type="text" name="latitude" value="<?= $jsonArrayResponse->company->latitude;?>"><br>
Longitude: <input type="text" name="longitude" value="<?= $jsonArrayResponse->company->longitude;?>"><br>
Company ID: <input type="text" name="company_id" value="<?= $jsonArrayResponse->company->company_id;?>"><br>
Address: <input type="text" name="address" value="<?= $jsonArrayResponse->company->address;?>"><br>
<input type="submit" value="Submit">
</form>

</body>
</html>
