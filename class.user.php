<?php
class USER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function register($name,$dob,$gender,$city,$zip,$country,$email,$password)
    {
       try
       {
           
           $stmt = $this->db->prepare("INSERT INTO users(USER_ID, NAME,DOB,GENDER, CITY, ZIP, COUNTRY, EMAIL, PASSWORD) 
                                                       VALUES(:uid,:name,:dob, :gender, :city, :zip, :country, :email, :password)");
           $uid=uniqid();            
           $stmt->bindparam(":uid", $uid);                    
           $stmt->bindparam(":name", $name);   
           $stmt->bindparam(":dob", $dob);
           $stmt->bindparam(":gender", $gender);
           $stmt->bindparam(":city", $city); 
           $stmt->bindparam(":zip", $zip);
           $stmt->bindparam(":country", $country);  
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":password", $password);           
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($email,$password)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE EMAIL=:email");
          $stmt->execute(array(':email'=>$email));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if($password==$userRow['PASSWORD'])
             {
                $_SESSION['user_session'] = $userRow['USER_ID'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>