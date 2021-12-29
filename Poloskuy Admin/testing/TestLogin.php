<?php

use PHPUnit\Framework\TestCase;

require_once "Syslogin.php";

class TestLogin extends TestCase {
    public function testLogins() {
        $log = new Login();
        $email = "fikri@zamzam.com";
        $password = "12343";

        $login = $log->LoginSystem($email,$password);

        $this->assertTrue($login);
    }
}

?>