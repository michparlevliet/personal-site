<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['course'] )
  {
    
    $query = 'UPDATE education SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      course = "'.mysqli_real_escape_string( $connect, $_POST['course'] ).'",
      type = "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
      start_date = "'.mysqli_real_escape_string( $connect, $_POST['start_date'] ).'",
      finishing_date = "'.mysqli_real_escape_string( $connect, $_POST['finishing_date'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM education
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="title">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
  
  <br>

  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Associate degree','Bachelor degree','Doctoral degree','Professional degree','Diploma','Postgraduate Diploma','Certificate','Postgraduate Certificate','Others' );
  
  echo '<select name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['type'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <label for="course">Course:</label>
  <input type="text" name="course" id="course" value="<?php echo htmlentities( $record['course'] ); ?>">
    
  <br>
  
  <label for="start_date">Start Date:</label>
  <input type="date" name="start_date" id="start_date" value="<?php echo htmlentities( $record['start_date'] ); ?>">
    
  <br>

  <label for="finishing_date">Finishing Date:</label>
  <input type="date" name="finishing_date" id="finishing_date" value="<?php echo htmlentities( $record['finishing_date'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a class="menu" href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>