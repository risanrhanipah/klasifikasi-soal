<?php 
$rfid = $_GET['rfid'];
$data =[
    'waktu'=>date('H:i:s'),
    'nama'=>'Badrus',
    'uid'=>$rfid,
    'status'=>'success'
];
echo json_encode($data, true);
?>