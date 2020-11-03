<?php require 'includes/header.php'; ?>

<div id="container">

    <div id="row">

        <a href="http://php-crud.local/?page=new" class='btn btn-primary'>Create new</a>

        <?php foreach ($this->overview as $student) : ?>

            <a href="http://php-crud.local/?page=edit" class='btn btn-primary'>Edit</a>
            <a href="http://php-crud.local/?page=delete" class='btn btn-primary'>Delete</a>

            <p>Name: <a href="http://crud.local/?profile=teacher&user=<?php echo $student['id'] ?>"><?php echo $student['name'];?></a></p>

            <p>Email:<?php echo $student['email'];?> </p>

            <?php $class = $this->connection->getClass($student['classes_id']);
            echo "<a href='http://crud.local/?profile=class&user=" . $class['id'] . "'>" . $class['name'] . "</a><br>";
            ?>

            <?php $teacher = $this->connection->getTeacher($student['classes_id']);
            echo "<a href='http://crud.local/?profile=teacher&user=" . $teacher['id'] . "'>" . $teacher['name'] . "</a><br>";
            ?>

            <hr>
        <?php endforeach;?>

    </div>

</div>


<?php require 'includes/footer.php'; ?>



