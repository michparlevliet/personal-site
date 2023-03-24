<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>

<ul id="dashboard">
  <li class="btn">
    <a href="projects.php">
    <div class="icon"><i class="fa-solid fa-sheet-plastic fa-2xl"></i></div>
      Manage Projects
    </a>
  </li>
  <li class="btn">
    <a href="skills.php">
    <div class="icon"><i class="fa-solid fa-bars-progress fa-2xl"></i></div>
      Manage Skills
    </a>
  </li>
  <li class="btn">
    <a href="education.php">
    <div class="icon"><i class="fa-solid fa-graduation-cap fa-2xl"></i></div>
      Manage Education
    </a>
  </li>
  <li class="btn">
    <a href="events.php">
    <div class="icon"><i class="fa-solid fa-calendar-days fa-2xl"></i></div>
      Manage Events
    </a>
  </li>
  <li class="btn">
    <a href="socials.php">
    <div class="icon"><i class="fa-solid fa-icons fa-2xl"></i></div>
      Manage Socials
    </a>
  </li>
  <li class="btn">
    <a href="users.php">
    <div class="icon"><i class="fa-solid fa-users fa-2xl"></i></div>
      Manage Users
    </a>
  </li>
  <li id="logout_btn">
    <a href="logout.php">
    <div class="icon"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></div>
      Logout
    </a>
  </li>
</ul>

<?php

include( 'includes/footer.php' );

?>