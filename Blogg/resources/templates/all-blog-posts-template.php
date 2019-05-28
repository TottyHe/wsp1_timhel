<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

// Content - New way for Blogging
echo '<div class="content">';
echo '<h2>Alla blogginlägg</h2>';
echo $error;
// Search & Filter
echo <<<SEARCH
  <form method="post">
    SÖK: <br>
    <input type="text" name="text" style="width: 550px"><br>
    SORTERA: <br>
    Stigande: <input type="radio" name="order" value="ASC">
    Fallande: <input type="radio" name="order" value="DESC" checked><br>
    <input type="submit" name="search" value="Sök/Sortera">
  </form>
SEARCH;
//echo $content;
foreach ($model as $key => $value) {
  $text = shorttext($value['text']);
echo<<<post
  <div class="post">
    <h3>{$value['title']}</h3>
    <p class="author">Författare: {$value['author']} </p>
    <p class="date">Datum: {$value['date']} </p>
    <p class="message">$text...<a href="index.php?page=blogg&post={$key}">Läs mer</a></p>
  </div>
post;

}

$meaning = "Det här är jag ;)";
echo url_slug($meaning, array('transliterate' => true));

echo '</div>';

//Inlcude Footer
require ('resources/views/footer.php');
?>
