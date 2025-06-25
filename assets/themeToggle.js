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

  const currentTheme = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", currentTheme);
  updateIcon(currentTheme);

  toggleBtn.addEventListener("click", () => {
    const newTheme = document.documentElement.getAttribute("data-theme") === "dark" ? "light" : "dark";
    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
    updateIcon(newTheme);
  });

  function updateIcon(theme) {
    const icon = document.getElementById("theme-icon");
    if (!icon) return;

    if (theme === "dark") {
      icon.innerHTML = `<path d="M21 12.79A9 9 0 1 1 11.21 3
                          A7 7 0 0 0 21 12.79z"/>`; // 🌙
    } else {
      icon.innerHTML = `
        <circle cx="12" cy="12" r="5"></circle>
        <path d="M12 1v2m0 18v2m9-9h2M1 12H3
                 m16.95-7.05l-1.414 1.414
                 M4.464 19.536l-1.414-1.414
                 m0-12.728l1.414 1.414
                 M19.536 19.536l-1.414-1.414"/>
      `; // ☀️
    }

    icon.style.transition = "transform 0.4s ease";
    icon.style.transform = "rotate(360deg)";
    setTimeout(() => icon.style.transform = "rotate(0deg)", 400);
  }
});
