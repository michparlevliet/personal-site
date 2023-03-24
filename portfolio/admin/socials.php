<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM socials
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  // if there are existing joins, they should be deleted here as well. (linked projects to skills, for example)

  set_message( 'Social has been deleted' );
  
  header( 'Location: socials.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM socials
  ORDER BY name ASC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Socials</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="left">Link</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=social&id=<?php echo $record['id']; ?>&width=100&height=100&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="left">

        <a class="URL" href="<?php echo $record['link']; ?>"><?php echo $record['link']; ?></a>
      </td>
      <td align="center"><a class="small_btn" href="socials_photo.php?id=<?php echo $record['id']; ?>">Icon</i></a></td>
      <td align="center"><a class="small_btn" href="socials_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a class="del_btn" href="socials.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this social?');">Delete</i></a>

      </td>
    </tr>
  <?php endwhile; ?>
</table>


<p><a class="small_btn" href="socials_add.php"><i class="fas fa-plus-square"></i> Add Social</a></p>



<?php

include( 'includes/footer.php' );

?>