<?php
session_start();
$lang = 'fr';
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];
  $lang = $_GET['lang'];
} elseif (isset($_SESSION['lang'])) {
  $lang = $_SESSION['lang'];
} else {
  $nav = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $lang = in_array($nav, ['fr', 'en', 'ar']) ? $nav : 'fr';
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" prefix="schema: https://schema.org/" typeof="schema:WebPage">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Portfolio multilingue de Houda Khiati – Développeuse full stack">
  <meta http-equiv="Content-Language" content="<?= $lang ?>">

  <title>Houda Khiati – Portfolio</title>

  <link rel="alternate" hreflang="fr" href="?lang=fr" />
  <link rel="alternate" hreflang="en" href="?lang=en" />
  <link rel="alternate" hreflang="ar" href="?lang=ar" />
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

  <!-- RDFa metadata -->
  <meta property="schema:name" content="Houda Khiati – Portfolio">
  <meta property="schema:inLanguage" content="<?= $lang ?>">
  <meta property="schema:description" content="Portfolio multilingue de Houda Khiati – Développeuse full stack">
  <meta property="schema:author" content="Houda Khiati">
  <meta property="schema:dateModified" content="<?= date('Y-m-d') ?>">

<link rel="meta" type="application/rdf+xml" title="RDF metadata" href="data/index.rdf" />
<link rel="alternate" type="text/turtle" href="data/index.ttl" />

    <link rel="alternate" type="application/sparql-query" href="data/index.sparql" title="SPARQL query on index" />

  <script defer src="assets/langController.js"></script>
</head>
<script>
  document.addEventListener("DOMContentLoaded", async () => {
    const lang  = "<?= $lang ?>";            // langue actuelle côté PHP
    const txtEl = document.getElementById("currently-text");

    const res  = await fetch("data/content.json");
    const data = await res.json();

    const messages = (data.currently_messages[lang] || data.currently_messages["fr"]).slice();
    let idx = 0;

    const showMsg = () => {
      txtEl.style.opacity = 0;
      setTimeout(() => {
        txtEl.textContent = messages[idx];
        txtEl.style.opacity = 1;
      }, 300);              

      idx = (idx + 1) % messages.length;
    };

    showMsg();
    setInterval(showMsg, 3000);
  });

  document.addEventListener("DOMContentLoaded", async () => {
    const lang = "<?= $lang ?>";
    const tipsData = {
      fr: [
        "🌟 Clique sur une carte pour en savoir plus !",
        "🎀 Change la langue avec les petits drapeaux.",
        "🚀 Regarde mes projets de 2024 !"
      ],
      en: [
        "🌟 Click on a card to explore!",
        "🎀 Switch language from top right.",
        "🚀 Check out my 2024 projects!"
      ],
      ar: [
        "🌟 انقر على بطاقة لاستكشاف المزيد!",
        "🎀 غيري اللغة من الأعلى.",
        "🚀 اكتشفي مشاريعي لعام 2024!"
      ]
    };

    const tips = tipsData[lang] || tipsData["fr"];
    const tipElement = document.getElementById("mascotte-tip");
    let tipIndex = 0;

    const showTip = () => {
      tipElement.style.opacity = 0;
      setTimeout(() => {
        tipElement.textContent = tips[tipIndex];
        tipElement.style.opacity = 1;
        tipIndex = (tipIndex + 1) % tips.length;
      }, 300);
    };

    setInterval(showTip, 4000); 
  });
</script>
<div class="mascotte-container">
  <div class="mascotte-character">🦄</div>
  <div class="mascotte-bubble" id="mascotte-tip">🌟 Bienvenue sur mon portfolio !</div>
</div>

<body>
  <!-- sélecteur de langue -->
  <div class="lang-switcher" data-aos="fade-down">
    <a href="?lang=fr">🇫🇷</a>
    <a href="?lang=en">🇬🇧</a>
    <a href="?lang=ar">🇲🇦</a>
  </div>

  <header class="hero" data-aos="fade-up">
    <img src="assets/images/bitmoji.png" alt="Houda Khiati" class="avatar" data-aos="zoom-in">
    <h1 class="hero-title" data-id="home_welcome" data-aos="fade-up" data-aos-delay="100"></h1>
    <p class="hero-tagline" data-id="about_description" data-aos="fade-up" data-aos-delay="200"></p>
  </header>

  <!-- RDFa Person metadata -->
<div vocab="https://schema.org/" typeof="Person" style="display: none;">
  <span property="name">Houda Khiati</span>
  <span property="jobTitle">Développeuse full stack</span>
  <span property="knowsAbout">Développement Web</span>
  <span property="knowsLanguage">français</span>
  <span property="knowsLanguage">anglais</span>
  <span property="knowsLanguage">arabe</span>
</div>



  <main class="cards-container">
    <a class="card" href="about.php?lang=<?= $lang ?>" data-aos="zoom-in-up">
      <span class="icon">👩‍💼</span>
      <span data-id="about_title"></span>
    </a>

    <a class="card" href="skills.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="50">
      <span class="icon">💻</span>
      <span data-id="skills_title"></span>
    </a>

    <a class="card" href="experience.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="100">
      <span class="icon">🏢</span>
      <span data-id="experience_title"></span>
    </a>

    <a class="card" href="projects.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="150">
      <span class="icon">🧠</span>
      <span data-id="projects_title"></span>
    </a>

    <a class="card" href="education.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="200">
      <span class="icon">🎓</span>
      <span data-id="education_title"></span>
    </a>

    <a class="card" href="interests.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="250">
      <span class="icon">🎀</span>
      <span data-id="interests_title"></span>
    </a>

    <a class="card" href="contact.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="300">
      <span class="icon">📫</span>
      <span data-id="contact_title"></span>
    </a>
        <a class="card" href="video.php?lang=<?= $lang ?>" data-aos="zoom-in-up" data-aos-delay="350">
      <span class="icon">🎬</span>
      <span data-id="video_title"></span>
    </a>
  </main>

  <footer data-aos="fade-up" data-aos-delay="400">
    <!-- ===== Section En ce moment je... ===== -->
    <section class="currently-section" data-aos="fade-up" data-aos-delay="300">
      <h2 class="currently-title" data-id="currently_title"></h2>
      <p id="currently-text"></p>
    </section>
    &copy; 2025 Houda Khiati
  </footer>

  <!-- Scripts AOS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>
</html>
