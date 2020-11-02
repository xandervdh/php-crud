<?php require 'includes/header.php'; ?>
    <a href="http://crud.local/">back to homepage</a>
    <form method="post">
        <input class="btn btn-primary" type="submit" value="Delete Class">
    </form>

<?php
echo 'name: ' . $profile['name'] . '<br>';
echo 'email: ' . $profile['email'] . '<br>';
echo 'students: <br>';
foreach ($students as $student){
    echo '- ' . $student['name'] . '<br>';
}
?>

<?php require 'includes/footer.php';