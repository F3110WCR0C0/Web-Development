<?php
class DepartmentsFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {

        // title

        if (!$this->isPresent("title")) {
            $this->errors["title"] = "Please enter a title";
        }
        else if (!$this->minLength("title", 0)) {
            $this->errors["title"] = "Please enter a title";
        }

        // location

        if (!$this->isPresent("location")) {
            $this->errors["location"] = "Please enter a location";
        }
        else if (!$this->minLength("location", 0)) {
            $this->errors["location"] = "Please enter a location";
        }


        // website

        if (!$this->isPresent("website")) {
            $this->errors["website"] = "Please enter a website";
        }
        else if (!$this->minLength("website", 0)) {
            $this->errors["website"] = "Please enter a website";
        }

        return count($this->errors) === 0;
    }
}
?>