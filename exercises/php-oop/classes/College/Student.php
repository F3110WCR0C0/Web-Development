<?php
// Write a class Student with the following properties and methods:
// -- Properties
//    -- protected: $name, $number
// -- Constructor
//    -- Accepts parameters $nm, $num and initializes the properties
// -- Methods
//    -- public __toString(): string
//       -- Returns a string representation of the student in the 
//          format: "Name: $name, Number: $number"
//
//
//
// Add the following static properties and methods to the Student class:
// -- Properties
//    -- private: $students, which will store a reference to each student object
// -- Methods
//    -- findAll(): array
//       -- returns an array with all of the student objects
//    -- findByNumber($sum)L Student
//       -- returns the student object with the specified student number, or null 
//          if the student is not found.

// Modify the constructor in the Student class so that a reference to the new 
// student object is stored in the students array, indexed by the student number.
//
// Add a destructor to the Student class that removes a reference to the student 
// object from the students array.

// Move the Student class to a namespace called 'College'
namespace College;

class Student{


    protected $name;
    protected $number;

    // Construct is called first
    public function __construct($nm, $num){

        // Turns protected into this
        $this -> name = $nm;
        $this -> number = $num;
    }

    public function __toString(){
        $format = "Name: %s, Number: %s";
        $str = sprintf($format, $this -> name, $this -> number);
        return $str;
    }
}




