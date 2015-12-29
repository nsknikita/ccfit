<?php
        $loginInput = $_POST["login"];
        $passwordInput = $_POST["password"];
        $loginStored = 'BlazeMoment';
        $passwordStored = 'pwd123';

        if (!(strcmp($loginStored, $loginInput)) && !(strcmp($passwordStored, $passwordInput))){
                echo "Welcome, user!";
        }
        else {
                echo "You're not welcome here!";
        }
?>
