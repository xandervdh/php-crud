<?php require 'includes/header.php'; ?>
    <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>
    <a href="http://crud.local/?edit=class&user=<?php echo $profile->getId() ?>" class='btn btn-primary'>Edit</a>
    <form method ="post" action="http://crud.local">
        <input type="submit" value="delete" name="action" class='btn btn-primary'>
        <input type="hidden" name="id" value="<?php echo $profile->getId() ?>">
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