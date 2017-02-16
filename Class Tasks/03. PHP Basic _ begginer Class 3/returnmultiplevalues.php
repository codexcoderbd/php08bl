<?php
    function retrieveUserProfile()
    {
        $user[] = "Jason Gilmore.<br>";
        $user[] = "jason@example.com.<br>";
        $user[] = "English.<br>";
        return $user;
    }

    list($name, $email, $language) = retrieveUserProfile();
    echo "Name: $name email: $email language: $language";
?>

