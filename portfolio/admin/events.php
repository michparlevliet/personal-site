<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM events
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Event has been deleted' );
  
  header( 'Location: events.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM events
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage events</h2>

<table>
  <tr>
    
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Type</th>
    <th align="center">Description</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
    
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="center"><?php echo $record['type']; ?></td>
      <td align="left"><?php echo $record['description']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><a class="small_btn" href="events_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a class="del_btn" href="events.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this event?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a class="small_btn" href="events_add.php"><i class="fas fa-plus-square"></i> Add Event</a></p>


<?php

include( 'includes/footer.php' );

?>