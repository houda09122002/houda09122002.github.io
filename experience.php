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
  <meta name="description" content="Expériences professionnelles de Houda Khiati">
  <meta http-equiv="Content-Language" content="<?= $lang ?>">
  <title>Expériences | Houda Khiati</title>

  <link rel="alternate" hreflang="fr" href="?lang=fr" />
  <link rel="alternate" hreflang="en" href="?lang=en" />
  <link rel="alternate" hreflang="ar" href="?lang=ar" />

  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

  <!-- RDFa metadata -->
  <meta property="schema:name" content="Houda Khiati – Portfolio" />
  <meta property="schema:inLanguage" content="<?= $lang ?>" />
  <meta property="schema:description" content="Page expériences professionnelles de Houda Khiati" />
  <meta property="schema:author" content="Houda Khiati" />
  <meta property="schema:dateModified" content="<?= date('Y-m-d') ?>" />
  <link rel="meta" type="application/rdf+xml" title="Experiences RDF metadata" href="data/experiences.rdf" />
  <link rel="alternate" type="text/turtle" href="data/experiences.ttl" />
    <link rel="alternate" type="application/sparql-query" href="data/experiences.sparql" title="SPARQL query on experience" />

  <script defer src="assets/langController.js"></script>
</head>
<body>
  <!-- Sélecteur de langue -->
  <div class="lang-switcher">
    <a href="?lang=fr">🇫🇷</a>
    <a href="?lang=en">🇬🇧</a>
    <a href="?lang=ar">🇲🇦</a>
  </div>

  <!-- En-tête animé -->
  <header class="hero" data-aos="fade-down">
    <span class="icon">🏢</span>
    <h1 class="hero-title" data-id="experience_title"></h1>
    <p class="hero-tagline" data-id="experience_tagline"></p>
  </header>

  <!-- RDFa Person metadata masquée -->
  <div vocab="https://schema.org/" typeof="Person" style="display: none;">
    <span property="name">Houda Khiati</span>
    <span property="jobTitle">Développeuse full stack</span>
    <span property="knowsAbout">Développement Web</span>
    <span property="knowsLanguage">français</span>
    <span property="knowsLanguage">anglais</span>
    <span property="knowsLanguage">arabe</span>
  </div>


  <main class="cards-container">
    <div class="card" data-aos="zoom-in-up" data-aos-delay="0">
      <span class="icon">💼</span>
      <h3>Equativ – Alternance</h3>
      <p data-id="experience_equativ"></p>
      <img class="project" src="assets/images/equativ-logo.webp" alt="Equativ logo">
      <img class="project" src="assets/images/equativ-team.webp" alt="Equativ team">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="100">
      <span class="icon">🏗️</span>
      <h3>Lafarge Holcim – Stage</h3>
      <p data-id="experience_lafarge"></p>
      <img class="project" src="assets/images/lafarge.png" alt="Lafarge">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="200">
      <span class="icon">🛒</span>
      <h3>Marjane Holding – Stage</h3>
      <p data-id="experience_marjane"></p>
      <img class="project" src="assets/images/marjane.png" alt="Marjane">
    </div>
  </main>

  <!-- Bouton retour -->
  <div class="back-button-container" data-aos="fade-up">
    <a href="index.php" class="back-button" data-id="back_button"></a>
  </div>

  <footer>
    <p>&copy; 2025 Houda Khiati</p>
  </footer>

  <!-- AOS Script -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>
</html>
