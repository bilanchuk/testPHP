<?php
 function addRow($mail,$name,$text,$rate,$img){
   global $db;
   $mail=clean($mail);
   $name=clean($name);
   $text=clean($text);
   $rate=clean($rate);
   $img=clean($img);
   if(!empty($mail) and !empty($name) and !empty($text) and
  !empty($rate)){
    try {
      $affRows=$db->exec("
        INSERT INTO rev(mail,name,text,rate,img)
        VALUES('$mail','$name','$text',$rate,'$img')
      ");
    } catch (PDOException $e) {
      print "Не можу додати рядок тому що ".$e->getMessage();
    }
   }
   else{
     print "Потрібно задати всі вказані поля!";
   }
 }

 function getAllFromDB($offset=1,$limit=3){
   global $db;
   $cnt= $db->query("SELECT count(mail) FROM rev")->fetch(PDO::FETCH_NUM);
   $all = $db->query("SELECT * FROM rev ORDER BY rev_id DESC LIMIT {$offset},{$limit}")->fetchAll();
   return array($all,$cnt);
 }

 function getAvgRate(){
   list($all,$cnt)=getAllFromDB();
   $counter=0;
   for($i=0;$i<count($all);$i++){
     $counter+=$all[$i][4];
   }
   return $counter/(count($all));
 }


 function clean($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

 ?>
