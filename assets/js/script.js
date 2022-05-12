/* drawer
--------------------------------- */
const btn = document.getElementById('js_drawerBtn');
const nav = document.getElementById('js_drawerContents');
const fixed = document.getElementById('js_fixed');

function drawer() {
    btn.classList.toggle('is_open');
    nav.classList.toggle('is_open');

    const position = document.querySelector('html body').getBoundingClientRect().top;
    const windowSize = window.innerWidth;

    if(btn.classList.contains('is_open') && windowSize < 992) {
        fixed.setAttribute('style', 'top:' + position + 'px;');
        fixed.classList.add('is_fixed');
    } else {
        fixed.classList.remove('is_fixed');
        fixed.setAttribute('style', '');
        window.scrollTo(0, position * -1);
    }
};

btn.addEventListener('click', () => {
    drawer();
});


/* toTop
--------------------------------- */
const toTopBtn = document.getElementById('js_toTopBtn');
const target = document.querySelector('footer');

const options = {
    root: null,
    rootMargin: "300px"
}
const observer = new window.IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if(entry.isIntersecting) {
            toTopBtn.classList.add('is_display');
        } else {
            toTopBtn.classList.remove('is_display');
        }
    });

}, options);
observer.observe(target);

toTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});


/* tab
--------------------------------- */
const tab = document.querySelectorAll('.bl_catList_item');
const tabContent = document.querySelectorAll('.bl_catTab_contents');

for (let i = 0; i < tab.length; i++) {
  tab[i].addEventListener('click', tabToggle);
}

function tabToggle() {
  for (let i = 0; i < tab.length; i++) {
    tab[i].classList.remove('is_select');
  }
  for (let i = 0; i < tabContent.length; i++) {
    tabContent[i].classList.remove('is_display');
  }
  this.classList.add('is_select');
  
  const aryTabs = Array.prototype.slice.call(tab);
  const index = aryTabs.indexOf(this);

  tabContent[index].classList.add('is_display');
}