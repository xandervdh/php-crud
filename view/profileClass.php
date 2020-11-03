<?php require 'includes/header.php'; ?>
    <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>
    <form method="post">
        <input class="btn btn-primary" type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $profile->getName() . '<br>';
echo 'location: ' . $profile->getLocation() . '<br>';
echo "<a href='http://crud.local/?profile=teacher&user=" . $profile->getTeacher()->getId() . "'>" . $student->getName() . "</a><br>";
echo 'teacher: ' . $profile->getTeacher()->getName() . '<br>';
echo 'students: <br>';
foreach ($profile->getStudents() as $student){
    echo '- ' . $student->getname() . '<br>';
}
?>

<?php require 'includes/footer.php';