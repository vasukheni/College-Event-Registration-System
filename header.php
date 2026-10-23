<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Register for college events online.">
  <title><?= $title ?? "CampusPass" ?> | CampusPass</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="site-header">
    <nav class="nav container">
      <a href="index.php" class="logo">Campus<span>Pass</span></a>
      <button id="menuBtn" class="menu-btn" aria-label="Toggle menu">&#9776;</button>
      <ul id="navLinks" class="nav-links">
        <li><a href="index.php" class="<?= $page == 'index.php' ? 'active' : '' ?>">Home</a></li>
        <li><a href="events.php" class="<?= $page == 'events.php' ? 'active' : '' ?>">Events</a></li>
        <li><a href="register.php" class="<?= $page == 'register.php' ? 'active' : '' ?>">Register</a></li>
        <li><a href="registrations.php" class="<?= $page == 'registrations.php' ? 'active' : '' ?>">Registered List</a></li>
      </ul>
    </nav>
  </header>
  <main>