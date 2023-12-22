<?php
class Signup
{
   private $error = "";

   public function evaluate($data)
    {
        foreach ($data as $key => $value) {
            # code...
            if(empty($value))
            {
                $this->error .= $key . "is empty!<br>";
            }

            if($key == "email")
            {
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)){
                   $this->error .=  " invalid email address!<br>";  
                }
                
               
            }

            if($key == "username")
            {
                if (is_numeric($value)){
                   $this->error .=  " Username cant be a number, Please enter a valid Username!<br>";  
                }

            }

        }

        $DB = new Database();

	$data['userid'] = $this->create_userid();

		//check userid
		$sql = "select id from signup where userid = '$data[userid]' limit 1";
		$check = $DB->read($sql);
		while(is_array($check)){

			$data['userid'] = $this->create_userid();
			$sql = "select id from signup where userid = '$data[userid]' limit 1";
			$check = $DB->read($sql);
		}

		// //check email
		// $sql = "select id from signup where email = '$data[email]' limit 1";
		// $check = $DB->read($sql);
		// if(is_array($check)){

		// 	 $this->error = $this->error . "Another user is already using that email<br>";
		// }
 

        if($this->error == "")
        {
            //save no error occured
            $this->create_user($data);
        }else
        {
            return $this->error;
        }
    }

   public function create_user($data)
    {
        $username = ucfirst($data['username']);
        $email = $data['email'];    
        $password = $data['password'];
        $confirm_password = $data['confirm_password'];
        $userid = $data['userid'];
        $query = "insert into signup 
        (userid,username,email,password,confirm_password)
        values ('$userid','$username','$email','$password','$confirm_password')";

        $DB = new Database();
        $DB->save($query);
    }

    private function create_userid()
    {
        $length = rand(5,19);
        $number = "";
        for ($i=0; $i < $length; $i++) { 
            # code...
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
}


?>