function detectLang() {
  const urlParams = new URLSearchParams(window.location.search);
  let lang = urlParams.get('lang');

  if (!lang) {
    lang = localStorage.getItem('lang');
  }

  if (!lang) {
    const navLang = navigator.language.slice(0, 2);
    lang = ['fr', 'en', 'ar'].includes(navLang) ? navLang : 'fr';
  }

  localStorage.setItem('lang', lang);

  return lang;
}

const lang = detectLang();
document.documentElement.lang = lang;
document.querySelector('meta[http-equiv="Content-Language"]')?.setAttribute('content', lang);
