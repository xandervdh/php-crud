<?php require 'includes/header.php'; ?>

<div id="container">

    <div id="row">

        <a href="http://php-crud.local/?page=new" class='btn btn-primary'>Create new</a>

        <?php foreach ($overview as $teacher) : ?>

            <a href="http://php-crud.local/?page=edit" class='btn btn-primary'>Edit</a>
            <a href="http://php-crud.local/?page=delete" class='btn btn-primary'>Delete</a>

            <p>Name:<?php echo $teacher['name'];?> </p>

            <p>Email:<?php echo $teacher['email'];?> </p>

            <?php
            $students = $connection->getStudents($teacher['classes_id']);

            foreach ($students as $student){

                echo $student['name'] . "<br>";

            }
            ?>
            <hr>
        <?php endforeach;?>

    </div>

</div>


<?php require 'includes/footer.php'; ?>


