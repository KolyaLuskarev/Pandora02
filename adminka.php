<?php  

header('Content-type: text/html; charset=utf-8');
session_start();
if (! $_SESSION['admin'])
header('Location: adminavt.php');

$user = "username";  
$password = "password";  
$database = "mysite1";  
$table = "bookings";  
  
try {   
    $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);   
    echo "<h1>Заявки </h1><ol>";   
    foreach($db->query("SELECT * FROM $table") as $row) {   
      echo "<li>" . $row['name'] . ", " . $row['phone_number'] . ", " . $row['table_number']. ", " . $row['date'] . "</li>";   
    }   
    echo "</ol>";   
  } catch (PDOException $e) {   
      print "Error!: " . $e->getMessage() . "<br/>";   
      die();   
  }  
?>
<!DOCTYPE html>
<html>
<head>
<title>Страница</title>
<link rel="stylesheet" href="adminstyle.css">
<meta charset="utf-8">
</head>
<body>
<form action="newart.php" method="post">
<p>Текст информации о заведении:</p>
<textarea name="text"></textarea>
<input type="submit" value="Добавить информацию">
</form>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Загрузить изображение" name="submit">
  </form>
</body>
</html>
<?php
$_SESSION['admin'] = false;
?>