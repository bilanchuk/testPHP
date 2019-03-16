<?php
  try {
    $db = new PDO('mysql:host=localhost;dbname=testdb','root','');
  } catch (PDOException $e) {
    print "Не можу підключитись до бази даних, тому що ".$e->getMessage();
  }

  try {
    $q = $db->exec("
      CREATE TABLE rev(
        rev_id INT PRIMARY KEY AUTO_INCREMENT,
        mail VARCHAR(150),
        name VARCHAR(100),
        text VARCHAR(255),
        rate INT,
        img VARCHAR(255)
        )
    ");
  } catch (PDOException $e) {
    print "Не можу створити таблицю, тому що ".$e->getMessage();
  }

 ?>
