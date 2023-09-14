<?php



   
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

   $user = "username";
   $password = "password";
   $database = "mysite1";
   $table = "feedback";
   
   try { 
      $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password); 

    
      $stmt = $db->prepare("INSERT INTO $table (name, email, message) 
      VALUES (:nameParam, :emailParam, :messageParam)"); 
      $stmt->bindParam(':nameParam', $name);
      $stmt->bindParam(':emailParam', $email);
      $stmt->bindParam(':messageParam', $message);
      $stmt->execute(); 
      
      // Display success message to user
      
      echo "Thank you for your feedback\n"; 
      


      //$stmt= $db->close(); 
    } catch (PDOException $e) { 
        print "Error!: " . $e->getMessage() . "<br/>"; 
        die(); 
    }
  

?>