<?php require 'includes/header.php'; ?>
    <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>
    <a href="http://crud.local/?edit=teacher&user=<?php echo $profile['id'] ?>" class='btn btn-primary'>Edit</a>
    <form method ="post" action="http://crud.local">
        <input type="submit" value="delete" name="action" class='btn btn-primary'>
        <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">
    </form>

<?php
echo 'name: ' . $profile['name'] . '<br>';
echo 'email: ' . $profile['email'] . '<br>';
echo "<a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
echo 'students: <br>';
foreach ($students as $student){
    echo "<a href='http://crud.local/?profile=student&user=" . $student['id'] . "'>" . $student['name'] . "</a><br>";
}
?>

<?php require 'includes/footer.php';