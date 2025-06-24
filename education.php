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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Formations de Houda Khiati"/>
  <meta http-equiv="Content-Language" content="<?= $lang ?>">
  <title>Formations | Houda Khiati</title>

  <!-- RDFa metadata -->
  <meta property="schema:name" content="Formations | Houda Khiati">
  <meta property="schema:description" content="Page des formations de Houda Khiati">
  <meta property="schema:inLanguage" content="<?= $lang ?>">
  <meta property="schema:author" content="Houda Khiati">
  <meta property="schema:dateModified" content="<?= date('Y-m-d') ?>">

  <!-- Liens SEO et RDF -->
  <link rel="alternate" hreflang="fr" href="?lang=fr"/>
  <link rel="alternate" hreflang="en" href="?lang=en"/>
  <link rel="alternate" hreflang="ar" href="?lang=ar"/>
  <link rel="alternate" type="text/turtle" href="data/education.ttl"/>
  <link rel="meta" type="application/rdf+xml" title="RDF metadata" href="data/education.rdf" />
    <link rel="alternate" type="application/sparql-query" href="data/education.sparql" title="SPARQL query on education" />
  <link rel="stylesheet" href="assets/style.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"/>
  <script defer src="assets/langController.js"></script>
</head>
<body vocab="https://schema.org/" typeof="WebPage">
  <!-- RDFa Person metadata masquée -->
  <div typeof="Person" style="display:none;">
    <span property="name">Houda Khiati</span>
    <span property="jobTitle">Développeuse full stack</span>
    <span property="knowsAbout">Développement Web</span>
    <span property="knowsLanguage">français</span>
    <span property="knowsLanguage">anglais</span>
    <span property="knowsLanguage">arabe</span>
  </div>

  <div class="lang-switcher">
    <a href="?lang=fr">🇫🇷</a>
    <a href="?lang=en">🇬🇧</a>
    <a href="?lang=ar">🇲🇦</a>
  </div>

  <header class="hero" data-aos="fade-down">
     <span class="icon">🎓</span>
    <h1 class="hero-title" data-id="education_title"></h1>
    <p class="hero-tagline" data-id="education_tagline"></p>
  </header>

  <main class="cards-container">
    <div class="timeline">
      <div class="timeline-item" data-aos="fade-up" data-aos-delay="0">
        <div class="timeline-content">
          <h3 data-id="education_engineering_title"></h3>
          <p data-id="education_engineering_desc"></p>
        </div>
      </div>

      <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
        <div class="timeline-content">
          <h3 data-id="education_bachelor_title"></h3>
          <p data-id="education_bachelor_desc"></p>
        </div>
      </div>

      <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
        <div class="timeline-content">
          <h3 data-id="education_bac_title"></h3>
          <p data-id="education_bac_desc"></p>
        </div>
      </div>
    </div>

    <div class="certifications" data-aos="zoom-in" data-aos-delay="300">
      <p data-id="education_certifications"></p>
    </div>
  </main>

  <div class="back-button-container" data-aos="fade-up">
    <a href="index.php" class="back-button" data-id="back_button"></a>
  </div>

  <footer>
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
