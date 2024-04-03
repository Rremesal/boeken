const toggle = document.getElementById('toggle');
const html = document.getElementById('html');

let currentTheme = localStorage.getItem('theme') || 'light';

if (currentTheme === 'dark') {
    toggle.classList.add('text-white');
    html.classList.add('dark');
} else {
    toggle.classList.add('text-black');
    html.classList.add('light');
}



toggle.addEventListener('click', (ev) => {
    console.log('click')
    if(currentTheme === "dark") {
        toggle.classList.remove('text-white');
        toggle.classList.add('text-black')
        localStorage.setItem('theme', 'light');
        html.classList.remove('dark');
        html.classList.add('light');
        currentTheme = 'light';
    } else {
        toggle.classList.remove('text-black');
        toggle.classList.add('text-white')
        localStorage.setItem('theme', 'dark');
        html.classList.remove('light');
        html.classList.add('dark');
        currentTheme = 'dark';
    }

});
