<?php require 'includes/header.php'; ?>
   <div class="home">
       <div class="buttonWrap">
           <a class="buttons edit btn btn-primary" href="http://crud.local/">Back to homepage</a>
           <a href="http://crud.local/?edit=class&user=<?php echo $profile->getId() ?>" class='buttons edit btn btn-primary'>Edit</a>
           <form method ="post" action="http://crud.local">
               <input type="submit" value="delete" name="action" class='buttons btn btn-primary'>
               <input type="hidden" name="id" value="<?php echo $profile->getId() ?>">
           </form>
       </div>


       <?php
       echo 'Name: ' . $profile->getName() . '<br>';
       echo 'Location: ' . $profile->getLocation() . '<br>';
       echo "Teacher: <a href='http://crud.local/?profile=teacher&user=" . $teacher['id'] . "'>" . $profile->getTeacher()->getName() . "</a><br>";
       echo 'Students: <br>';
       foreach ($students as $student){
           echo "<a href='http://crud.local/?profile=student&user=" .  $student['id'] . "'>" . $student['name'] . "</a><br>";
       }
       ?>
   </div>



<?php require 'includes/footer.php';