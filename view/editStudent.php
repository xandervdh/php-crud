<?php

include 'view/includes/header.php'
?>

<form action="" method="post">
    <label for="firstname">Student Name:</label>
    <input type="text" name="studentname" value="<?php echo $class['name'] ;?>">
    <span class="text-danger"><?php echo $studentNameErrMess ;?></span>
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $class['email'] ;?>">
    <span class="text-danger"><?php echo $emailErrMess ;?></span>
    <label for="class">Class:</label>
    <input type="text" name="class" value="<?php echo $class['classes_id'] ;?>">
    <span class="text-danger"><?php echo $classErrMess ;?></span>
    <button type="submit">Submit</button>
</form>
<?php include 'view/includes/footer.php' ?>
