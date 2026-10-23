# CampusPass: College Event Registration System

A simple, clean web application where students can browse upcoming college events and register for them online. Built as the **Web Development (WD)** mini project using **HTML5, CSS3, JavaScript, PHP and MySQL**.

---

## Team Details

| Name | Enrollment Number |
|------|-------------------|
| Vasu Kheni | 12502120603010 |
| Pal Gardhariya | 12502120603005 |
| Dhruv Prajapati | 12502120603001 |

| | |
|---|---|
| **University** | CVM University, Faculty of Engineering & Technology |
| **Programme** | B.Tech (Computer Engineering) |
| **Department** | AIDS |
| **Subject** | Web Development (WD) |
| **Subject Code** | 202044505 |
| **Division** | 5AI |
| **Batch** | D12 |

---

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Screenshots](#screenshots)
- [Project Structure](#project-structure)
- [Database](#database)
- [How to Run](#how-to-run)
- [How It Works](#how-it-works)
- [Syllabus Topics Covered](#syllabus-topics-covered)
- [Future Improvements](#future-improvements)

---

## About the Project

Event sign-ups on paper sheets or chat groups are slow and easy to lose. **CampusPass** replaces them with one online form and one central list. A student picks an event, fills in a short form, and the registration is saved in a MySQL database.

The backend is kept light on purpose: it only exists to show how a website talks to a database.

---

## Features

- **4 pages:** Home, Events, Register and Registered List
- **Event cards** with date, venue and category, each with a quick *Register* button
- **Category filter** on the Events page (All, Tech, Cultural, Workshop, Sports)
- **Registration form** with validation in the browser (JavaScript) and again on the server (PHP)
- **Data saved to MySQL** using prepared statements
- **Registered List** page that shows every registration in a table
- **Session page-view counter** on the Registered List page
- **Responsive design** that works on phones, tablets and laptops
- **Light animations:** scroll fade-in, count-up numbers, scrolling event ticker, hover effects (turned off automatically for users who prefer reduced motion)

---

## Tech Stack

| Technology | Used For |
|------------|----------|
| HTML5 | Page structure, semantic tags and forms |
| CSS3 | Styling, variables, transitions, animations, media queries |
| JavaScript | Form validation (regular expressions), mobile menu, filters and animations |
| PHP | Form processing, shared header/footer, sessions, database connection |
| MySQL | Storing registrations |
| XAMPP / WAMP | Local Apache + MySQL server |

---

## Screenshots

| Home Page | Events Page |
|-----------|-------------|
| ![Home Page](screenshots/home.png) | ![Events Page](screenshots/events.png) |

| Register Page | Registered List Page |
|---------------|----------------------|
| ![Register Page](screenshots/register.png) | ![Registered List Page](screenshots/list.png) |

---

## Project Structure

```
college-events/
├── index.php            # Home page
├── events.php           # Events list with category filter
├── register.php         # Registration form (JS validation + PHP insert)
├── registrations.php    # Registered list + session page-view counter
├── db.php               # MySQL connection + list of events
├── header.php           # Shared header and navigation
├── footer.php           # Shared footer
├── style.css            # All styling
├── script.js            # Validation, menu, filter and animations
├── setup.sql            # Creates the database and table
├── screenshots/         # Images used in this README
└── README.md
```

---

## Database

- **Database name:** `college_events`
- **Table:** `registrations`

| Column | Type | Description |
|--------|------|-------------|
| `id` | INT (auto increment, primary key) | Unique registration number |
| `name` | VARCHAR(80) | Student's full name |
| `email` | VARCHAR(100) | Student's email |
| `phone` | VARCHAR(15) | 10-digit phone number |
| `department` | VARCHAR(50) | Student's department |
| `event` | VARCHAR(80) | Event the student registered for |
| `registered_on` | TIMESTAMP | Date and time of registration (set automatically) |

The list of events itself is stored in a PHP array in `db.php`, so only registrations go into the database.

---

## How to Run

### Requirements

- [XAMPP](https://www.apachefriends.org/) or WAMP (Apache, PHP and MySQL)
- A web browser

### Steps

1. **Get the project**

   ```bash
   git clone https://github.com/<your-username>/college-event-registration.git
   ```

   Or download the repository as a ZIP and unzip it.

2. **Copy the project folder** into your server folder:
   - XAMPP: `C:\xampp\htdocs\`
   - WAMP: `C:\wamp64\www\`

3. **Start Apache and MySQL** from the XAMPP (or WAMP) control panel.

4. **Create the database:**
   - Open `http://localhost/phpmyadmin`
   - Click **Import**, choose the `setup.sql` file from the project, then click **Go**

5. **Open the website:**

   ```
   http://localhost/college-events/index.php
   ```

   (Use your own folder name in the URL if you renamed the project folder.)

### Database connection settings

`db.php` uses the default XAMPP settings. If your MySQL username or password is different, change this line:

```php
$conn = new mysqli("localhost", "root", "", "college_events");
```

> **Note:** The site loads the *Plus Jakarta Sans* font from Google Fonts. Without internet it falls back to Arial, and everything else still works.

---

## How It Works

1. The student opens the **Events** page and clicks *Register* on an event. The event is pre-selected in the form.
2. On the **Register** page, JavaScript checks the form before it is sent:
   - Name: letters only, at least 3 characters
   - Email: valid email format
   - Phone: exactly 10 digits
3. PHP checks the same fields again on the server, then saves the data with a **prepared statement**, which protects against SQL injection:

   ```php
   $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, department, event) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $name, $email, $phone, $dept, $event);
   $stmt->execute();
   ```

4. The **Registered List** page reads all rows from MySQL and shows them in a table. Output is passed through `htmlspecialchars()` to keep the page safe.
5. The same page counts how many times it has been viewed in the current session using `$_SESSION`.

---

## Syllabus Topics Covered

| Syllabus Topic | Where It Is Used |
|----------------|------------------|
| HTML5 semantic tags, forms, tables | All pages, `register.php`, `registrations.php` |
| CSS3 variables, transitions, animations, rounded corners, responsive design and media queries | `style.css` |
| JavaScript: DOM, events, regular expressions and validation | `script.js` |
| PHP: form processing, includes, strings and regular expressions | `register.php`, `header.php`, `footer.php` |
| PHP sessions and state management | `registrations.php` |
| PHP and database connectivity, prepared statements, query execution and result retrieval | `db.php`, `register.php`, `registrations.php` |

---

## Future Improvements

- Admin login to manage events and registrations
- Edit and delete registered entries (full CRUD)
- Stop duplicate registrations for the same event
- Move the events list from the PHP array into a database table

---

## License

This project was made for academic purposes as part of the Web Development course at CVM University.
