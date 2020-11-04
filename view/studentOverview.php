<?php require 'includes/header.php'; ?>

<div class="container">
<div class="buttonWrapper">
    <a href="http://crud.local/?create=student" class='buttons btn btn-primary'>Create new</a>
    <a class="buttons btn btn-primary" href="http://crud.local/">Back to homepage</a>
</div>
    <div class="row">



        <?php foreach ($this->overview as $student) : ?>

            <div class="card col-3">
            <div class="buttonsWrap">
                <a href="http://crud.local/?edit=student&user=<?php echo $student['id'] ?>"
                   class='buttons edit btn btn-primary'>Edit</a>

                <form method="post">
                    <input type="submit" value="delete" name="action" class='buttons btn btn-primary'>
                    <input type="hidden" name="id" value="<?php echo $student['id'] ?>">
                </form>
            </div>


                <p>Name:
                    <a href="http://crud.local/?profile=student&user=<?php echo $student['id'] ?>"><?php echo $student['name']; ?></a>
                </p>

                <p>Email: <?php echo $student['email']; ?> </p>


                <?php $class = $this->connection->getClass($student['classes_id']);
                echo "Class: " . "<a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
                ?>

                <?php $teacher = $this->connection->getTeacher($student['classes_id']);
                echo "Teacher: " . "<a href='http://crud.local/?profile=teacher&user=" . $teacher['id'] . "'>" . $teacher['name'] . "</a><br>";
                ?>



            </div>

        <?php endforeach; ?>



    </div>

</div>


<?php require 'includes/footer.php'; ?>



