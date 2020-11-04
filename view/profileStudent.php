<?php require 'includes/header.php'; ?>
    <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>
    <a href="http://crud.local/?edit=student&user=<?php echo $profile['id'] ?>" class='btn btn-primary'>Edit</a>
    <form method="post" action="http://crud.local">
        <input type="submit" value="delete" name="action" class='btn btn-primary'>
        <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">
    </form>

<?php
echo 'name: ' . $profile['name'] . '<br>';
echo 'email: ' . $profile['email'] . '<br>';
echo "Teacher: <a href='http://crud.local/?profile=teacher&user=" . $teacher['id'] . "'>" . $teacher['name'] . "</a><br>";
echo "Class: <a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
?>

<?php require 'includes/footer.php';