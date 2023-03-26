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
    <script src="https://kit.fontawesome.com/a2dd563b7f.js" crossorigin="anonymous"></script>

    
  </head>
  <body>

  <header id="site-header">
      <nav id="main-nav">
        <ul>
          <li><a href="#about-section">About</a></li>
          <li><a href="#projects-section">Projects</a></li>
          <li><a href="#skills-section">Skills</a></li>
          <li><a href="#">Education</a></li>
          <li><a href="#">Experience</a></li>
        </ul>
      </nav>
    </header>
    <div id="heading">
      <div id="banner">
        <h1>Michelle Parlevliet</h1>

        <?php

        $query = 'SELECT *
          FROM socials';
        $result = mysqli_query( $connect, $query );

        ?>

        <aside id="social-bar">
            <ul>
            <?php while($record = mysqli_fetch_assoc($result)): ?>
              <li>
                <a href="<?php echo $record['link']; ?>">
                  <img class="social-icon" src="<?php echo $record['photo']; ?>">
                </a>
              </li>
            <?php endwhile; ?>
            </ul>
          </aside>
        </div>
      <a id="about-section"></a>
      <div class="about">
        <p>Hi there! I'm a Toronto-based developer who focuses on creative and unique interfaces, strong coding practices, and well-designed databases. I am a recent graduate of the Creative Industries BA at Toronto Metropolitan University and currently pursuing a post-grad in Web Development at Humber College.</p>
        <p>I hope to have a career doing full-stack development for a company that excites and challenges me. I enjoy illustrating, reading, and working out in my free time. Please take a look through my work and enjoy!</p>
      </div>    
    </div>

    <?php

    $query = 'SELECT *
      FROM projects
      ORDER BY date DESC';
    $result = mysqli_query( $connect, $query );

    ?>

  <main>
      <a id="projects-section"></a>
      <div id="projects">
        <h2>Projects</h2>
        <?php while($record = mysqli_fetch_assoc($result)): ?>

          <div class="project-card">

            <h3><?php echo $record['title']; ?></h3>
            <p><?php echo $record['content']; ?></p>

            <?php if($record['photo']): ?>

              <img class="project-img" src="<?php echo $record['photo']; ?>">

            <?php else: ?>

              <p>This record does not have an image!</p>

            <?php endif; ?>
            <a class="link-project" href="<?php echo $record['url']; ?>">Try it!</a>

          </div>

        <?php endwhile; ?>
      </div>

      <div id="skills">
      <a id="skills-section"></a>
        <h2>Skills</h2>

        <?php

        $query = 'SELECT *
          FROM skills
          ORDER BY percent DESC';
        $result = mysqli_query($connect, $query);

        ?>

        <?php while($record = mysqli_fetch_assoc($result)): ?>
           <div class="skill">
            <a href="<?php echo $record['url']; ?>">
                <img class="skill-img" src="<?php echo $record['photo']; ?>">
            </a>
            <h3><?php echo $record['name']; ?></h3>
            <div class="skill-bar" style ="width:<?php echo $record['percent']; ?>%;">
            </div>
          </div>
        
        <?php endwhile; ?>
      </div>
    </main>
    <footer>
    <nav id="footer-nav">
      <ul>
          <li><a href="#about-section">About</a></li>
          <li><a href="#projects-section">Projects</a></li>
          <li><a href="#skills-section">Skills</a></li>
          <li><a href="#">Education</a></li>
          <li><a href="#">Experience</a></li>
      </ul>
    </nav>
  </footer>
  </body>
</html>