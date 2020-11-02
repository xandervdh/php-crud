<?php require 'includes/header.php'; ?>

    <form method="post">
        <input type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $class['name'] . '<br>';
echo 'location: ' . $class['location'] . '<br>';
echo 'teacher: ' . $teacher['name'] . '<br>';
echo 'students: <br>';
foreach ($students as $student){
    echo '- ' . $student['name'] . '<br>';
}
?>

<?php require 'includes/footer.php';