/* drawer
--------------------------------- */
// headerNav
const drawerBtn = document.getElementById("js_drawerBtn");
const drawerNav = document.getElementById("js_drawerNav");
const fixed = document.getElementById("js_fixed");

function drawer() {
  drawerBtn.classList.toggle("is_open");
  drawerNav.classList.toggle("is_open");

  const windowSize = window.innerWidth;

  if (drawerBtn.classList.contains("is_open") && windowSize < 992) {
    fixed.classList.add("is_fixed");
  } else {
    fixed.classList.remove("is_fixed");
  }
}
drawerBtn.addEventListener("click", () => {
  drawer();
  // toc表示制御
  if (tocBtn) {
    if (drawerBtn.classList.contains("is_open")) {
      tocBtn.classList.add("is_hide");
      tocNav.classList.remove("is_open");
    } else {
      tocBtn.classList.remove("is_hide");
      tocNav.classList.add("is_open");
    }
  }
});

// toc
const tocBtn = document.getElementById("js_tocBtn");
const tocNav = document.getElementById("js_tocContents");

function tocToggle() {
  tocBtn.classList.toggle("is_open");
  tocNav.classList.toggle("is_open");
}

if (tocBtn) {
  tocBtn.addEventListener("click", () => {
    tocToggle();
  });
}

/* toTop
--------------------------------- */
const toTopBtn = document.getElementById("js_toTopBtn");
const target = document.querySelector("footer");

const options = {
  root: null,
  rootMargin: "300px",
};
const observer = new window.IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      toTopBtn.classList.add("is_display");
    } else {
      toTopBtn.classList.remove("is_display");
    }
  });
}, options);
observer.observe(target);

toTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

/* tab
--------------------------------- */
const tabList = document.querySelector('[role="tablist"]');
const tabs = document.querySelectorAll('[role="tab"]');
const tabPanels = document.querySelectorAll('[role="tabpanel"]');

tabs.forEach((tab) => {
  tab.addEventListener("click", tabToggle);
  tab.addEventListener("keydown", (e) => {
    const currentFocusIndex = [...tabs].indexOf(document.activeElement);
    const tabIndex = [...tabs].indexOf(tab);

    // 右のタブへフォーカス移動
    if (e.code === "ArrowRight") {
      if (tabIndex === currentFocusIndex && tabIndex < [...tabs].length - 1) {
        tabs[tabIndex + 1].focus();
      }
    }

    // 左のタブへフォーカス移動
    if (e.code === "ArrowLeft") {
      if (tabIndex === currentFocusIndex && tabIndex > 0) {
        tabs[tabIndex - 1].focus();
      }
    }

    return false;
  });
});

function tabToggle() {
  tabs.forEach((tab) => {
    tab.classList.remove("is_select");
    tab.setAttribute("aria-selected", "false");
    tab.setAttribute("tabindex", "-1");
  });
  tabPanels.forEach((panel) => {
    panel.classList.remove("is_display");
    panel.setAttribute("hidden", "true");
  });
  this.classList.add("is_select");
  this.setAttribute("aria-selected", "true");
  this.setAttribute("tabindex", "0");

  const index = [...tabs].indexOf(this);
  tabPanels[index].classList.add("is_display");
  tabPanels[index].setAttribute("hidden", "false");

  tabPanels[index].parentNode.classList.add("is_display");
}

/* copyBtn
--------------------------------- */
function copy() {
  const copyBtn = document.getElementById("js_copyBtn");
  const copyText = document.getElementById("js_copy").value;

  navigator.clipboard.writeText(copyText).then(success, error);
  function success() {
    copyBtn.classList.add("is_copied");
  }
  function error() {
    copyBtn.classList.add("is_error");
    copyBtn.firstChild.innerHTML = "コピーに失敗しました";
  }

  setTimeout(() => {
    if (copyBtn.classList.contains("is_copied")) {
      copyBtn.classList.remove("is_copied");
    } else if (copyBtn.classList.contains("is_error")) {
      copyBtn.classList.remove("is_error");
    }
  }, 2000);
}

/* もくじ
--------------------------------- */
document.addEventListener("DOMContentLoaded", toc());

function toc() {
  const toc = document.getElementById("js_tocList");
  const headings = document.querySelectorAll(".bl_entry_body h2, .bl_entry_body h3");
  const layer = [];
  const stack = [{ level: 1, element: toc }];
  const tocListFragment = document.createDocumentFragment();

  if (toc) {
    headings.forEach((heading) => {
      const level = parseInt(heading.tagName.substring(1));
      layer.push(level);
    });

    headings.forEach((heading, index) => {
      const level = parseInt(heading.tagName.substring(1));
      const next = layer[index + 1];
      const ol = document.createElement("ol");
      const li = document.createElement("li");
      const a = document.createElement("a");

      // 見出しにidを付与
      const id = "cp" + (index + 1);
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
      stack.push({ level: level, element: ol });
    });
    toc.appendChild(tocListFragment);
  } else {
    return;
  }

  // ハイライト
  const options = {
    root: null,
    rootMargin: "-50% 0px",
    threshold: 0,
  };
  const observer = new IntersectionObserver(highlightIntersect, options);

  headings.forEach((head) => {
    observer.observe(head);
  });

  function highlightIntersect(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        highlightToc(entry.target);
      }
    });
  }

  function highlightToc(el) {
    const currentItem = toc.querySelector(".is_current");
    if (currentItem) {
      currentItem.classList.remove("is_current");
    }
    const newCurrentItem = toc.querySelector(`a[href='#${el.id}']`);
    newCurrentItem.classList.add("is_current");
  }
}

/* スクロール
--------------------------------- */
const anchorLinks = document.querySelectorAll('a[href^="#"]');

if (anchorLinks) {
  const anchorLinksArr = [].slice.call(anchorLinks);

  anchorLinksArr.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const targetId = link.hash;
      const targetElement = document.querySelector(targetId);
      const targetOffsetTop = window.pageYOffset + targetElement.getBoundingClientRect().top;
      const viewPort = window.innerHeight;

      window.scrollTo({
        top: targetOffsetTop - viewPort / 2,
        behavior: "smooth",
      });
    });
  });
}

/* シェアボタン
--------------------------------- */
const shareLinks = document.querySelectorAll(".bl_share_item");

function share() {
  const href = location.href;
  const pageTitle = document.title;
  const url = encodeURIComponent(href);
  const title = encodeURIComponent(pageTitle);

  shareLinks.forEach((shareLink) => {
    const target = shareLink.firstChild;

    if (shareLink.classList.contains("js_twitter")) {
      target.setAttribute("href", "https://twitter.com/share?url=" + url + "&text=" + title);
    } else if (shareLink.classList.contains("js_facebook")) {
      target.setAttribute("href", "http://www.facebook.com/share.php?u=" + url);
    } else if (shareLink.classList.contains("js_hatena")) {
      target.setAttribute("href", "http://b.hatena.ne.jp/add?mode=confirm&url=" + url + "&title=" + title);
    } else if (shareLink.classList.contains("js_feedly")) {
      target.setAttribute("href", "https://feedly.com/i/subscription/feed/" + url + "/feed/");
    }
  });
}

if (shareLinks) {
  share();
}
