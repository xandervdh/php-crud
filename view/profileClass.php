<?php require 'includes/header.php'; ?>

<?php
echo 'name: ' . $class['name'] . '<br>';
echo 'location: ' . $class['location'] . '<br>';
echo 'teacher: ' . $teacher['name'] . '<br>';
echo 'students: <br>';
foreach ($students as $student){
    echo '- ' . $student['name'];
}
?>

<?php require 'includes/footer.php';