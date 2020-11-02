<?php require 'includes/header.php'; ?>

    <div id="container">

        <div id="row">

            <?php foreach ($classes as $class) : ?>

            <p>Name:<?php echo $class->getName();?> </p>
            <p>Location:<?php echo $class->getLocation();?> </p>
            <p>Teacher:<?php echo $class->getTeacher()->getName();?> </p>

            <?php foreach ($class->getStudents() as $student){

            echo $student->getName() . "<br>";

                }
            ?>

            <?php endforeach;?>

        </div>

    </div>


<?php require 'includes/footer.php'; ?>