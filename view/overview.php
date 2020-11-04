<?php require 'includes/header.php'; ?>

    <div class="container">
        <div class="buttonsWrap">
            <a href="http://crud.local/?create=class" class='btn btn-primary'>Create New</a>
            <a class="btn btn-primary" href="http://crud.local/">Back to homepage</a>
        </div>

        <div class="row">


            <?php foreach ($this->overview as $class) : ?>

                <div class="card col-3">

                    <div class="buttonsWrap">
                        <a href="http://crud.local/?edit=class&user=<?php echo $class->getId() ?>"
                           class='edit buttons btn btn-primary'>Edit</a>

                        <form method="post">
                            <input type="submit" value="delete" name="action" class='buttons btn btn-primary'>
                            <input type="hidden" name="id" value="<?php echo $class->getId() ?>">
                        </form>
                    </div>


                    <p>Name:
                        <a href="http://crud.local/?profile=class&user=<?php echo $class->getId(); ?>"><?php echo $class->getName(); ?></a>
                    </p>

                    <p>Location: <?php echo $class->getLocation(); ?> </p>

                    <p>Teacher:
                        <a href="http://crud.local/?profile=teacher&user=<?php echo $class->getId(); ?>"><?php echo $class->getTeacher()->getName(); ?></a>
                    </p>

                    <p>Student: </br>
                        <?php foreach ($class->getStudents() as $student) {

                            $connection = new Connection();
                            $id = $connection->getStudentId($student->getName());

                            echo "<a href='http://crud.local/?profile=student&user=" . $id['id'] . "'>" . $student->getName() . "</a><br>";

                        }
                        ?>
                    </p>

                </div>
            <?php endforeach; ?>


        </div>

    </div>


<?php require 'includes/footer.php'; ?>