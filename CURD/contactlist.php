<?php
// Including database connections
// require_once dirname(__DIR__).'/Dbase/DBConnection.php';
require_once dirname(__DIR__).'/private/initialize.php';

$createcontact = json_decode(file_get_contents("php://input"));

$contact = [];
$contact['$firstName'] = $createcontact->contactinfo->firstName ?? '';
$contact['$lastName'] = $createcontact->contactinfo->lastName ?? '';
$contact['$phone'] = $createcontact->contactinfo->phone ?? '';
// mysqli insert query
$query = insert_contact($contact);
?>
