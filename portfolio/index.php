<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Anonymous+Pro&family=Archivo:wght@300;500&display=swap');
  </style>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Michelle Parlevliet</h1>
  <p>Junior Full-Stack Developer</p>

  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>

      <?php if($record['photo']): ?>

        <p>The image can be inserted using a base64 image:</p>

        <img src="<?php echo $record['photo']; ?>">

        <p>Or by streaming the image through the image.php file:</p>

        <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=100&height=100">

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>

    <hr>

  <?php endwhile; ?>

  <h2>My Skills</h2>

  <?php

  $query = 'SELECT *
    FROM skills
    ORDER BY percent DESC';
  $result = mysqli_query($connect, $query);

  ?>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <h3><?php echo $record['name']; ?></h3>

    <div style="background-color: grey;">
      <div style ="background-color: blue; height: 20px; width:<?php echo $record['percent']; ?>%;">
        <p style="color: white;"><?php echo $record['percent']; ?>%</p>
      </div>
    </div>
  
  <?php endwhile; ?>

</body>
</html>
