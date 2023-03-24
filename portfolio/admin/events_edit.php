<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: events.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['description'] )
  {
    
    $query = 'UPDATE events SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      type = "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Event has been updated' );
    
  }


  
  header( 'Location: events.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM events
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: events.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Event</h2>

<form method="post">
  
  <label for="name">Event Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="5"><?php echo htmlentities( $record['description'] ); ?></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="type">Type:</label>
  <input type="text" name="type" id="type" value="<?php echo htmlentities( $record['type'] ); ?>">
    
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  
  

  
  <input type="submit" value="Edit Event">
  
</form>

<p><a class="menu" href="events.php"><i class="fas fa-arrow-circle-left"></i> Return to Event List</a></p>


<?php

include( 'includes/footer.php' );

?>