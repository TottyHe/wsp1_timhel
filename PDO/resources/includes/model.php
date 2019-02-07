<?php

//Defines everything from our database
$host = 'localhost';
$dbname = 'blogg';
$user = 'admin';
$password = 'Hamburgare343';

//Define varible with attributes for our PDO-object
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

//Contains settings from webserver
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

//Create our new PDO-object
$pdo = new PDO($dsn,$user,$password,$attr);

//Test our connection
if($pdo) {

$sql = "SELECT p.slug, p.Headline, u.Username, p.Creation_Time, p.Text FROM posts AS p JOIN users AS u ON p.User_ID = u.ID ORDER BY Creation_Time DESC";

//Define $model array
$model = array();

//Fill our pre defined $model-array
  foreach($pdo->query($sql) as $row) {
    $model += array(
      $row['slug'] => array(
        'title' => $row['Headline'],
        'author' => $row['Username'],
        'date' => $row['Creation_Time'],
        'text' => $row['Text']
      )
    );
  }
}
//Here's an error message, that shows if the site is not working corectly
else {
print_r($pdo->errorInfo());
}

?>
