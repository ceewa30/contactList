<?php
// Including database connections
require_once dirname(__DIR__).'/private/initialize.php';
// mysqli query to fetch all data from database
// mysqli insert query
$result = display_user();

$arr = array();
if(mysqli_num_rows($result) != 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
  }
}
// Return json array containing data from the databasecon
echo $json_info = json_encode($arr);
// echo true;
?>
