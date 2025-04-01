<?php

class EmployeeProjectProfile {

    public $id;
    public $employee_id;
    public $project_id;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->employee_id = $props["employee_id"];
            $this->project_id  = $props["project_id"];
        }
    }

    public function save() {
        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();
        
            $params = [
                ":employee_id" => $this->employee_id,
                ":project_id"  => $this->project_id,
            ];

            if ($this->id === null) {
                $sql = 
                    "INSERT INTO employee_project " . 
                    "(employee_id, project_id) VALUES " . 
                    "(:employee_id, :project_id)";
            }
            else {
                $sql = "UPDATE employee_project SET " .
                       "employee_id = :employee_id, " .
                       "project_id = :project_id, " .
                       "WHERE id = :id" ;

                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);   
            $status = $stmt->execute($params);
        
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = sprintf(
                    "SQLSTATE error code: %d; error message: %s",
                    $error_info[0],
                    $error_info[2]
                );
                throw new Exception($message);  
            }
        
            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save profile.");
            }
        
            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }
    }

    public function delete() {
        $dataBase = null;
        try {
            if ($this->id !== null) {
                $dataBase = new dataBase();
                $conn = $dataBase->open();
        
                $sql = "DELETE FROM employee_project WHERE id = :id" ;
                $params = [
                    ":id" => $this->id
                ];
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);
        
                if (!$status) {
                    $error_info = $stmt->errorInfo();
                    $message = sprintf(
                        "SQLSTATE error code: %d; error message: %s",
                        $error_info[0],
                        $error_info[2]
                    );
                    throw new Exception($message);  
                }
        
                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete profile.");
                }
                $this->id = null;
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }
    }

    public static function findAll() {
        $employee_project = array();

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM employee_project";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = sprintf(
                    "SQLSTATE error code: %d; error message: %s",
                    $error_info[0],
                    $error_info[2]
                );
                throw new Exception($message);  
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $employeeProjectProfile = new employeeProjectProfile($row);
                    $employee_project[] = $employeeProjectProfile;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $employee_project;
    }

    public static function findDataBaseID($id) {
        $employeeProjectProfile = null;

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM employee_project WHERE id = :id";
            $params = [
                ":id" => $id
            ];
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = sprintf(
                    "SQLSTATE error code: %d; error message: %s",
                    $error_info[0],
                    $error_info[2]
                );
                throw new Exception($message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $employeeProjectProfile = new employeeProjectProfile($row);
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $employeeProjectProfile;
    }
}