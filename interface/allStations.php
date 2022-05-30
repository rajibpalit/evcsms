<?php

$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'http://rajibpalit.me/rest-api/public/api/stations');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($phoneList);

?>

<!DOCTYPE HTML>
<html>

<body>

    <table>
        <th>
        <th>Name </th>
        <th>Latitude</th>
        <th>Longtitude </th>
        <th>Company ID</th>
        <th>Address </th>
        </th>
        <?php
        foreach ($jsonArrayResponse->company as $station) {
            // echo '<pre>'; print_r($station); exit;
                        echo '<tr>';
            echo '<td>' . $station->name . '<td>';
            echo '<td>' . $station->latitude . '<td>';
            echo '<td>' . $station->longitude . '<td>';
            echo '<td>' . $station->company_id . '<td>';
            echo '<td>' . $station->address . '<td>';
            echo '<td><a href="editStation.php?station_id='.$station->id.'"> Edit</a><td>';
            echo '<td><form action="http://rajibpalit.me/rest-api/public/api/station/'.$station->id.'/delete" method="post"> <button type="submit">Delete</button></form><td>';
            echo '</tr>';
        }
        ?>
    </table>

</body>

</html>