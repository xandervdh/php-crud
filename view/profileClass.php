<?php require 'includes/header.php'; ?>

    <form method="post">
        <input type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $profile->getName() . '<br>';
echo 'location: ' . $profile->getLocation() . '<br>';
echo 'teacher: ' . $profile->getTeacher()->getName() . '<br>';
echo 'students: <br>';
foreach ($profile->getStudents() as $student){
    echo '- ' . $student->get . '<br>';
}
?>

<?php require 'includes/footer.php';