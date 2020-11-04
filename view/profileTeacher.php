<?php require 'includes/header.php'; ?>
    <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>
    <form method="post">
        <input class="btn btn-primary" type="submit" value="Delete Class">
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