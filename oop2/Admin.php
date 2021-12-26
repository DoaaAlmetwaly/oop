<?php 
require 'dbClass.php';
require 'validatorClass.php';

class admin{
    private $title;
    private $content;
   public $tmp;
    public $name;
    public $type;
    public $size;
    
    function __construct($title,$content,$FinalName){
      
       $this->title    = $title;
       $this->content    = $content;
       $this->FinalName   = $FinalName;
       
    }
    

    public function Register(){
        // logic ..... 

        $Validator = new Validator();
        
        $this->title     = $Validator->Clean($this->title);
        $this->content = $Validator->Clean($this->content);
        
        
        $errors = [];

        # Validate title .... 
        if(!$Validator->validate($this->title,1)){
            $errors['title'] = "Field Required";
        }elseif(!$Validator->validate($this->title,3)){
            $errors['title'] = "Length Must Be >= 6 chars";
        }



        # Validate content .... 
        if(!$Validator->validate($this->content,1)){
            $errors['content'] = "Field Required";
        }elseif(!$Validator->validate($this->content,3,20)){
            $errors['content'] = "Length Must Be >= 20 chars";
        }


        

        if (!$Validator->validate($this ->name = $_FILES["image"]["name"], 1)) {
            $errors['image'] = 'Field Required';
        } else {
            $this -> tmp = $_FILES["image"]["tmp_name"];
            $this -> name = $_FILES['image']['name'];
            $this ->Size = $_FILES['image']['size'];
            $this ->type = $_FILES['image']['type'];
    
            $this->exArray = explode('.', $this->name);
            $this->extension = end($this->exArray);
    
            $this->FinalName = rand() . time() . '.' . $this-> extension;
    
            $allowedExtension = ['png', 'jpg'];
    
            if (!$Validator->validate($this->extension, 5)) {
                $errors['image'] = 'Error In Extension';
            }
        }
       # Check Errors ..... 
       if(count($errors)>0){
           $_SESSION['Message'] = $errors;
       }else{
         $dbObj = new database;
         
         $this->desPath = './uploads/' . $this->FinalName;

         if (move_uploaded_file($this->tmp, $this->desPath)) {

         $sql = "insert into users (title,content,image) values ('$this->title','$this->content','$this->$FinalName')";
        
         $result = $dbObj->doQuery($sql);

         if ($result) {
            $message = 'Raw Inserted';
        } else {
            $message = 'Error Try Again';
        }
    } else {
        $message = 'Error In Uploading file';
    }

    $_SESSION['Message'] = ['message' => $message];
}
}


}


?>