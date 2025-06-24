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
  <meta name="description" content="À propos de Houda Khiati">
  <meta property="schema:inLanguage" content="<?= $lang ?>">
  <meta property="schema:name" content="À propos | Houda Khiati">
  <meta property="schema:description" content="Page de présentation de Houda Khiati">
  <meta property="schema:author" content="Houda Khiati">
  <meta property="schema:dateModified" content="<?= date('Y-m-d') ?>">
  <title>À propos | Houda Khiati</title>

  <!-- Multilingue -->
  <link rel="alternate" hreflang="fr" href="?lang=fr" />
  <link rel="alternate" hreflang="en" href="?lang=en" />
  <link rel="alternate" hreflang="ar" href="?lang=ar" />

  <!-- RDF files -->
  <link rel="meta" type="application/rdf+xml" title="About RDF metadata" href="data/about.rdf" />
  <link rel="alternate" type="text/turtle" href="data/about.ttl" />
    <link rel="alternate" type="application/sparql-query" href="data/about.sparql" title="SPARQL query on about" />

  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script defer src="assets/langController.js"></script>
</head>
<body>
  <!-- Sélecteur de langue -->
  <div class="lang-switcher">
    <a href="?lang=fr">🇫🇷</a>
    <a href="?lang=en">🇬🇧</a>
    <a href="?lang=ar">🇲🇦</a>
  </div>

  <!-- En‑tête -->
  <header class="hero" data-aos="fade-down">
    <span class="icon">👩‍💼</span>
    <h1 class="hero-title" data-id="about_title">Houda Khiati</h1>
    <p class="hero-tagline" data-id="about_description"></p>
  </header>

  <!-- Métadonnées Person RDFa masquées -->
  <div vocab="https://schema.org/" typeof="Person" style="display:none;">
    <span property="name">Houda Khiati</span>
    <span property="jobTitle">Développeuse full stack</span>
    <span property="description">Étudiante ingénieure passionnée par le développement web et les technos innovantes.</span>
    <span property="knowsLanguage">français</span>
    <span property="knowsLanguage">anglais</span>
    <span property="knowsLanguage">arabe</span>
    <div property="alumniOf" typeof="EducationalOrganization">
      <span property="name">Institut Galilée – Université Sorbonne Paris Nord</span>
    </div>
  </div>

  <!-- Contenu principal -->
  <main class="cards-container">
    <div class="card" data-aos="zoom-in-up">
      <span class="icon">👩‍💻</span>
      <h3 data-id="about_dev_title"></h3>
      <p data-id="about_dev_text"></p>
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="100">
      <span class="icon">🏫</span>
      <h3 data-id="about_study_title"></h3>
      <p data-id="about_study_text"></p>
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="200">
      <span class="icon">🌍</span>
      <h3 data-id="about_lang_title"></h3>
      <p data-id="about_lang_text"></p>
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="300">
      <span class="icon">🎯</span>
      <h3 data-id="about_goals_title"></h3>
      <p data-id="about_goals_text"></p>
    </div>
  </main>

  <!-- Bouton retour -->
  <div class="back-button-container" data-aos="fade-up">
    <a href="index.php" class="back-button" data-id="back_button"></a>
  </div>

  <footer data-aos="fade-up" data-aos-delay="200">
    <p>&copy; 2025 Houda Khiati</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>
</html>
