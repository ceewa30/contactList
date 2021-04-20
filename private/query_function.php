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

  function viewProfile($id, $role) {
    global $db;
    if($role == 'A') {
      $table =  "admin";
    } elseif ($role == 'T') {
      $table = "teacher";
    } elseif ($role == 'P') {
      $table = "parent";
    }
    $query = "SELECT `user_id`, `role`, `status`, `" . $table . "_first_name`,
     `" . $table . "_last_name`,
     `" . $table . "_mobile_no`,
     `" . $table . "_email`,
     `" . $table . "_photo`,
     `" . $table . "_date_of_birth`,
     `" . $table . "_id`,
     `address_1`,
     `address_2`,
     `city`,
     `state`,
     `zipcode`
     FROM `tbl_user`
    LEFT JOIN
        `tbl_" . $table . "` USING (`" . $table . "_id`)
    LEFT JOIN
        `tbl_address` USING (`" . $table . "_id`) ";
    $query .="WHERE user_id =" . db_escape($db, $id);
    $result = mysqli_query($db, $query);
    return $result;
  }

  function updateProfile($user) {
    global $db;
    print_r($user); exit;
    $query = "UPDATE tbl_user ";
    $query .="SET email = '" . db_escape($db, $user['$email']) . "', ";
    $query .="address = '" . db_escape($db, $user['$address']) . "', ";
    $query .="address1 = '" . db_escape($db, $user['$address1']) . "', ";
    $query .="phone = '" . db_escape($db, $user['$phone']) . "' ";
    $query .="WHERE user_id ='" . db_escape($db, $user['$id']) . "'";
    $result = mysqli_query($db, $query);
    return $result;
  }

?>
