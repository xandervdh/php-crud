<?php require 'includes/header.php'; ?>

<div class="container">
    <div class="buttonsWrap">
        <a href="http://crud.local/?create=teacher" class='buttons btn btn-primary'>Create new</a>
        <a class="buttons btn btn-primary" href="http://crud.local/">back to homepage</a>
    </div>
    <div class="row">



        <?php foreach ($this->overview as $teacher) : ?>

            <div class="card col-3">
                <div class="buttonsWrap">
                    <a href="http://crud.local/?edit=teacher&user=<?php echo $teacher['id'] ?>"
                       class='edit buttons btn btn-primary'>Edit</a>

                    <form method="post">
                        <input type="submit" value="delete" name="action" class='buttons btn btn-primary'>
                        <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>">
                    </form>
                </div>


                <p>Name:
                    <a href="http://crud.local/?profile=teacher&user=<?php echo $teacher['id'] ?>"><?php echo $teacher['name']; ?></a>
                </p>

                <p>Email: <?php echo $teacher['email']; ?> </p>

                <?php

                $class = $this->connection->getClass($teacher['classes_id']);
                echo "Class: " . "<a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
                ?>

                <?php
                $students = $this->connection->getStudents($teacher['classes_id']);

                foreach ($students as $student) {
                    echo "Student: " . "<a href='http://crud.local/?profile=student&user=" . $student['id'] . "'>" . $student['name'] . "</a><br>";
                }
                ?>


            </div>

        <?php endforeach; ?>



    </div>

</div>


<?php require 'includes/footer.php'; ?>


