<?php
require '../../model/lockerModel.php';
$locker = new Locker();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->locker_num;
// $id="11";
$row = $locker->getLockerById($id);
echo json_encode($row);
?>