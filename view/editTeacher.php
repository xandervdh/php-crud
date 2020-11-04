<?php

include 'view/includes/header.php'
?>
<div class="home">
    <form action="" method="post">
        <label for="firstname">Teacher Name:</label><br>
        <input type="text" name="teachername" value="<?php echo $this->class['name'] ;?>"><br>
        <span class="text-danger"><?php echo $teacherNameErrMess ;?></span><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" value="<?php echo $this->class['email'] ;?>"><br>
        <span class="text-danger"><?php echo $emailErrMess ;?></span><br>
        <label for="class">Class:</label><br>
        <input type="text" value="<?php echo $this->class['name'] ;?>" name="class"><br>
        <span class="text-danger"><?php echo $classErrMess ;?></span><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'view/includes/footer.php' ?>
