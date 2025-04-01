<?php
class EmployeeProjectFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {

        // employee_id

        if (!$this->isPresent("employee_id")) {
            $this->errors["employee_id"] = "Please enter a employee_id";
        }
        else if (!$this->minLength("employee_id", 0)) {
            $this->errors["employee_id"] = "Please enter a employee_id";
        }

        else if (!$this->isInteger("employee_id", 0)) {
            $this->errors["employee_id"] = "Please enter a employee_id";
        }

        // project_id

        if (!$this->isPresent("project_id")) {
            $this->errors["project_id"] = "Please enter a project_id";
        }
        else if (!$this->minLength("project_id", 0)) {
            $this->errors["project_id"] = "Please enter a project_id";
        }

        else if (!$this->isInteger("employee_id", 0)) {
            $this->errors["employee_id"] = "Please enter a employee_id";
        }


        return count($this->errors) === 0;
    }
}
?>