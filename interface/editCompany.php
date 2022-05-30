
<?php
$id = $_GET['com_id'];
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'http://rajibpalit.me/rest-api/public/api/company/'.$id.'/show');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($phoneList);

//echo '<pre>'; print_r($jsonArrayResponse->company); exit;
?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="http://rajibpalit.me/rest-api/public/api/company/<?= $jsonArrayResponse->company->id;?>/update" method="post">
Name: <input type="text" name="name" value="<?= $jsonArrayResponse->company->name;?>"><br>
Parent Company ID: <input type="text" name="parent_company_id" value="<?= $jsonArrayResponse->company->parent_company_id;?>"><br>
<input type="submit" value="Submit">
</form>

</body>
</html>
