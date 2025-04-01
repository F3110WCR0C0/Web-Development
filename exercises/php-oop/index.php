<?php
// Use the configuration file to autoload the classes
// Test the classes you have written in the classes folder
// new inputs it into the object(function)

// use College\Student; can also be used
require_once "./etc/config.php";

$student = new College\Student("Luca", 1);
print("<p>Students: \n $student </p>");



$postgrad = new College\Postgrad("Luca",1,"Josh","Money");
print("<p>Postgrad: \n $postgrad </p>");

$undergrad = new College\Undergrad("Luca",2,"DL387",2025);
print("<p>Undergrad: \n $undergrad </p>");

?>