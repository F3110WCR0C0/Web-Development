<?php
class employeeFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {

        // Name

        if (!$this->isPresent("name")) {
            $this->errors["name"] = "Please enter a name";
        }
        else if (!$this->minLength("name", 0)) {
            $this->errors["name"] = "Please enter a name";
        }

        // PPSN - Make so it can input strings

        if (!$this->isPresent("ppsn")) {
            $this->errors["ppsn"] = "Please enter a PPSN";
        }

        else if (!$this->isMatch("ppsn", '/^[0-9]{9}$/')){
            $this->errors['ppsn'] = "PPSN must be exactly 9 digits";
        }

        // else if (!$this->isInteger("ppsn", '/^[0-9]{7}$/')){
        //     $this->errors['ppsn'] = "PPSN must have 7 integers";
        // }

        // Salary

        if (!$this->isPresent("salary")) {
            $this->errors["salary"] = "Please enter a salary";
        }
        
        else if (!$this->isFloat("salary")) {
            $this->errors["salary"] = "Salary must be a Float";
        }


        // Department_id

        $validdepartment_ids = ["Outdoors & Shoes", "Toys", "Garden & Shoes"];
        if (!$this->isPresent("department_id")) {
            $this->errors["department_id"] = "Please choose an department ID";
        }
        else if (!$this->isElement("department_id", $validdepartment_ids)) {
            $this->errors["department_id"] = "Please choose a valid department_id";
        }

        return count($this->errors) === 0;
    }
}
?>