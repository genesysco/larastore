const themeToggle = document.getElementById('theme-toggle');
const html = document.documentElement;

themeToggle.addEventListener('click', () => {
    html.classList.toggle('light');
    html.classList.toggle('dark');
    
    // Save preference to localStorage
    const isDark = html.classList.contains('dark');
    localStorage.setItem('darkMode', isDark);
});

// Check for saved preference
if (localStorage.getItem('darkMode') === 'true') {
    html.classList.remove('light');
    html.classList.add('dark');
} else if (localStorage.getItem('darkMode') === 'false') {
    html.classList.remove('dark');
    html.classList.add('light');
}

function enableDarkMode() {
    html.classList.toggle('light');
    html.classList.toggle('dark');
    
    // Save preference to localStorage
    const isDark = html.classList.contains('dark');
    localStorage.setItem('darkMode', isDark);
}

function showCategories() {
    const categories = document.getElementById("categories");
    categories.classList.toggle("hidden");
}