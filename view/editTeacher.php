<?php

include 'view/includes/header.php'
?>

<form action="" method="post">
    <label for="firstname">Teacher Name:</label>
    <input type="text" name="teachername" value="<?php echo $this->class['name'] ;?>">
    <span class="text-danger"><?php echo $teacherNameErrMess ;?></span>
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $this->class['email'] ;?>">
    <span class="text-danger"><?php echo $emailErrMess ;?></span>
    <label for="class">Class:</label>
    <input type="text" value="<?php echo $this->class['classes_id'] ;?>" name="class">
    <span class="text-danger"><?php echo $classErrMess ;?></span>
    <button type="submit">Submit</button>
</form>
<?php include 'view/includes/footer.php' ?>
