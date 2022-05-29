<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <div class="bl_commonBox_title bl_commonBox_title__404 hp_mt24">
               <h1 class="el_pageTitle">お問い合わせ</h1>
            </div><!-- /.bl_commonBox_title -->

            <div class="bl_commonBox">
                <p class="el_lead_bottomLine"><span>ご意見・ご感想・お仕事のご依頼など</span><span>お気軽にお問合せください！</span></p><!-- /.el_lead_bottomLine -->

                <div class="bl_contactCopyBox" id="js_copyBox">
                    <p>制作依頼の場合、こちらの内容のご記入をお願いいたします。</p>
                    <div class="bl_contactCopyBox_copyBtnWrap">
                        <input type="text" id="js_copy" value="1.依頼内容/2.納期やご予算/3.ポートフォリオなどに実績としての掲載の可否" readonly>
                        <button type="button" class="el_btn el_copyBtn" id="js_copyBtn" onclick="copy()" aria-label="コピーする"></button>
                    </div><!-- /.bl_contactCopyBox_copyBtnWrap -->

                    <ol class="bl_contactCopyBox_list">
                        <li class="bl_contactCopyBox_item">依頼内容</li>
                        <li class="bl_contactCopyBox_item">納期やご予算</li>
                        <li class="bl_contactCopyBox_item">ポートフォリオなどに実績としての掲載の可否</li>
                    </ol><!-- /.bl_contactCopyBox_list -->
                </div><!-- /.bl_contactCopyBox -->

                <form action="https://hyperform.jp/api/U0J6Z8jp" method="POST">
                    <dl class="bl_form">
                    <!-- お名前 -->
                    <div class="bl_form_item">
                        <dt class="bl_form_label">
                            <label id="name" for="name1" class="bl_form_label bl_form_label__require">お名前</label>
                        </dt><!-- /.bl_form_label -->
                        <div class="bl_form_2colInput __name">
                            <dd class="bl_form_inputField bl_form_inputField__2col">
                                <label class="bl_form_subLabel" id="sei" for="name1">姓</label><!-- /.bl_form_subLabel -->
                                <div class="bl_form_inputWrap">
                                    <input type="text" name="name1" id="name1" class="js_textInput" aria-labelledby="name sei" required>
                                    <p class="bl_form_exText">山田</p><!-- /.bl_form_exText -->
                                    <p class="bl_form_errorText js_textErrorMessage">姓を入力してください。</p>
                                </div><!-- /.bl_form_inputWrap -->
                            </dd><!-- /.bl_form_inputField -->
                            <dd class="bl_form_inputField bl_form_inputField__2col">
                                <label class="bl_form_subLabel" id="mei" for="name2">名</label><!-- /.bl_form_subLabel -->
                                <div class="bl_form_inputWrap">
                                    <input type="text" name="name2" id="name2" class="js_textInput" aria-labelledby="name mei" required>
                                    <p class="bl_form_exText">太郎</p><!-- /.bl_form_exText -->
                                    <p class="bl_form_errorText js_textErrorMessage">名を入力してください。</p>
                                </div>
                            </dd><!-- /.bl_form_inputField -->
                        </div><!-- /.bl_form_2colInput -->
                    </div><!-- /.bl_form_item -->

                    <!-- フリガナ -->
                    <div class="bl_form_item">
                        <dt class="bl_form_label">
                            <label id="kana" for="kana1" class="bl_form_label">フリガナ</label>
                        </dt><!-- /.bl_form_label -->
                        <div class="bl_form_2colInput __name">
                            <dd class="bl_form_inputField bl_form_inputField__2col">
                                <label class="bl_form_subLabel" id="kana-sei" for="kana1">セイ</label><!-- /.bl_form_subLabel -->
                                <div class="bl_form_inputWrap">
                                    <input type="text" name="kana1" id="kana1" aria-labelledby="kana kana-sei">
                                    <p class="bl_form_exText">ヤマダ</p><!-- /.bl_form_exText -->
                                </div>
                            </dd><!-- /.bl_form_inputField -->
                            <dd class="bl_form_inputField bl_form_inputField__2col">
                                <label class="bl_form_subLabel" id="kana-mei" for="kana2">メイ</label><!-- /.bl_form_subLabel -->
                                <div class="bl_form_inputWrap">
                                    <input type="text" name="kana2" id="kana2" aria-labelledby="kana kana-mei">
                                    <p class="bl_form_exText">タロウ</p><!-- /.bl_form_exText -->
                                </div>
                            </dd><!-- /.bl_form_inputField -->
                        </div><!-- /.bl_form_2colInput -->
                    </div><!-- /.bl_form_item -->

                    <!-- ご連絡先 -->
                    <div class="bl_form_item">
                        <dt class="bl_form_label">
                            <label id="email" for="mail" class="bl_form_label bl_form_label__require">ご連絡先</label>
                        </dt><!-- /.bl_form_label -->
                        <dd class="bl_form_inputField">
                            <input type="email" name="email" id="mail" class="js_emailInput" aria-labelledby="email" required>
                            <p class="bl_form_exText">yamada@sample.co.jp</p><!-- /.bl_form_exText -->
                            <p class="bl_form_errorText js_emailErrorMessage">正しい形式のメールアドレスを入力してください。</p>
                        </dd><!-- /.bl_form_inputField -->
                    </div><!-- /.bl_form_item -->

                    <!-- お問い合わせ種別 -->
                    <div class="bl_form_item">
                        <dt class="bl_form_label">
                            <p id="kinds" class="bl_form_label bl_form_label__require">お問い合わせ種別</p>
                        </dt><!-- /.bl_form_label -->
                        <dd class="bl_form_inputField">
                            <ul class="bl_form_radioList" aria-labelledby="kinds">
                                <li><label><input type="radio" name="kinds" id="kind1" value="お仕事のご依頼" aria-labelledby="kinds kind1" checked><span>お仕事のご依頼</span></label></li>
                                <li><label><input type="radio" name="kinds" id="kind2" aria-labelledby="kinds kind2" value="ご意見・ご感想"><span>ご意見・ご感想</span></label></li>
                                <li><label><input type="radio" name="kinds" id="kind3" aria-labelledby="kinds kind3" value="その他"><span>その他</span></label></li>
                            </ul><!-- /.bl_form_radioList -->
                        </dd><!-- /.bl_form_inputField -->
                    </div><!-- /.bl_form_item -->

                    <!-- お問い合わせ内容 -->
                    <div class="bl_form_item">
                        <dt class="bl_form_label">
                            <label id="text" for="contents" class="bl_form_label bl_form_label__require">お問い合わせ内容</label>
                        </dt><!-- /.bl_form_label -->
                        <dd class="bl_form_inputField">
                            <textarea name="text" id="contents" class="js_textInput" aria-labelledby="text" required></textarea><!-- /# -->
                            <p class="bl_form_errorText js_textErrorMessage">お問合せ内容を入力してください。</p>
                        </dd><!-- /.bl_form_inputField -->
                    </div><!-- /.bl_form_item -->

                    <!-- プライバシーポリシー -->
                    <div class="bl_form_item">
                        <div class="bl_form_privacyBox">
                            <p class="bl_form_privacyTitle">プライバシーポリシー</p>
                            <p class="bl_form_privacyLead">yurilog.（以下、「当サイト」）は、ユーザーの個人情報の取扱いについて以下のとおりプライバシーポリシー（以下、「本ポリシー」）を定めます。</p>
                            <p class="bl_form_privacySubTitle">個人情報の利用目的</p>
                            <p>当サイトでは、名前やメールアドレス等の個人情報を取得させていただく場合がございます。取得した個人情報は、お問い合わせに対する回答や必要な情報を電子メールなどでご連絡する場合に利用させていただくものであり、これらの目的以外では利用いたしません。</p>
                            <p class="bl_form_privacySubTitle">個人情報の安全管理</p>
                            <p>当サイトではお客様よりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。</p>
                            <p class="bl_form_privacySubTitle">個人情報の第三者への開示・提供</p>
                            <p>当サイトは次に掲げる場合を除いて、同意を得ることなく第三者に個人情報を提供することはありません。<br>ただし、個人情報保護法その他の法令で認められる場合を除きます。</p>
                            <ul class="bl_form_privacyList">
                                <li>法律上照会権限を有する者から書面による正式な協力要請、照会があった場合</li>
                                <li>お客様の同意があった場合</li>
                            </ul><!-- /.bl_form_privacyList -->
                            <p class="bl_form_privacySubTitle">プライバシーポリシーの変更</p>
                            <p>本ポリシーの内容は、法令変更などを受けて、ユーザーに通知することなく随時変更することができるものとします。変更後のプライバシーポリシーは、本サイトに掲載したときから効力を生じるものとします。</p>
                            <p class="bl_form_privacySubTitle">個人情報に関するお問い合わせ</p>
                            <p>本ポリシー関するお問い合わせは、下記までお願い致します。<br>ゆりか<span></span>メールアドレス:info@yurika122.com</p>
                        </div><!-- /.bl_form_privacyBox -->
                    </div><!-- /.bl_form_item -->

                    <div class="bl_form_item bl_form_item__center">
                        <label>
                            <input type="checkbox" name="privacy" value="プライバシーポリシーに同意する" id="js_agreeBtn"><span>プライバシーポリシーの内容を<br class="hp_br__xs">確認し同意します</span>
                        </label>
                    </div><!-- /.bl_form_item -->

                    <div class="bl_form_item bl_form_item__center">
                        <button class="el_btn el_btn__submit" id="js_formBtn" type="submit">送信</button>
                    </div> 
                </form>

                <div class="bl_commonBox_btnWrap">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="el_btn el_btn__paris el_leftIconBtn el_leftIconBtn__top">トップへもどる</a><!-- /.el_btn -->
                </div><!-- /.bl_commonBox_btnWrap -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
