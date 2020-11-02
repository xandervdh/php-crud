<?php require 'includes/header.php'; ?>

    <form method="post">
        <input type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $student['name'] . '<br>';
echo 'email: ' . $student['location'] . '<br>';
echo 'class: ' . $class['name'] . '<br>';
echo 'teacher: ' . $teacher['name'] . '<br>';
echo '<br>';
?>

<?php require 'includes/footer.php';