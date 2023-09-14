<?php



   
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $tablen = intval($_POST['table']);
    $date = $_POST['date'];
    
 //$phone = "+1 222-333-4444"; // номер телефона для проверки
if (preg_match("/^[+0-9]+$/", $phone)) {
    echo "Номер телефона прошел проверку\n";
} else {
    echo "Номер телефона содержит недопустимые символы";
    exit;
}

// В этом коде мы используем регулярное выражение "/^[+0-9]+$/" для проверки номера телефона. 
// Символ "^" и "$" ограничивают строку, чтобы проверка производилась только на всю строку. 
// Символ "+" соответствует одному или более повторениям предыдущего символа, поэтому он допускается в начале номера телефона. 
// Символы "0-9" соответствуют цифрам от 0 до 9.
   
   $user = "username";
   $password = "password";
   $database = "mysite1";
   $table = "bookings";
   
   try { 
      $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password); 


// Проверка наличия записи с таким же номером столика и датой

$stmt = $db->prepare("SELECT COUNT(*) FROM bookings WHERE table_number = ? AND date = ?");
$stmt->execute([$tablen, $date]);
$count = $stmt->fetchColumn();

if ($count > 0) {
  // Запись уже существует, выдаем ошибку
  echo "Столик #$tablen на дату $date уже забронирован!";
} else 
{
    echo "2\n";
      $stmt = $db->prepare("INSERT INTO $table (name, phone_number, table_number, date) 
      VALUES (:nameParam, :phoneParam, :tablenParam, :dateParam)"); 
      $stmt->bindParam(':nameParam', $name);
      $stmt->bindParam(':phoneParam', $phone);
      $stmt->bindParam(':tablenParam', $tablen);
      $stmt->bindParam(':dateParam', $date);
      $stmt->execute(); 
      
      // Display success message to user
      
      echo "Thank you for booking a table. We'll call you back to confirm your booking.\n"; 
      

}
      //$stmt= $db->close(); 
    } catch (PDOException $e) { 
        print "Error!: " . $e->getMessage() . "<br/>"; 
        die(); 
    }
  
   
// TODO: Validate input values before saving to database

// TODO: Set up database connection and save booking to database
?>