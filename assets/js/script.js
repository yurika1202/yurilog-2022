/* drawer
--------------------------------- */
// headerNav
const drawerBtn = document.getElementById('js_drawerBtn');
const drawerNav = document.getElementById('js_drawerNav');
const fixed = document.getElementById('js_fixed');

function drawer() {
    drawerBtn.classList.toggle('is_open');
    drawerNav.classList.toggle('is_open');

    const position = document.querySelector('html body').getBoundingClientRect().top;
    const windowSize = window.innerWidth;

    if (drawerBtn.classList.contains('is_open') && windowSize < 992) {
        fixed.setAttribute('style', 'top:' + position + 'px;');
        fixed.classList.add('is_fixed');
    } else {
        fixed.classList.remove('is_fixed');
        fixed.setAttribute('style', '');
        window.scrollTo(0, position * -1);
    }
};
drawerBtn.addEventListener('click', () => {
    drawer();
});

// toc
const tocBtn = document.getElementById('js_tocBtn');
const tocNav = document.getElementById('js_tocContents');

function tocToggle() {
    tocBtn.classList.toggle('is_open');
    tocNav.classList.toggle('is_open');
}

if (tocBtn) {
    tocBtn.addEventListener('click', () => {
        tocToggle();
    });
}


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
const tabLatest = document.querySelectorAll('.bl_catList_item__latest');
const tabContent = document.querySelectorAll('.bl_catTab_contents');
const articleList = document.querySelectorAll('.bl_articleList');
const articleListLatest = document.querySelectorAll('.bl_articleList__latest');

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
    
    for (let i = 0; i < articleList.length; i++) {
        articleList[i].classList.remove('is_display');
    }
    for (let i = 0; i < articleListLatest.length; i++) {
        articleListLatest[i].classList.remove('is_display');
    }
    tabContent[index].parentNode.classList.add('is_display');
}


/* copyBtn
--------------------------------- */
function copy() {
    const copyBtn = document.getElementById('js_copyBtn');
    const copyText = document.getElementById('js_copy').value;

    navigator.clipboard.writeText(copyText).then(success, error);
    function success() {
        copyBtn.classList.add('is_copied');
    }
    function error() {
        copyBtn.classList.add('is_error');
    }

    setTimeout(() => {
        if(copyBtn.classList.contains('is_copied')) {
            copyBtn.classList.remove('is_copied');
        } else if(copyBtn.classList.contains('is_error')) {
            copyBtn.classList.remove('is_error');
        }
    }, 2000);
}


/* もくじ
--------------------------------- */
document.addEventListener('DOMContentLoaded', toc());

function toc() {
    const toc = document.getElementById("js_tocList");
    const headings = document.querySelectorAll('.bl_entry_body h2, .bl_entry_body h3');
    const layer = [];
    const stack = [{level: 1, element: toc}];
    const tocListFragment = document.createDocumentFragment();

    if (toc) {
        headings.forEach((heading) => {
            const level = parseInt(heading.tagName.substring(1));
            layer.push(level);
        });

        headings.forEach((heading, index) => {
            const level = parseInt(heading.tagName.substring(1));
            const next = layer[index + 1];
            const ol = document.createElement('ol');
            const li = document.createElement("li");
            const a = document.createElement("a");

            // 見出しにidを付与
            const id = 'cp' + (index + 1);
            heading.id = id;

            // 目次要素の生成
            a.textContent = heading.textContent;
            a.href = `#${id}`;
            li.appendChild(a);
            if (level < next) {
                li.appendChild(ol);
            }
            tocListFragment.appendChild(li);

            // 階層構造の生成
            let parent;
            do {
                parent = stack.pop();
            } while (parent.level >= level);
            parent.element.appendChild(li);
            stack.push(parent);
            stack.push({level: level, element: ol});
        });
        toc.appendChild(tocListFragment);
    } else {
        return;
    }
}


/* スクロール
--------------------------------- */
const anchorLinks = document.querySelectorAll('a[href^="#"]');

if (anchorLinks) {
    const anchorLinksArr = [].slice.call(anchorLinks);

    anchorLinksArr.forEach(link => {
        link.addEventListener('click', e => {
        e.preventDefault();
        const targetId = link.hash;
        const targetElement = document.querySelector(targetId);
        const targetOffsetTop = window.pageYOffset + targetElement.getBoundingClientRect().top;
        const header = document.querySelector('header');
        const headerAfterHeight = Number(getComputedStyle(header, '::after').height.replace('px', ''));
        
        window.scrollTo({
          top: targetOffsetTop - headerAfterHeight,
          behavior: "smooth"
        });
      });
    });
}


/* シェアボタン
--------------------------------- */
const shareLinks = document.querySelectorAll('.bl_share_item');

function share() {
    const href = location.href;
    const pageTitle = document.title;
    const url = encodeURIComponent(href);
    const title = encodeURIComponent(pageTitle);
    
    shareLinks.forEach(shareLink => {
        const target = shareLink.firstChild;

        if (shareLink.classList.contains('js_twitter')) {
            target.setAttribute('href', 'https://twitter.com/share?url=' + url + '&text=' + title);
        } else if (shareLink.classList.contains('js_facebook')) {
            target.setAttribute('href', 'http://www.facebook.com/share.php?u=' + url);
        } else if (shareLink.classList.contains('js_hatena')) {
            target.setAttribute('href', 'http://b.hatena.ne.jp/add?mode=confirm&url=' + url + '&title=' + title);
        } else if (shareLink.classList.contains('js_feedly')) {
            target.setAttribute('href', 'https://feedly.com/i/subscription/feed/' + url + '/feed/');
        }
    });
}

if (shareLinks) {
    share();
}
