<?php
 require_once "index.php";
class booking{
    public $name;
    public $email;
    public $entryDate;
    public $exitDate;
    public $customersNumber;
    public $childsNumber;
    public $roomsNumber;
    public $phone;
    public $comments;
    use DB;
    
    public function __construct($name,$email,$entryDate,$exitDate,$customersNumber,$childsNumber,$roomsNumber,$phone,$comments){
        $this -> name = $name;
        $this -> email = $email;
        $this -> entryDate= $entryDate;
        $this -> exitDate = $exitDate;
        $this -> customersNumber =$customersNumber;
        $this -> childsNumber  = $childsNumber;
        $this ->roomsNumber =$roomsNumber;
        $this -> phone = $phone;
        $this ->comments = $comments;
        }
        public function empty(){
            if(empty($this -> name)  || empty($this -> email) || empty($this -> entryDate) || empty( $this -> exitDate) || empty( $this ->customersNumber)|| empty( $this -> childsNumber)|| empty(  $this ->roomsNumber)|| empty( $this -> phone )|| empty( $this -> comments ) ){
            //    print_r("Fill the input please"."<br>");
               return false;
            }
            else {
                return true; 
              
            }
        }
        // public function validEmail(){
        //     if (filter_var($this -> email, FILTER_VALIDATE_EMAIL)) {
        //         // echo("is a valid email address"."<br>");
        //       return true; 
        //       } else {
        //         // echo(" is not a valid email address"."<br>");
        //         return false; 
        //       }
        // }
        

        public function insert(){
            $sql = "INSERT INTO register (name,email,entryDate,exitDate,customersNumber,childsNumber,roomsNumber,phone,comments) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt= $this->connect()->prepare($sql);
        if($this->empty() == true)
        {$stmt->execute([$this -> name,$this -> email , $this -> entryDate,  $this -> exitDate,  $this -> customersNumber,$this -> childsNumber,  $this ->roomsNumber, $this -> phone, $this -> comments ]);}
        
        }
    }
    
if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
     $entryDate= htmlspecialchars($_POST['entryDate']);
     $exitDate= htmlspecialchars($_POST['exitDate']);
     $customersNumber= htmlspecialchars($_POST['customersNumber']);
     $childsNumber= htmlspecialchars($_POST['childsNumber']);
     $roomsNumber= htmlspecialchars($_POST['roomsNumber']);
     $phone= htmlspecialchars($_POST['phone']);
     $comments= htmlspecialchars($_POST['comments']);
    $email =htmlspecialchars( $_POST['email']);
    $user = new booking($name,$email,$entryDate,$exitDate,$customersNumber,$childsNumber,$roomsNumber,$phone,$comments);
    
   if($user ->empty() == true  ) //&& $user -> validPassword() == true)
   {
    $user ->insert();
    header("Location: bookings.php"); 
   }
   else{
    header("Location: bookings.php");   
   }
    
}

?>