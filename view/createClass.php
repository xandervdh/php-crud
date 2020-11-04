<?php

include 'view/includes/header.php'
?>
<div class="home">
    <form action="" method="post">
        <label for="firstname">Class Name:</label><br>
        <input type="text" name="classname"><br>
        <span class="text-danger"><?php echo $classNameErrMess ;?></span><br>
        <label for="email">Location:</label><br>
        <input type="text" name="location"><br>
        <span class="text-danger"><?php echo $locationErrMess ;?></span><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'view/includes/footer.php' ?>
