<?php
include("./php/checker.php");

class Login
{
    private $error = "";

    public function evaluate($data)
    {
        $username = ucfirst($data['username']);
        $password =  addsLashes($data['password']);

        $query = "select * from signup where username = '$username' limit 1 ";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];

            if($username == $row['username'])
            {
                //create session data

                $_SESSION['cmp'] = $row['userid'];
            }
            if($password == $row['password']){

                $_SESSION['cmp'] = $row['userid'];
                
            }
            else
            {
                $this->error .= "Invalid Credientials!<br>";
            }

        }else{
            $this->error .= "Invalid Credientials!<br>";
        }
        return $this->error;
    }

    public function check_login($id,$redirect = true)
    { 
        if(is_numeric($id))
     {
            $query = "select * from signup where userid = $id limit 1 ";

            $DB = new Database();
            $result = $DB->read($query);

            if($result)
            {
                $user_data = $result[0];
                return $user_data;
            }else
            {
                if($redirect){
                header("Location:login.php");
                die;
                }else{
                    $_SESSION['cmp'] = 0;
                }
            }
        }
    // }else
    // {
    //     if($redirect){
    //         header("Location: login.php");
    //         die;
    //     }else{
    //         $_SESSION['cmp'] = 0;
    //     }
    // }

    }
}

?>