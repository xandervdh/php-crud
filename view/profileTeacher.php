<?php require 'includes/header.php'; ?>

    <form method="post">
        <input type="submit" value="Delete Class">
    </form>

<?php
echo $profile['name'];
echo 'name: ' . $profile['name'] . '<br>';
echo 'email: ' . $profile['email'] . '<br>';
echo 'students: <br>';
foreach ($students as $student){
    echo '- ' . $student['name'] . '<br>';
}
?>

<?php require 'includes/footer.php';