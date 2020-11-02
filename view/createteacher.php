<?php

include 'view/includes/header.php'
?>

<form action="" method="post">
    <label for="firstname">Teacher Name:</label>
    <input type="text" name="teachername" value="">
    <span class="text-danger"><?php echo $classNameErrMess ;?></span>
    <label for="email">Email:</label>
    <input type="text" name="email">
    <span class="text-danger"><?php echo $locationErrMess ;?></span>
    <button type="submit">Submit</button>
</form>
<?php include 'view/includes/footer.php' ?>
