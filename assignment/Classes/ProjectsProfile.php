<?php

class ProjectsProfile {

    public $id;
    public $title;
    public $description;
    public $start_date;
    public $end_date;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->title  = $props["title"];
            $this->description = $props["description"];
            $this->start_date  = $props["start_date"];
            $this->end_date  = $props["end_date"];
        }
    }

    public function save() {
        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();
        
            $params = [
                ":title"  => $this->title,
                ":description" => $this->description,
                ":start_date"  => $this->start_date,
                ":end_date"  => $this->end_date,


            ];

            if ($this->id === null) {
                $sql = 
                    "INSERT INTO projects " . 
                    "(title, description, start_date, end_date) VALUES " . 
                    "(:title, :description, :start_date, :end_date)";
            }
            else {
                $sql = "UPDATE projects SET " .
                       "title = :title, " .
                       "description = :description, " .
                       "start_date = :start_date " .
                       "end_date = :end_date " .
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
        
                $sql = "DELETE FROM projects WHERE id = :id" ;
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
        $projects = array();

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM projects";
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
                    $projectsProfile = new projectsProfile($row);
                    $projects[] = $projectsProfile;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $projects;
    }

    public static function findDataBaseID($id) {
        $projectsProfile = null;

        try {
            $dataBase = new dataBase();
            $conn = $dataBase->open();

            $sql = "SELECT * FROM projects WHERE id = :id";
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
                $projectsProfile = new projectsProfile($row);
            }
        }
        finally {
            if ($dataBase !== null && $dataBase->isOpen()) {
                $dataBase->close();
            }
        }

        return $projectsProfile;
    }
}