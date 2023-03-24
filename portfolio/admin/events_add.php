<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO events (
        name,
        type,
        description,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
         
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Event has been added' );
    
  }
  
  header( 'Location: events.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Event</h2>

<form method="post">
  
  <label for="name">Event Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="type">Type:</label>
  <input type="text" name="type" id="type">
  
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
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
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  <input type="submit" value="Add Event">
  
</form>

<p><a class="menu" href="events.php"><i class="fas fa-arrow-circle-left"></i> Return to Event List</a></p>


<?php

include( 'includes/footer.php' );

?>