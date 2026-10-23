<?php
session_start();
$_SESSION['views'] = ($_SESSION['views'] ?? 0) + 1;

$title = "Registered List";
include "db.php";
include "header.php";
$result = $conn->query("SELECT * FROM registrations ORDER BY id DESC");
$total = $result->num_rows;
$evCount = $conn->query("SELECT COUNT(DISTINCT event) c FROM registrations")->fetch_assoc()['c'];
?>
<section class="container page-head">
  <h1>Registered students</h1>
  <!-- <p>You have viewed this page <strong><?= $_SESSION['views'] ?></strong> time(s) this session.</p> -->
</section>
<!-- 
<section class="container stats reveal">
  <div><strong data-count="<?= $total ?>">0</strong><span>Total registrations</span></div>
  <div><strong data-count="<?= $evCount ?>">0</strong><span>Events with sign-ups</span></div>
  <div><strong data-count="<?= $_SESSION['views'] ?>">0</strong><span>Your page views</span></div>
</section> -->

<section class="container table-wrap">
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Event</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows == 0): ?>
        <tr>
          <td colspan="6">No registrations yet. <a href="register.php">Be the first to register.</a></td>
        </tr>
        <?php else: while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['department']) ?></td>
            <td><?= htmlspecialchars($row['event']) ?></td>
          </tr>
      <?php endwhile;
      endif; ?>
    </tbody>
  </table>
</section>
<?php include "footer.php"; ?>