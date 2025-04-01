<?php

class EmployeeProfile {

    public $id;
    public $name;
    public $ppsn;
    public $salary;
    public $department_id;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->name = $props["name"];
            $this->ppsn  = $props["ppsn"];
            $this->salary = $props["salary"];
            $this->department_id  = $props["department_id"];
        }
    }

    public function save() {
        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();
        
            $params = [
                ":name" => $this->name,
                ":ppsn"  => $this->ppsn,
                ":salary" => $this->salary,
                ":department_id"  => $this->department_id,
            ];

            if ($this->id === null) {
                $sql = 
                    "INSERT INTO employees " . 
                    "(name, ppsn, salary, department_id) VALUES " . 
                    "(:name, :ppsn, :salary, :department_id)";
            }
            else {
                $sql = "UPDATE employees SET " .
                       "name = :name, " .
                       "ppsn = :ppsn, " .
                       "salary = :salary, " .
                       "department_id = :department_id " .
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
        
                $sql = "DELETE FROM employees WHERE id = :id" ;
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
        $employees = array();

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM employees";
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
                    $employeeProfile = new EmployeeProfile($row);
                    $employees[] = $employeeProfile;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $employees;
    }

    public static function findDataBaseID($id) {
        $employeeProfile = null;

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM employees WHERE id = :id";
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
                $employeeProfile = new EmployeeProfile($row);
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $employeeProfile;
    }
}