<?php
// create Contact
function insert_contact($contact) {
    global $db;

    $sql = "INSERT INTO `tbl_contactList` ";
    $sql .= "(`firstName`, `lastName`, `phone`) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $contact['$firstName']) . "',";
    $sql .= "'" . db_escape($db, $contact['$lastName']) . "',";
    $sql .= "'" . db_escape($db, $contact['$phone']) . "'";
    echo $sql .= ")";

    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function display_user() {
      global $db;
      $query = "SELECT * FROM `tbl_contactList` ORDER BY id ASC";
      $result = mysqli_query($db, $query);
      return $result;
  }

  function delete_contact($contact) {
      global $db;
      print_r($contact);
      exit;
      $query = "SELECT * FROM `tbl_contactList` ORDER BY id ASC";
      $result = mysqli_query($db, $query);
      return $result;
  }


  function edit_contact($contact) {
    global $db;

    $query = "UPDATE tbl_contactList ";
    $query .="SET `firstName` = '" . db_escape($db, $contact['$firstName']) . "', ";
    $query .="`lastName` = '" . db_escape($db, $contact['$lastName']) . "', ";
    $query .="`phone` = '" . db_escape($db, $contact['$phone']) . "', ";
    $query .="`updated_at` = '" . db_escape($db, $contact['$updated_at']) . "' ";
    $query .="WHERE `id` ='" . db_escape($db, $contact['$id']) . "'";
    $result = mysqli_query($db, $query);
    return $result;
  }

?>
