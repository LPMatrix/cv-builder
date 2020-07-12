<?php 
	/**
	* 
	*/
	class library
	{
		
		public function Register($name, $email, $password)
    {
        try {
            $db = DB();
            $date=date('Y:m:d');
            $level=0;
            $query = $db->prepare("INSERT INTO users(name, password, email, user_date, user_level) VALUES (:name,:password,:email, :user_date, :user_level)");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("user_date", $date);
            $query->bindParam("user_level", $level);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    	  public function isEmail($email){
	        try {
	            $db = DB();
	            $query = $db->prepare("SELECT user_id FROM users WHERE email=:email");
	            $query->bindParam("email", $email, PDO::PARAM_STR);
	            $query->execute();
	            if ($query->rowCount() > 0) {
	                return true;
	            } else {
	                return false;
	            }
	        } catch (PDOException $e) {
	            exit($e->getMessage());
	        }
    }

        public function isUsername($username)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    	public function Login($email, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return array($result->user_id, $result->user_level, $result->email);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

        public function redirect($url){
        header("Location: $url");
    }
    
	    public function Logout(){
	        session_destroy();
	        unset($_SESSION['user_id']);
	        return true;
	    }

	    public function runQuery($sql){
	        $db = DB();
	        $stmt = $db->prepare($sql);
	        return $stmt;
	    }

	    public function upload($image,$tmp_dir,$upload_dir)
	    {		  
				  

			$imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
			  
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			  
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
			    
			   // allow valid image file formats
			   if(in_array($imgExt, $valid_extensions)){   

			     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			     return array(true,$userpic);
			    
			   }
			   else{
			    return false; 
			   }


			  }
			  
				 
	    }

 ?>