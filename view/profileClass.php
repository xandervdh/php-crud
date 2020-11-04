<?php require 'includes/header.php'; ?>
    <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>
    <form method="post">
        <input class="btn btn-primary" type="submit" name="action" value="Delete">
    </form>

<?php
echo 'name: ' . $profile->getName() . '<br>';
echo 'location: ' . $profile->getLocation() . '<br>';
echo "Teacher: <a href='http://crud.local/?profile=teacher&user=" . $teacher['id'] . "'>" . $profile->getTeacher()->getName() . "</a><br>";
echo 'students: <br>';
foreach ($students as $student){
    echo "<a href='http://crud.local/?profile=student&user=" .  $student['id'] . "'>" . $student['name'] . "</a><br>";
}
?>

<?php require 'includes/footer.php';