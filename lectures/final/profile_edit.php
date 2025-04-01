<?php
require_once "./etc/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }
    if (!array_key_exists("id", $_GET)) {
        throw new Exception("Invalid request parameters");
    }
    $id = $_GET["id"];
    $profile = Profile::findById($id);
    if ($profile === null) {
        throw new Exception("Profile not found");
    }
    $profile->languages = explode(",", $profile->languages);
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Form</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h2>Edit Profile Form</h2>
        <form action="profile_update.php" method="POST">
            <input type="hidden" name="id" value="<?= $profile->id ?>">
            <p>
                Name: 
                <input type="text" name="name" value="<?= old("name", $profile->name) ?>">
                <span class="error"><?= error("name") ?><span>
            </p>
            <p>
                Age: 
                <input type="text" name="age" value="<?= old("age", $profile->age) ?>">
                <span class="error"><?= error("age") ?><span>
            </p>
            <p>
                Category:
                <select name="category">
                    <option value="">Please choose a category...</option>"
                    <option value="Sport"  
                            <?= chosen("category", "Sport", $profile->category)  ? "selected" : "" ?>
                    >
                        Sport
                    </option>
                    <option value="Music"  
                            <?= chosen("category", "Music", $profile->category)  ? "selected" : "" ?>
                    >
                        Music
                    </option>
                    <option value="Movies" 
                            <?= chosen("category", "Movies", $profile->category) ? "selected" : "" ?>
                    >
                        Movies
                    </option>
                </select>
                <span class="error"><?= error("category") ?><span>
            </p>
            <p>
                Experience:
                <input type="radio" 
                       name="experience" 
                       value="Novice"    
                       <?= chosen("experience", "Novice", $profile->experience)    ? "checked" : "" ?>
                >Novice
                <input type="radio" 
                       name="experience" 
                       value="Competent" 
                       <?= chosen("experience", "Competent", $profile->experience) ? "checked" : "" ?>
                >Competent
                <input type="radio" 
                       name="experience" 
                       value="Expert"    
                       <?= chosen("experience", "Expert", $profile->experience)    ? "checked" : "" ?>
                >Expert
                <span class="error"><?= error("experience") ?><span>
            </p>
            <p>
                Languages:
                <input type="checkbox" 
                       name="languages[]" 
                       value="English" 
                       <?= chosen("languages", "English", $profile->languages) ? "checked" : "" ?>
                >English
                <input type="checkbox" 
                       name="languages[]" 
                       value="Irish"   
                       <?= chosen("languages", "Irish", $profile->languages)   ? "checked" : "" ?>
                >Irish
                <input type="checkbox" 
                       name="languages[]" 
                       value="Spanish" 
                       <?= chosen("languages", "Spanish", $profile->languages) ? "checked" : "" ?>
                >Spanish
                <span class="error"><?= error("languages") ?><span>
            </p>
            <button type="submit">Update</button>
            <a href="index.php">Cancel</a>
        </form>
    </body>
</html>
<?php
if (array_key_exists("form-data", $_SESSION)) {
    unset($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    unset($_SESSION["form-errors"]);
}
?>