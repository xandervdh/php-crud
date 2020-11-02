<?php require 'includes/header.php'; ?>
    <a href="http://crud.local/">back to homepage</a>
    <form method="post">
        <input type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $profile->getName() . '<br>';
echo 'location: ' . $profile->getLocation() . '<br>';
echo 'teacher: ' . $profile->getTeacher()->getName() . '<br>';
echo 'students: <br>';
foreach ($profile->getStudents() as $student){
    echo '- ' . $student->getname() . '<br>';
}
?>

<?php require 'includes/footer.php';