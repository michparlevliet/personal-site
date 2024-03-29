<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM education
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Education has been deleted' );
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM education
  ORDER BY finishing_date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Education</h2>

<table>
  <tr>
    
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Type</th>
    <th align="center">Course</th>
    <th align="center">Start Date</th>
    <th align="center">Finishing Date</th>
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
      <td align="center"><?php echo $record['course']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['start_date'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['finishing_date'] ); ?></td>
      <td align="center"><a class="small_btn" href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a a class="del_btn" href="education.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a class="small_btn" href="education_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include( 'includes/footer.php' );

?>