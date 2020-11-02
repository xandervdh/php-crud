<?php require 'includes/header.php'; ?>

<div id="container">

    <div id="row">

        <a href="http://php-crud.local/?page=new" class='btn btn-primary'>Create new</a>

        <?php foreach ($overview as $teacher) : ?>

            <a href="http://php-crud.local/?page=edit" class='btn btn-primary'>Edit</a>
            <a href="http://php-crud.local/?page=delete" class='btn btn-primary'>Delete</a>

            <p>Name: <a href="http://crud.local/?profile=teacher&user=<?php echo $teacher['id'] ?>"><?php echo $teacher['name'];?></a></p>

            <p>Email:<?php echo $teacher['email'];?> </p>

            <?php
            $students = $connection->getStudents($teacher['classes_id']);

            foreach ($students as $student){
                echo "<a href='http://crud.local/?profile=student&user=" . $student['id'] . "'>" . $student['name'] . "</a><br>";
            }
            ?>
            <hr>
        <?php endforeach;?>

    </div>

</div>


<?php require 'includes/footer.php'; ?>


