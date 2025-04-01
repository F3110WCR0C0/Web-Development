<?php

class DepartmentsProfile {

    public $id;
    public $title;
    public $location;
    public $website;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->title  = $props["title"];
            $this->location = $props["location"];
            $this->website  = $props["website"];
        }
    }

    public function save() {
        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();
        
            $params = [
                ":title"  => $this->title,
                ":location" => $this->location,
                ":website"  => $this->website,
            ];

            if ($this->id === null) {
                $sql = 
                    "INSERT INTO departments " . 
                    "(title, location, website) VALUES " . 
                    "(:title, :location, :website)";
            }
            else {
                $sql = "UPDATE departments SET " .
                       "title = :title, " .
                       "location = :location, " .
                       "website = :website " .
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
        
                $sql = "DELETE FROM departments WHERE id = :id" ;
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
        $departments = array();

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM departments";
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
                    $departmentsProfile = new departmentsProfile($row);
                    $departments[] = $departmentsProfile;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $departments;
    }

    public static function findDataBaseID($id) {
        $departmentsProfile = null;

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM departments WHERE id = :id";
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
                $departmentsProfile = new departmentsProfile($row);
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $departmentsProfile;
    }
}