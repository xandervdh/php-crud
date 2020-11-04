<?php

include 'view/includes/header.php'
?>
<div class="home">
    <form action="" method="post">
        <label for="firstname">Student Name:</label><br>
        <input type="text" name="studentname" value=""><br>
        <span class="text-danger"><?php echo $studentNameErrMess ;?></span><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email"><br>
        <span class="text-danger"><?php echo $emailErrMess ;?></span><br>
        <label for="class">Class:</label><br>
        <input type="text" name="class"><br>
        <span class="text-danger"><?php echo $classErrMess ;?></span><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'view/includes/footer.php' ?>
