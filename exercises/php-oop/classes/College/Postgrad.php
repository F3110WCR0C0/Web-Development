<?php
// Write a class Postgrad that extends the Student class with the following 
// additional properties and methods:
// -- Properties
//    -- protected: $supervisor, $topic
// -- Constructor
//    -- Accepts parameters $nm, $num, $sprvsr, $tpc and initializes the properties
// -- Methods
//    -- __toString(): string
//       -- Returns a string representation of the student in the 
//          format: "Name: $name, Number: $number, Supervisor: $supervisor, Topic: $topic"

// Move the Postgrad class to a namespace called 'College'
namespace College;
    class Postgrad extends Student{

    protected $name;
    protected $number;
    protected $supervisor;
    protected $topic;

    public function __construct($nm, $num, $sprvsr, $tpc){

        $this -> name = $nm;
        $this -> number = $num;
        $this -> supervisor = $sprvsr;
        $this -> topic = $tpc;
    }

    public function __toString(){
        $format = "Name: %s, Number: %s, Supervisor: %s, Topic: %s";
        $str = sprintf($format, $this -> name, $this -> number, $this -> supervisor, $this -> topic);
        return $str;
    }
}