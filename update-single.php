<?php

/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */

if (isset($_GET['id'])) {
  echo $_GET['id']; // for testing purposes
} else {
    echo "Something went wrong!";
    exit;
}
?>
