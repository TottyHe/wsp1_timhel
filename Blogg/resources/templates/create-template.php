<?php

// Include Meta
require ('resources/includes/head.php');

// Include Header
require ('resources/views/header.php');

navigation($header);


// Content - New way for Blogging
echo '<div class="content">';
echo '<h2>Create</h2>';
echo $error;

echo <<<CREATE
  <form method="post">
    Rubrik: <br>
    <input type="text" name="headline"><br>
    Användare: <br>
    <select name="user">
CREATE;
$sql = "SELECT ID, Username FROM  Users";
foreach ($pdo->query($sql) as $row) {
  echo "<option value='{$row['ID']}'>{$row['Username']}</option>";
}

echo <<<CREATE
    </select>
    Meddelande: <br>
    <textarea name="name" rows="8" cols="50" style="max-width: 100%;"></textarea><br>
    <input type="submit" name="post" value="Post">
  </form>
CREATE;

echo '</div>';



//Inlcude Footer
require ('resources/views/footer.php');

?>
