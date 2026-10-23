<?php
$title = "Events";
include "db.php";
include "header.php";
?>
<section class="container page-head">
  <h1>Upcoming events</h1>
  <p>Pick one and register before seats run out.</p>
  <div class="filters">
    <button class="chip active" data-filter="all">All</button>
    <?php foreach (array_unique(array_column($events, 'tag')) as $t): ?>
      <button class="chip" data-filter="<?= $t ?>"><?= $t ?></button>
    <?php endforeach; ?>
  </div>
</section>

<section class="container grid events-grid">
  <?php foreach ($events as $i => $e): ?>
  <article class="card event reveal" data-tag="<?= $e['tag'] ?>" style="transition-delay: <?= $i * 0.1 ?>s">
    <span class="badge"><?= $e['tag'] ?></span>
    <h3><?= $e['name'] ?></h3>
    <p><?= $e['info'] ?></p>
    <p class="meta"><?= $e['date'] ?> &middot; <?= $e['venue'] ?></p>
    <a class="btn btn-small" href="register.php?event=<?= urlencode($e['name']) ?>">Register</a>
  </article>
  <?php endforeach; ?>
</section>

<section class="band">
  <div class="container">
    <h2 class="reveal">Season schedule</h2>
    <div class="table-wrap reveal">
      <table>
        <thead><tr><th>Date</th><th>Event</th><th>Type</th><th>Venue</th></tr></thead>
        <tbody>
          <?php foreach ($events as $e): ?>
          <tr><td><?= $e['date'] ?></td><td><?= $e['name'] ?></td><td><?= $e['tag'] ?></td><td><?= $e['venue'] ?></td></tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="container section reveal">
  <div class="cta">
    <h2>Found your event?</h2>
    <p>It takes less than a minute to register.</p>
    <a href="register.php" class="btn btn-light">Register now</a>
  </div>
</section>
<?php include "footer.php"; ?>
