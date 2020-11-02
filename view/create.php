<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'view/includes/header.php'
?>

<form action="" method="post">
    <label for="firstname">Class Name:</label>
    <input type="text" name="classname" value="">
    <label for="email">Location:</label>
    <input type="text" name="location">
    <button type="submit">Submit</button>
</form>
<?php include 'view/includes/footer.php' ?>
