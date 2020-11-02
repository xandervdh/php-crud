<?php require 'includes/header.php'; ?>

    <form method="post">
        <input class="btn btn-primary" type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $profile['name'] . '<br>';
echo 'email: ' . $profile['email'] . '<br>';
echo 'teacher: ' . $teacher['name'] . '<br>';
echo 'class: ' . $class['name'] . '<br>';
?>

<?php require 'includes/footer.php';