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

function randomImage($folder) {
  $path = "assets/images/$folder/";
  $images = glob($path . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
  if (!$images) return "";
  $random = $images[array_rand($images)];
  return $random;
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" prefix="schema: https://schema.org/" typeof="schema:WebPage">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Compétences – Houda Khiati">
  <meta http-equiv="Content-Language" content="<?= $lang ?>">
  <title>Compétences | Houda Khiati</title>

  <!-- SEO hreflang -->
  <link rel="alternate" hreflang="fr" href="?lang=fr"/>
  <link rel="alternate" hreflang="en" href="?lang=en"/>
  <link rel="alternate" hreflang="ar" href="?lang=ar"/>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

  <!-- RDFa metadata -->
  <meta property="schema:name" content="Houda Khiati – Portfolio" />
  <meta property="schema:inLanguage" content="<?= $lang ?>" />
  <meta property="schema:description" content="Page compétences de Houda Khiati" />
  <meta property="schema:author" content="Houda Khiati" />
  <meta property="schema:dateModified" content="<?= date('Y-m-d') ?>" />
  <link rel="meta" type="application/rdf+xml" title="Skills RDF metadata" href="data/skills.rdf" />
  <link rel="alternate" type="text/turtle" href="data/skills.ttl" />
<link rel="alternate" type="application/sparql-query" href="data/skills.sparql" title="SPARQL query on skills" />

  <script defer src="assets/langController.js"></script>
</head>
<body>
  <!-- Sélecteur de langue -->
  <div class="lang-switcher">
    <a href="?lang=fr">🇫🇷</a>
    <a href="?lang=en">🇬🇧</a>
    <a href="?lang=ar">🇲🇦</a>
  </div>


  <header class="hero" data-aos="fade-down">
    <span class="icon">💻</span>
    <h1 class="hero-title" data-id="skills_title"></h1>
    <p class="hero-tagline" data-id="skills_tagline"></p>
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
      <span class="icon">💻</span>
      <h3 data-id="skills_front_title"></h3>
      <p data-id="skills_front_text"></p>
      <img src="<?= randomImage('frontend') ?>" class="project" alt="Frontend">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="100">
      <span class="icon">⚙️</span>
      <h3 data-id="skills_back_title"></h3>
      <p data-id="skills_back_text"></p>
      <img src="<?= randomImage('backend') ?>" class="project" alt="Backend">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="200">
      <span class="icon">🧠</span>
      <h3 data-id="skills_data_title"></h3>
      <p data-id="skills_data_text"></p>
      <img src="<?= randomImage('data') ?>" class="project" alt="Data / BI">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="300">
      <span class="icon">💾</span>
      <h3 data-id="skills_langs_title"></h3>
      <p data-id="skills_langs_text"></p>
      <img src="<?= randomImage('langs') ?>" class="project" alt="Programming Languages">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="400">
      <span class="icon">🗄️</span>
      <h3 data-id="skills_db_title"></h3>
      <p data-id="skills_db_text"></p>
      <img src="<?= randomImage('databases') ?>" class="project" alt="Databases">
    </div>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="500">
      <span class="icon">🛠️</span>
      <h3 data-id="skills_tools_title"></h3>
      <p data-id="skills_tools_text"></p>
      <img src="<?= randomImage('tools') ?>" class="project" alt="Tools">
    </div>
  </main>


  <div class="back-button-container" data-aos="fade-up">
    <a href="index.php" class="back-button" data-id="back_button"></a>
  </div>

  <footer>
    <p>&copy; 2025 Houda Khiati</p>
  </footer>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>
</html>
