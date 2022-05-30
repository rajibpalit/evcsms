<?php

$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'http://rajibpalit.me/rest-api/public/api/company');
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
        <th>Parent Company ID</th>
        </th>
        <?php
        foreach ($jsonArrayResponse->company as $company) {
            echo '<tr>';
            echo '<td>' . $company->name . '<td>';
            echo '<td>' . $company->parent_company_id . '<td>';
            echo '<td><a href="editCompany.php?com_id='.$company->id.'"> Edit</a><td>';
            echo '<td><form action ="http://rajibpalit.me/rest-api/public/api/company/'.$company->id.'/delete" method="post"><button type="submit">Delete</button></form><td>';
            echo '</tr>';
        }
        ?>
    </table>

</body>

</html>