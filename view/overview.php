<?php require 'includes/header.php'; ?>

    <div id="container">

        <div id="row">

            <a href="http://crud.local/?create=class" class='btn btn-primary'>Create new</a>

            <?php foreach ($this->overview as $class) : ?>

                <a href="http://crud.local/?edit=class&user=<?php echo $class->getId() ?>" class='btn btn-primary'>Edit</a>

                <form method ="post">
                    <input type="submit" value="delete" name="action" class='btn btn-primary'>
                    <input type="hidden" name="id" value="<?php echo $class->getId() ?>">
                </form>


                <p>Name:
                    <a href="http://crud.local/?profile=class&user=<?php echo $class->getId(); ?>"><?php echo $class->getName(); ?></a>
                </p>

                <p>Location: <?php echo $class->getLocation(); ?> </p>

                <p>Teacher:
                    <a href="http://crud.local/?profile=teacher&user=<?php echo $class->getId(); ?>"><?php echo $class->getTeacher()->getName(); ?></a>
                </p>

                <?php foreach ($class->getStudents() as $student) {

                    $connection = new Connection();
                    $id = $connection->getStudentId($student->getName());

                    echo "<a href='http://crud.local/?profile=student&user=" . $id['id'] . "'>" . $student->getName() . "</a><br>";

                }
                ?>
                <hr>
            <?php endforeach; ?>

        </div>

    </div>


<?php require 'includes/footer.php'; ?>