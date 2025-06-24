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
      el.innerHTML = content[id]; // 👈 CORRECTION ICI
      if (el.tagName === "HTML") el.lang = content[id];
    }
  });
}


