<?php

class Login{
    public function LoginSystem($email,$password)
    {
        $emaildb = "fikri@zamzam.com";
        $passdb = "12343";
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {	
			if($email == $emaildb && $password == $passdb) {
                return true;
            } else 
            {
                return false;
            }
		} else {
            return false;
        }
    }
}

?>