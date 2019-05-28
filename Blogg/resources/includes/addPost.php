<?php

require 'database.php';

//skapar varibel som ska fungera med koden

$poster = '';
$slug = '';
$headline = '';
$text = '';
$errorMsg = '';


if(isset($_POST['post'])) {
  if(!empty($_POST['user'])) {
    $poster = $_POST['user'];
  } else {
    $errorMsg = 'Ingen användare angiven!';
  }

  if(!empty($_POST['headline'])) {
    $headline = $_POST['headline'];
  } else {
    $errorMsg = 'Ingen rubrik angiven!'
  }

  if(!empty($_POST['text'])) {
    $text = $_POST['text'];
  } else {
    $errorMsg = 'Ingen text angiven!'
  }

  $headline = $_POST['headline'];

  require 'slugify.php';
  $slug = url_slug($headline, array('transliterate' => true));

  $text = $_POST['text'];

  if(empty($errorMsg)) {
    $sql = "INSERT INTO post (UserID, Slug, Headline, Text) VALUES ({$poster}, '{$slug}', '{$headline}', '{$text}')";

    $result = ($pdo->query($sql)) ? "Your message was sent!" : "There have been an error!";
    echo $result
  } else {
    echo "<strong>$errorMsg</strong>";
  }
}

?>
