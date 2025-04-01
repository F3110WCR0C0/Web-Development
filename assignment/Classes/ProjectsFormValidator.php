<?php
class ProjectsFormValidator extends FormValidator {
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

        // description

        if (!$this->isPresent("description")) {
            $this->errors["description"] = "Please enter a description";
        }
        else if (!$this->minLength("description", 0)) {
            $this->errors["description"] = "Please enter a description";
        }


        // start date

        if (!$this->isPresent("start_date")) {
            $this->errors["start_date"] = "Please enter a start_date";
        }
        
        // end date

        if (!$this->isPresent("end_date")) {
            $this->errors["end_date"] = "Please enter a end_date";
        }

        return count($this->errors) === 0;
    }
}
?>