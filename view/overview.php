<?php require 'includes/header.php'; ?>

    <div id="container">

        <div id="row">

            <a href="http://php-crud.local/?page=new" class='btn btn-primary'>Create new</a>

            <?php foreach ($overview as $class) : ?>

                <a href="http://php-crud.local/?page=edit" class='btn btn-primary'>Edit</a>
                <a href="http://php-crud.local/?page=delete" class='btn btn-primary'>Delete</a>

            <p>Name:<?php echo $class->getName();?> </p>

            <p>Location:<?php echo $class->getLocation();?> </p>

            <p>Teacher:<?php echo $class->getTeacher()->getName();?> </p>

            <?php foreach ($class->getStudents() as $student){

            echo $student->getName() . "<br>";

                }
            ?>
            <hr>
            <?php endforeach;?>

        </div>

    </div>


<?php require 'includes/footer.php'; ?>