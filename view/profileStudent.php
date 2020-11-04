<?php require 'includes/header.php'; ?>
    <div class="home">
        <div class="buttonWrap">
            <a class="buttons edit btn btn-primary" href="http://crud.local/">back to homepage</a>
            <a href="http://crud.local/?edit=student&user=<?php echo $profile['id'] ?>" class='buttons edit btn btn-primary'>Edit</a>
            <form method="post" action="http://crud.local">
                <input type="submit" value="delete" name="action" class='buttons btn btn-primary'>
                <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">
            </form>
        </div>

        <?php
        echo 'name: ' . $profile['name'] . '<br>';
        echo 'email: ' . $profile['email'] . '<br>';
        echo "Teacher: <a href='http://crud.local/?profile=teacher&user=" . $teacher['id'] . "'>" . $teacher['name'] . "</a><br>";
        echo "Class: <a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
        ?>
    </div>

<?php require 'includes/footer.php';