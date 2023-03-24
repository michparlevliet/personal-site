<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['course'] )
  {
    
    $query = 'INSERT INTO education (
        name,
        course,
        type,
        start_date,
        finishing_date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['course'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['start_date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['finishing_date'] ).'"
         
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="name">School Name:</label>
  <input type="text" name="name" id="name">
    
  <br>

  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Associate degree','Bachelor degree','Doctoral degree','Professional degree','Diploma','Postgraduate Diploma','Certificate','Postgraduate Certificate','Others' );
  
  echo '<select name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <label for="type">Course:</label>
  <input type="text" name="course" id="course">
  
  <br>
  
  <label for="start_date">Start Date:</label>
  <input type="date" name="start_date" id="start_date">
  
  <br>
  
  <label for="date">Finishing Date:</label>
  <input type="date" name="finishing_date" id="finishing_date">
  
  <br>
  
  <input type="submit" value="Add Education">
  
</form>

<p><a class="menu" href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>