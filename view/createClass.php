<?php

include 'view/includes/header.php'
?>

<form action="" method="post">
    <label for="firstname">Class Name:</label>
    <input type="text" name="classname">
    <span class="text-danger"><?php echo $classNameErrMess ;?></span>
    <label for="email">Location:</label>
    <input type="text" name="location">
    <span class="text-danger"><?php echo $locationErrMess ;?></span>
    <button type="submit">Submit</button>
</form>
<?php include 'view/includes/footer.php' ?>
