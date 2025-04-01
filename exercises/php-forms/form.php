<?php
require_once "./etc/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo "<pre>";
if (array_key_exists("form-data", $_SESSION)) {
    print_r($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    print_r($_SESSION["form-errors"]);
}

echo "</pre>";
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
        <h2>Credit Card Payment Form</h2>
        <form action="process_form.php" method="POST">
            <p>
                Card Type:
                <input type="radio" 
                        name="issuer" 
                        value="visa" 
                        <?= chosen("issuer", "visa") ? "checked" : "" ?>>
                        Visa
                <input type="radio" 
                        name="issuer" 
                        value="mcrd" 
                        <?= chosen("issuer", "mcrd") ? "checked" : "" ?>>
                        Mastercard
                <input type="radio" 
                        name="issuer" 
                        value="amex" 
                        <?= chosen("issuer", "amex") ? "checked" : "" ?>>
                        American Express
                <input type="radio" 
                        name="issuer" 
                        value="disc" 
                        <?= chosen("issuer", "disc") ? "checked" : "" ?>>
                        Discover
                        <span class="error"><?= error("issuer") ?></span> 
            </p>
            <p>
                Name: 
                <input type="text" name="name" value="<?= old("name") ?>">
                <span class="error"><?= error("name") ?></span> 
            </p>
            <p>
                Card Number: 
                <input type="text" name="number" value="<?= old("number")?>">
                <span class="error"><?= error("number") ?></span> 
            </p>    
            <p>
                Expiry Month:
                <select name="month">
                    <option value="">Please choose the expiry month...</option>"
                    <option value="Jan"<?= chosen("month", "Jan") ? "selected" : "" ?>>Jan</option>
                    <option value="Feb"<?= chosen("month", "Feb") ? "selected" : "" ?>>Feb</option>
                    <option value="Mar"<?= chosen("month", "Mar") ? "selected" : "" ?>>Mar</option>
                    <option value="Apr"<?= chosen("month", "Apr") ? "selected" : "" ?>>Apr</option>
                    <option value="May"<?= chosen("month", "May") ? "selected" : "" ?>>May</option>
                    <option value="Jun"<?= chosen("month", "Jun") ? "selected" : "" ?>>Jun</option>
                    <option value="Jul"<?= chosen("month", "Jul") ? "selected" : "" ?>>Jul</option>
                    <option value="Aug"<?= chosen("month", "Aug") ? "selected" : "" ?>>Aug</option>
                    <option value="Sep"<?= chosen("month", "Sep") ? "selected" : "" ?>>Sep</option>
                    <option value="Oct"<?= chosen("month", "Oct") ? "selected" : "" ?>>Oct</option>
                    <option value="Nov"<?= chosen("month", "Nov") ? "selected" : "" ?>>Nov</option>
                    <option value="Dec"<?= chosen("month", "Dec") ? "selected" : "" ?>>Dec</option>
                </select>
                <span class="error"><?= error("month") ?></span> 
            </p>
            <p>
                Expiry Year:
                <select name="year">
                    <option value="">Please choose the expiry year...</option>"
                    <option value="2025"<?= chosen("year", "2025") ? "selected" : "" ?>>2025</option>
                    <option value="2026"<?= chosen("year", "2026") ? "selected" : "" ?>>2026</option>
                    <option value="2027"<?= chosen("year", "2027") ? "selected" : "" ?>>2027</option>
                    <option value="2028"<?= chosen("year", "2028") ? "selected" : "" ?>>2028</option>
                    <option value="2029"<?= chosen("year", "2029") ? "selected" : "" ?>>2029</option>
                </select>
                <span class="error"><?= error("year") ?></span> 
            </p>
            <p>
                CVV: 
                <input type="text" name="cvv" value="<?= old("cvv") ?>">
                <span class="error"><?= error("cvv") ?></span> 
            </p>
            <p>
                Save card details:
                <input type="checkbox" 
                        name="save" 
                        value="Yes"
                        <?= chosen("save", "Yes") ? "checked" : "" ?>>
                        Yes
                        <span class="error"><?= error("save") ?></span> 
            </p>
            <p>
                Accept terms and conditions:
                <input type="checkbox" 
                        name="accept" 
                        value="Yes"
                        <?= chosen("save", "Yes") ? "checked" : "" ?>>
                        Yes
                        <span class="error"><?= error("accept") ?></span> 
            </p>
            <button type="submit">Submit</button>
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