document.getElementById("menuBtn").onclick = function () {
  document.getElementById("navLinks").classList.toggle("open");
};

var form = document.getElementById("regForm");

if (form) {
  form.onsubmit = function (e) {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var ok = true;

    var nameRule = /^[A-Za-z ]{3,}$/;
    var emailRule = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRule = /^[0-9]{10}$/;

    document.getElementById("nameErr").innerHTML = "";
    document.getElementById("emailErr").innerHTML = "";
    document.getElementById("phoneErr").innerHTML = "";

    if (!nameRule.test(name)) {
      document.getElementById("nameErr").innerHTML =
        "Enter your name using letters only (min 3).";
      ok = false;
    }
    if (!emailRule.test(email)) {
      document.getElementById("emailErr").innerHTML =
        "Enter a valid email address.";
      ok = false;
    }
    if (!phoneRule.test(phone)) {
      document.getElementById("phoneErr").innerHTML =
        "Phone must be exactly 10 digits.";
      ok = false;
    }

    if (!ok) e.preventDefault();
  };
}

var items = document.querySelectorAll(".reveal");
var seen = new IntersectionObserver(
  function (entries) {
    entries.forEach(function (en) {
      if (en.isIntersecting) {
        en.target.classList.add("show");
        seen.unobserve(en.target);
      }
    });
  },
  { threshold: 0.15 },
);
items.forEach(function (el) {
  seen.observe(el);
});

document.querySelectorAll("[data-count]").forEach(function (el) {
  var target = Number(el.getAttribute("data-count")),
    n = 0;
  var step = Math.max(1, Math.ceil(target / 40));
  var timer = setInterval(function () {
    n += step;
    if (n >= target) {
      n = target;
      clearInterval(timer);
    }
    el.innerHTML = n;
  }, 30);
});

document.querySelectorAll(".chip").forEach(function (chip) {
  chip.onclick = function () {
    document.querySelectorAll(".chip").forEach(function (c) {
      c.classList.remove("active");
    });
    chip.classList.add("active");
    var f = chip.getAttribute("data-filter");
    document.querySelectorAll(".events-grid .card").forEach(function (card) {
      card.classList.toggle(
        "hide",
        f != "all" && card.getAttribute("data-tag") != f,
      );
    });
  };
});
