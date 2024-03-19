const toggle = document.getElementById('toggle');
const html = document.getElementById('html');


toggle.addEventListener('click', (ev) => {
    let currentTheme = localStorage.getItem('theme');

    if(currentTheme === "dark") {
        toggle.classList.remove('text-white');
        toggle.classList.add('text-black')

        localStorage.setItem('theme', 'light');

        html.classList.remove('dark');
        html.classList.add('light');
    } else {
        toggle.classList.remove('text-black');
        toggle.classList.add('text-white')
        localStorage.setItem('theme', 'dark');
        html.classList.remove('light');
        html.classList.add('dark');
    }


});
