<?php
$conn = new mysqli("localhost", "root", "", "college_events");
if ($conn->connect_error) {
    die("Database connection failed. Did you import setup.sql?");
}

$events = [
    [
        "name" => "CodeSprint Hackathon",
        "date" => "12 Oct 2026",
        "venue" => "IT Lab",
        "tag" => "Tech",
        "info" => "A 6-hour team coding challenge. Build something useful, win prizes."
    ],
    [
        "name" => "Rhythm Night",
        "date" => "18 Oct 2026",
        "venue" => "Seminar Hall",
        "tag" => "Cultural",
        "info" => "Singing, dancing and live band performances by students."
    ],
    [
        "name" => "Web Design Workshop",
        "date" => "25 Oct 2026",
        "venue" => "Seminar Hall",
        "tag" => "Workshop",
        "info" => "Hands-on session on HTML, CSS and building a responsive page."
    ],
    [
        "name" => "Inter-Department Cricket",
        "date" => "02 Nov 2026",
        "venue" => "ADIT Campus",
        "tag" => "Sports",
        "info" => "T10 knockout tournament between all departments."
    ],
];
