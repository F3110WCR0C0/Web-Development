<?php
// Write a class Undergrad that extends the Student class with the following 
// additional properties and methods:
// -- Properties
//    -- protected: $course, $year
// -- Constructor
//    -- Accepts parameters $nm, $num, $crs, $yr and initializes the properties
// -- Methods
//    -- __toString(): string
//       -- Returns a string representation of the student in the 
//          format: "Name: $name, Number: $number, Course: $course, Year: $year"

// Move the Undergrad class to a namespace called 'College'

namespace College;
class Undergrad extends Student{
    
    protected $name;
    protected $number;
    protected $course;
    protected $year;

    public function __construct($nm, $num, $crs, $yr){
        // parent:: __construct($nm, nm)
        $this -> name = $nm;
        $this -> number = $num;
        $this -> course = $crs;
        $this -> year = $yr;
    }

    public function __toString(){
        $format = "Name: %s, Number: %s, Course: %s, Year: %s";
        $str = sprintf($format, $this -> name, $this -> number, $this -> course, $this -> year);
        return $str;
    }
}