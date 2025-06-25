document.addEventListener("DOMContentLoaded", async () => {
  const lang = getLang();
  const content = await loadContent(lang);
  applyContent(content);
});

function getLang() {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("lang")) {
    sessionStorage.setItem("lang", urlParams.get("lang"));
    return urlParams.get("lang");
  }
  const sessionLang = sessionStorage.getItem("lang");
  if (sessionLang) return sessionLang;

  const browserLang = navigator.language.slice(0, 2);
  return ["fr", "en", "ar"].includes(browserLang) ? browserLang : "fr";
}

async function loadContent(lang) {
  try {
    const response = await fetch("data/content.json");
    const json = await response.json();
    const content = {};
    for (const key in json) {
      content[key] = json[key][lang] || json[key]["fr"];
    }
    return content;
  } catch (error) {
    console.error("Erreur de chargement du contenu multilingue :", error);
    return {};
  }
}

function applyContent(content) {
  document.querySelectorAll("[data-id]").forEach(el => {
    const id = el.getAttribute("data-id");
    if (content[id]) {
      el.innerHTML = content[id]; 
      if (el.tagName === "HTML") el.lang = content[id];
    }
  });
}
document.addEventListener("DOMContentLoaded", () => {
  const toggleBtn = document.createElement("button");
  toggleBtn.className = "theme-toggle";
  toggleBtn.setAttribute("aria-label", "Changer le thème");
  toggleBtn.innerHTML = `
    <svg id="theme-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="5"></circle>
      <path d="M12 1v2m0 18v2m9-9h2M1 12H3
               m16.95-7.05l-1.414 1.414
               M4.464 19.536l-1.414-1.414
               m0-12.728l1.414 1.414
               M19.536 19.536l-1.414-1.414"/>
    </svg>
  `;

  document.body.appendChild(toggleBtn);
  const saved = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", saved);
  if (saved === "dark") document.body.classList.add("dark-mode");

  toggleBtn.addEventListener("click", () => {
    const current = document.documentElement.getAttribute("data-theme");
    const next = current === "dark" ? "light" : "dark";
    document.documentElement.setAttribute("data-theme", next);
    localStorage.setItem("theme", next);
    document.body.classList.toggle("dark-mode");
    updateIcon(next);
  });

  function updateIcon(theme) {
    const icon = document.getElementById("theme-icon");
    if (!icon) return;
    icon.innerHTML = theme === "dark"
      ? `<path d="M21 12.79A9 9 0 1 1 11.21 3 A7 7 0 0 0 21 12.79z"/>` // 🌙
      : `<circle cx="12" cy="12" r="5"></circle>
         <path d="M12 1v2m0 18v2m9-9h2M1 12H3
                  m16.95-7.05l-1.414 1.414
                  M4.464 19.536l-1.414-1.414
                  m0-12.728l1.414 1.414
                  M19.536 19.536l-1.414-1.414"/>`; // ☀️

    icon.style.transition = "transform 0.4s ease";
    icon.style.transform = "rotate(360deg)";
    setTimeout(() => (icon.style.transform = "rotate(0deg)"), 400);
  }
});


