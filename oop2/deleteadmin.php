<?php
require 'dbClass.php';
require 'validatorClass.php';

class dadmin{
    private $id;
    function __construct($id);
    $this->id    = $id;}

    public function delete(){
        // logic ..... 

        $Validator = new Validator();
        if(!$Validator->validate($this->id,4)){
            $message =  'Invalid Number';
        }else{
                $sql="select * from users where id = $this->id";
                $result = $dbObj->doQuery($sql);
                if(mysqli_num_rows($result) == 1){
        
                    $data = mysqli_fetch_assoc($result);
                   
                      $sql = "delete from users where id = $this->id ";
                      $result = $dbObj->doQuery($sql);
                      

   if($result){
    
    unlink('./uploads/'.$data['image']); 

    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }
}else{
    $message = 'Error In User Id ';
            }

            $_SESSION['Message'] = ["Message" =>  $message];
         
            header("Location: 'index.php')";
?>