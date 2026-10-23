<?php
$title = "Home";
include "db.php";
include "header.php";
$next = $events[0];
?>
<div class="hero-bg">
  <div class="blob b1"></div>
  <div class="blob b2"></div>
  <section class="hero container">
    <div class="hero-text">
      <span class="pill">Registrations open for 2026</span>
      <h1>Your seat at every college event, booked in a minute.</h1>
      <p>Browse upcoming hackathons, workshops, cultural nights and sports days. Fill one short form and you're in.</p>
      <div class="btn-row">
        <a href="register.php" class="btn pulse">Register for an event</a>
        <a href="events.php" class="btn btn-ghost">See all events</a>
      </div>
    </div>
    <aside class="ticket" aria-label="Next event">
      <p class="ticket-tag"><?= $next['tag'] ?></p>
      <h2><?= $next['name'] ?></h2>
      <p><?= $next['date'] ?><br><?= $next['venue'] ?></p>
      <div class="perforation"></div>
      <a href="register.php?event=<?= urlencode($next['name']) ?>" class="ticket-link">Get this ticket</a>
    </aside>
  </section>
</div>

<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <?php for ($i = 0; $i < 2; $i++) foreach ($events as $e): ?>
      <span><?= $e['name'] ?> &nbsp;&#9670;&nbsp; <?= $e['date'] ?> &nbsp;&#9670;&nbsp;</span>
    <?php endforeach; ?>
  </div>
</div>

<section class="container stats reveal">
  <div><strong data-count="4">0</strong><span>Events this season</span></div>
  <div><strong data-count="500">0</strong><span>Seats available</span></div>
  <div><strong data-count="5">0</strong><span>Departments</span></div>
  <div><strong data-count="100">0</strong><span>% free to join</span></div>
</section>

<section class="container section">
  <div class="section-head reveal">
    <h2>Featured events</h2><a href="events.php">View all events</a>
  </div>
  <div class="grid">
    <?php foreach (array_slice($events, 0, 3) as $i => $e): ?>
      <article class="card event reveal" style="transition-delay: <?= $i * 0.12 ?>s">
        <span class="badge"><?= $e['tag'] ?></span>
        <h3><?= $e['name'] ?></h3>
        <p><?= $e['info'] ?></p>
        <p class="meta"><?= $e['date'] ?> &middot; <?= $e['venue'] ?></p>
        <a class="btn btn-small" href="register.php?event=<?= urlencode($e['name']) ?>">Register</a>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="band">
  <div class="container">
    <h2 class="reveal">How it works</h2>
    <div class="timeline">
      <div class="step reveal"><b>1</b>
        <div>
          <h3>Pick an event</h3>
          <p>Check dates and venues on the Events page.</p>
        </div>
      </div>
      <div class="step reveal"><b>2</b>
        <div>
          <h3>Fill the form</h3>
          <p>Enter your name, email, phone and department.</p>
        </div>
      </div>
      <div class="step reveal"><b>3</b>
        <div>
          <h3>Get confirmed</h3>
          <p>Your registration is saved and appears in the registered list.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container section">
  <h2 class="reveal">Why students like CampusPass</h2>
  <div class="grid">
    <article class="card feature reveal"><span class="icon">&#9889;</span>
      <h3>Quick</h3>
      <p>One short form, under a minute.</p>
    </article>
    <article class="card feature reveal" style="transition-delay:.1s"><span class="icon">&#9989;</span>
      <h3>Checked</h3>
      <p>Your details are validated before they are saved.</p>
    </article>
    <article class="card feature reveal" style="transition-delay:.2s"><span class="icon">&#128241;</span>
      <h3>Mobile friendly</h3>
      <p>Works on phones, tablets and laptops.</p>
    </article>
    <article class="card feature reveal" style="transition-delay:.3s"><span class="icon">&#128203;</span>
      <h3>Transparent</h3>
      <p>See everyone who registered in one list.</p>
    </article>
  </div>
</section>

<section class="container section faq">
  <h2 class="reveal">Common questions</h2>
  <details class="reveal">
    <summary>Is registration free?</summary>
    <p>Yes. Every event listed here is free for students.</p>
  </details>
  <details class="reveal">
    <summary>Can I join more than one event?</summary>
    <p>Yes. Submit the form once for each event you want to attend.</p>
  </details>
  <details class="reveal">
    <summary>How do I know I'm registered?</summary>
    <p>You'll see a confirmation message, and your name appears in the Registered List.</p>
  </details>
</section>

<section class="container reveal">
  <div class="cta">
    <h2>Don't miss the next one.</h2>
    <p>Seats fill fast. Save yours today.</p>
    <a href="register.php" class="btn btn-light">Register now</a>
  </div>
</section>
<?php include "footer.php"; ?>