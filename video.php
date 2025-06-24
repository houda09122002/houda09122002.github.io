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
  <meta name="description" content="Vidéo de présentation multilingue de Houda Khiati">
  <meta http-equiv="Content-Language" content="<?= $lang ?>">
  <title>Vidéo | Houda Khiati</title>
  <link rel="alternate" hreflang="fr" href="?lang=fr" />
  <link rel="alternate" hreflang="en" href="?lang=en" />
  <link rel="alternate" hreflang="ar" href="?lang=ar" />
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  <link rel="meta" type="application/rdf+xml" title="Video RDF metadata" href="data/video.rdf" />
    <link rel="alternate" type="text/turtle" href="data/video.ttl" />
    <link rel="alternate" type="application/sparql-query" href="data/video.sparql" title="SPARQL query on video" />

  <meta property="schema:name" content="Vidéo de présentation">
  <meta property="schema:inLanguage" content="<?= $lang ?>">
  <meta property="schema:description" content="Présentation multilingue de Houda Khiati">
  <meta property="schema:author" content="Houda Khiati">
  <meta property="schema:dateModified" content="<?= date('Y-m-d') ?>">
  <meta property="schema:contentUrl" content="https://www.youtube.com/watch?v=yYJ0z5aeprU" />
  <meta property="schema:embedUrl" content="https://www.youtube.com/embed/yYJ0z5aeprU" />
  <script defer src="assets/langController.js"></script>
</head>
<body>
  <div class="lang-switcher" data-aos="fade-down">
    <a href="?lang=fr">🇫🇷</a>
    <a href="?lang=en">🇬🇧</a>
    <a href="?lang=ar">🇲🇦</a>
  </div>

  <header class="hero" data-aos="fade-up">
    <span class="icon">🎥</span>
    <h1 class="hero-title" data-id="video_title"></h1>
    <p class="hero-tagline" data-id="video_desc"></p>
  </header>

  <main class="cards-container">
    <section vocab="https://schema.org/" typeof="VideoObject" class="card" data-aos="zoom-in-up">
      
      <meta property="uploadDate" content="2025-06-21" />
      <meta property="inLanguage" content="<?= $lang ?>" />
      <meta property="author" content="Houda Khiati" />
      <meta property="contentUrl" content="https://www.youtube.com/watch?v=yYJ0z5aeprU" />
      <meta property="embedUrl" content="https://www.youtube.com/embed/yYJ0z5aeprU" />

      <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
        <iframe
          src="https://www.youtube.com/embed/yYJ0z5aeprU?cc_lang_pref=<?= $lang ?>&cc_load_policy=1"
          title="Présentation Houda Khiati"
          frameborder="0"
          allowfullscreen
          style="position:absolute;top:0;left:0;width:100%;height:100%;">
        </iframe>
      </div>
    </section>
  </main>

  <footer data-aos="fade-up" data-aos-delay="200">
    <a href="index.php?lang=<?= $lang ?>" class="back-button" data-id="back_button"></a>
    <p>&copy; 2025 Houda Khiati</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>
</body>
</html>
