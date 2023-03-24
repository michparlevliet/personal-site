<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: socials.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['link'] )
  {
    
    $query = 'UPDATE socials SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      link = "'.mysqli_real_escape_string( $connect, $_POST['link'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Social has been updated' );
    
  }

  header( 'Location: socials.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM socials
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: socials.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Social</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>
  
  
  <label for="link">URL:</label>
  <input type="text" name="link" id="link" value="<?php echo htmlentities( $record['link'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Social">
  
</form>


<p><a class="menu" href="socials.php"><i class="fas fa-arrow-circle-left"></i> Return to Social List</a></p>




<?php

include( 'includes/footer.php' );

?>