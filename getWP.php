<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

require_once "koneksi.php";

$input = json_decode(file_get_contents("php://input"));

$jenis_pajak = $input->jenis_pajak;
$npwpd =  $input->npwpd;

$query = "SELECT * FROM $jenis_pajak WHERE npwpd= '$npwpd'";
$result = $connect->query($query);
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row;
}
if ($data) {
    $response = array(
        'status' => 1,
        'message' => 'Success',
        'data' => $data
    );
} else {
    $response = array(
        'status' => 0,
        'message' => 'No Data Found'
    );
}

echo json_encode($response);
