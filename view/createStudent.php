<?php

include 'view/includes/header.php'
?>

<form action="" method="post">
    <label for="firstname">Student Name:</label>
    <input type="text" name="studentname" value="">
    <span class="text-danger"><?php echo $studentNameErrMess ;?></span>
    <label for="email">Email:</label>
    <input type="text" name="email">
    <span class="text-danger"><?php echo $emailErrMess ;?></span>
    <label for="class">Class:</label>
    <input type="text" name="class">
    <span class="text-danger"><?php echo $classErrMess ;?></span>
    <button type="submit">Submit</button>
</form>
<?php include 'view/includes/footer.php' ?>
