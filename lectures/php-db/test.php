<?php
require_once "./etc/config.php";

try {
    $profiles = Profile::findAll();
    echo "<pre>";
    print_r($profiles);
    echo "</pre>";

    $profile = new Profile([
        "name" => "Jane Bloggs",
        "age" => 25,
        "category" => "Music",
        "experience" => "Competent",
        "languages" => "Spanish,Irish"
    ]);
    $profile->save();

    $id = $profile->id;
    $profile = Profile::findById($id);
    if ($profile === null) {
        throw new Exception("New profile not found");
    }
    echo "<pre>";
    print_r($profile);
    echo "</pre>";

    $profile->name = "Joe Bloggs";
    $profile->save();

    $profile = Profile::findById($id);
    if ($profile === null) {
        throw new Exception("Updated profile not found");
    }
    echo "<pre>";
    print_r($profile);
    echo "</pre>";

    $profile->delete();
    
    $profile = Profile::findById($id);
    if ($profile != null) {
        throw new Exception("Deleted profile found");
    }
    echo "<p>Profile not found</p>";
}
catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>