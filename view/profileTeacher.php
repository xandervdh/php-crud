<?php require 'includes/header.php'; ?>
    <div class="home">
        <div class="buttonWrap">
            <a class="buttons edit btn btn-primary" href="http://crud.local/">Back to homepage</a>
            <a href="http://crud.local/?edit=teacher&user=<?php echo $profile['id'] ?>" class='buttons edit btn btn-primary'>Edit</a>
            <form method ="post" action="http://crud.local">
                <input type="submit" value="delete" name="action" class='buttons btn btn-primary'>
                <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">
            </form>
        </div>

        <?php
        echo 'Name: ' . $profile['name'] . '<br>';
        echo 'Email: ' . $profile['email'] . '<br>';
        echo "<a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
        echo 'Students: <br>';
        foreach ($students as $student){
            echo "<a href='http://crud.local/?profile=student&user=" . $student['id'] . "'>" . $student['name'] . "</a><br>";
        }
        ?>
    </div>

<?php require 'includes/footer.php';