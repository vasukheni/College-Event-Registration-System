<?php
$title = "Register";
include "db.php";

$message = "";
$success = false;
$selected = $_GET['event'] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name  = trim($_POST['name']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $dept  = trim($_POST['department']);
  $event = $_POST['event'];
  $selected = $event;

  if ($name == "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[0-9]{10}$/", $phone)) {
    $message = "Please fill all fields correctly.";
  } else {
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, department, event) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $dept, $event);
    if ($stmt->execute()) {
      $success = true;
      $message = "Thanks $name! You are registered for $event.";
    } else {
      $message = "Something went wrong. Please try again.";
    }
  }
}
include "header.php";
?>
<section class="container page-head">
  <h1>Register for an event</h1>
  <p>All fields are required.</p>
</section>

<section class="container reg-layout">
  <aside class="reg-side reveal">
    <h2>What you get</h2>
    <ul>
      <li>A confirmed seat at your event</li>
      <li>Your name on the official list</li>
      <li>Zero fees, zero paperwork</li>
    </ul>
    <p>Tip: use your college email so organisers can reach you.</p>
  </aside>
  <div class="form-wrap">
    <?php if ($message): ?>
      <div class="alert <?= $success ? 'ok' : 'bad' ?>"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form id="regForm" method="post" action="register.php" novalidate>
      <label for="name">Full name</label>
      <input type="text" id="name" name="name" placeholder="e.g. Vasu Kheni">
      <small class="error" id="nameErr"></small>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="vasu@adit.edu">
      <small class="error" id="emailErr"></small>

      <label for="phone">Phone (10 digits)</label>
      <input type="text" id="phone" name="phone" maxlength="10" placeholder="9173022923">
      <small class="error" id="phoneErr"></small>

      <label for="department">Department</label>
      <select id="department" name="department">
        <option>Computer Engineering</option>
        <option>Artificial Intelligence</option>
        <option>Information Technology</option>
        <option>Mechanical Engineering</option>
        <option>Electrical Engineering</option>
        <option>Civil Engineering</option>
        <option>Other</option>
      </select>

      <label for="event">Event</label>
      <select id="event" name="event">
        <?php foreach ($events as $e): ?>
          <option <?= $e['name'] == $selected ? 'selected' : '' ?>><?= $e['name'] ?></option>
        <?php endforeach; ?>
      </select>

      <button type="submit" class="btn">Confirm registration</button>
    </form>
  </div>
</section>
<?php include "footer.php"; ?>