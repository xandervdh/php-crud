<?php require 'includes/header.php'; ?>

<div id="container">

    <div id="row">

        <a href="http://php-crud.local/?page=new" class='btn btn-primary'>Create new</a>

        <?php foreach ($overview as $teacher) : ?>

            <a href="http://php-crud.local/?page=edit" class='btn btn-primary'>Edit</a>

            <form method ="post">
                <input type="submit" value="delete" name="action" class='btn btn-primary'>
                <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>">
            </form>

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


