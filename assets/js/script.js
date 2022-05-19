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
const copyBtn = document.getElementById('js_copyBtn');

function copy() {
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
if(copyBtn) {
    copyBtn.addEventListener('click', copy());
}


/* エラーメッセージ
--------------------------------- */
const textInput = document.querySelectorAll(".js_textInput");
const emailInput = document.querySelectorAll(".js_emailInput");

const textErrorMessage = document.querySelectorAll(".js_textErrorMessage");
const emailErrorMessage = document.querySelectorAll(".js_emailErrorMessage");

//バリデーションパターン
const emailExp = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;

//テキストタイプ
textInput.forEach((input) => {
    input.addEventListener('blur', () => {
        const textInputAry = Array.from(textInput);
        const targetIndex = textInputAry.indexOf(input);
        const val = input.value;

        if (val.length == '') {
            textErrorMessage[targetIndex].classList.add('is_display');
        } else {
            textErrorMessage[targetIndex].classList.remove('is_display');
        }

        checkSuccess();
    });
});

//email
emailInput.forEach((input) => {
    input.addEventListener('blur', () => {
        const emailInputAry = Array.from(emailInput);
        const targetIndex = emailInputAry.indexOf(input);
        const val = input.value;

        if (!emailExp.test(val)) {
            emailErrorMessage[targetIndex].classList.add('is_display');
        } else {
            emailErrorMessage[targetIndex].classList.remove('is_display');
        }

        checkSuccess();
    });
});


/* disabled制御
--------------------------------- */
const formBtn = document.getElementById("js_formBtn");
const agreeCheck = document.getElementById("js_agreeBtn");

//初期状態設定
formBtn.disabled = true;

agreeCheck.addEventListener("click", checkSuccess);

function checkSuccess() {
    if (document.querySelector("input[name=name1]").value !== '' &&
        document.querySelector("input[name=name2]").value !== '' &&
        document.querySelector("input[name=email]").value !== '' &&
        document.querySelector("textarea").value !== '' &&
        agreeCheck.checked) {
        formBtn.disabled = false;   
    } else {
        formBtn.disabled = true;
    }
};

//submit
formBtn.addEventListener("click", e => {
    e.preventDefault();
    form.method = "post";
    form.action = "entry.php";
    form.submit();
})
