<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4aec9b7b34.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@600&family=DM+Serif+Display&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  
  <div id="header">
    <h1>Portfolio Website Admin</h1>
    <p>Create your own portfolio through this content management system.</p>
  </div>

  <?php if(isset($_SESSION['id'])): ?>

    <p style="padding: 0 1%; text-align: center;">
      <a class="menu" href="dashboard.php">Dashboard</a> | 
      <a class="menu" href="logout.php">Logout</a>
    </p>
  
  <?php endif; ?>
  
  <hr>
  
  <?php echo get_message(); ?>
  
  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">
  
