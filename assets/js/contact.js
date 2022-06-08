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

// //submit
// formBtn.addEventListener("click", e => {
//     e.preventDefault();
//     form.method = "post";
//     form.action = "entry.php";
//     form.submit();
// })
