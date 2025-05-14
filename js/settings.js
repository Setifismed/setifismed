document.addEventListener('DOMContentLoaded', () => {
    // Load settings from localStorage
    loadSettings();
});

function loadSettings() {
    const language = localStorage.getItem('language') || 'en';
    const darkMode = localStorage.getItem('darkMode') === 'true';

    document.getElementById('language-select').value = language;
    document.getElementById('dark-mode-toggle').checked = darkMode;

    // Apply dark mode if enabled
    if (darkMode) {
        document.body.classList.add('dark-mode');
        document.querySelector('.side-menu').classList.add('dark-mode');
    }

    // Update text based on saved language
    updateText(language);
}

function changeLanguage() {
    const language = document.getElementById('language-select').value;
    localStorage.setItem('language', language);

    // Update the displayed language
    updateText(language);
}

function updateText(language) {
    const texts = {
        en: {
            title: "Settings",
            language: "Language",
            appearance: "Appearance",
            darkMode: "Enable Dark Mode",
            languageChanged: "Language changed to English",
        },
        es: {
            title: "Configuraciones",
            language: "Idioma",
            appearance: "Apariencia",
            darkMode: "Habilitar modo oscuro",
            languageChanged: "Idioma cambiado a español",
        },
        fr: {
            title: "Paramètres",
            language: "Langue",
            appearance: "Apparence",
            darkMode: "Activer le mode sombre",
            languageChanged: "Langue changée en français",
        }
    };

    // Update the text content based on the selected language
    document.querySelector('h1').textContent = texts[language].title;
    document.querySelectorAll('.settings-section h2')[0].textContent = texts[language].language;
    document.querySelectorAll('.settings-section h2')[1].textContent = texts[language].appearance;
    document.getElementById('dark-mode-toggle').nextSibling.textContent = texts[language].darkMode;

    // Alert the user about the language change
    alert(texts[language].languageChanged);
}

function toggleDarkMode() {
    const body = document.body;
    const sideMenu = document.querySelector('.side-menu');
    const isDarkMode = body.classList.toggle('dark-mode');
    sideMenu.classList.toggle('dark-mode');

    // Save dark mode preference
    localStorage.setItem('darkMode', isDarkMode);
}