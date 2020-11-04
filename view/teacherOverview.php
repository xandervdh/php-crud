<?php require 'includes/header.php'; ?>

<div class="container">

    <div class="row">

        <a href="http://crud.local/?create=teacher" class='btn btn-primary'>Create new</a>

        <?php foreach ($this->overview as $teacher) : ?>

            <div class="card col-3">

                <a href="http://crud.local/?edit=teacher&user=<?php echo $teacher['id'] ?>"
                   class='btn btn-primary'>Edit</a>

                <form method="post">
                    <input type="submit" value="delete" name="action" class='btn btn-primary'>
                    <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>">
                </form>

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
                <hr>

            </div>

        <?php endforeach; ?>

        <a class="btn btn-primary" href="http://crud.local/">back to homepage</a>

    </div>

</div>


<?php require 'includes/footer.php'; ?>


