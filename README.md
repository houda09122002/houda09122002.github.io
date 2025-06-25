## Présentation détaillée de mon portfolio

Sur la **page d’accueil**, vous êtes accueilli par un **emoji animé 🦄** représentant ma mascotte, qui vous salue de manière chaleureuse. Cette mascotte est dynamique : elle vous affiche régulièrement des **conseils contextuels** dans une bulle, grâce à une rotation de messages gérés en JavaScript avec un `setInterval` et une animation d’opacité (`fade-in / fade-out`).

### 🌗 Mode sombre intégré

J’ai intégré un **mode sombre** activable via un **bouton animé SVG**, stylisé comme un soleil/lune qui tourne à chaque clic. Ce bouton est généré dynamiquement via JavaScript (`document.createElement`), et son état est **enregistré dans le `localStorage`**. Ainsi, le thème choisi (clair ou sombre) est **persistant entre toutes les pages** du portfolio : dès qu’une autre page est chargée, elle lit la valeur de `localStorage` et applique le bon thème via `data-theme` sur `<html>`.

### 🌍 Multilingue (3 langues)

En haut à droite, trois **drapeaux (🇫🇷 🇬🇧 🇲🇦)** permettent de changer la langue du site. La langue est détectée :

* soit automatiquement depuis `navigator.language`,
* soit via les paramètres d’URL `?lang=fr`,
* soit sauvegardée via `sessionStorage`.

Les textes sont dynamiquement remplacés grâce à un fichier `content.json` dans le dossier `data/`, et les éléments du DOM sont annotés avec `data-id` pour assurer un mapping clair avec chaque traduction. 

### 🧩 Les 8 sections de navigation

Sur la page d’accueil, **8 cartes interactives** vous permettent d’explorer les différentes sections de mon portfolio. Chaque carte est stylisée avec une icône (👩‍💼, 💻, 🧠, etc.) et animée via la librairie `AOS.js`.

---

### 📌 Description des sections

#### Section 1 – À propos

Un petit texte vous décrit **qui je suis** (parcours, rôle, style de travail). Les contenus sont traduits dans les 3 langues.

#### Section 2 – Compétences

Vous trouverez ici mes compétences **Front-end**, **Back-end**, **langages**, **outils**, **bases de données**, etc.
Le point original ici, c’est que les **images changent à chaque chargement** grâce à une fonction `randomImage(folder)` en JS. Cela donne une impression différente à chaque visite.

#### Section 3 – Expériences

Je présente ici mes **expériences en entreprise**, notamment mon alternance et stages avec les missions réalisées, les technologies utilisées, etc.

#### Section 4 – Projets

Cette section regroupe mes **projets académiques, professionnels et personnels**, réalisés entre 2022 et 2024. 

#### Section 5 – Formations et certifications

Un aperçu de mon **parcours académique**, de mes diplômes obtenus et des **certifications** obtenues en parallèle.

#### Section 6 – Centres d’intérêts

Des images et descriptions de mes **passions personnelles**, dans une section traduite dynamiquement également.

#### Section 7 – Contact

Un formulaire de contact ou des liens pour **me joindre** si vous souhaitez **me recruter**. La page est claire, multilingue et responsive.

#### Section 8 – Vidéo de présentation

Une **vidéo YouTube intégrée**, hébergée sur ma chaîne personnelle. Ce qui est intéressant techniquement ici, c’est que les **sous-titres s’adaptent automatiquement à la langue de la page**, en utilisant l’attribut `lang` et le contrôle dynamique de l’`iframe`.

---

### ↙️ Bouton de retour

En bas de chaque page, un **bouton de retour** permet de revenir à la page d’accueil. Il est stylisé de manière cohérente avec le thème actif (clair ou sombre), et conserve la langue sélectionnée.
