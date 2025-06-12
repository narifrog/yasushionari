<p class="c-form-required wpcf7c-elm-step1">必須項目</p>

<table class="formTable">
  <tr>
    <th>
      <span class="title-contactform7 u-required">氏名</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>[text* text-name placeholder "名字　名前"]</td>
  </tr>
  <tr>
    <th>
      <span class="title-contactform7 u-required">会社名</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>[text* text-company placeholder "アールビー・コンサルティング株式会社"]</td>
  </tr>
  <tr class="form-mail u-required">
    <th>
      <span class="title-contactform7 u-required">メールアドレス</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>
      [email* email placeholder "業務で使用されているメールアドレス"]
      <p class="c-form-notice wpcf7c-elm-step1">会社でご使用されるメールアドレスをご入力ください。Gmail等、フリーアドレスは使用できません。</p>
    </td>
  </tr>
  <tr class="form-tell">
    <th>
      <span class="title-contactform7 u-required">電話番号</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>[tel* tel placeholder "0000000000"]</td>
  </tr>
  <tr class="form-select">
    <th>
      <span class="title-contactform7 u-required">従業員数</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>[select* employee first_as_label "--- 選択してください ---" "1名〜29名" "30〜49名" "50〜99名" "100〜299名" "300〜599名" "600〜999名" "1000名以上"]</td>
  </tr>
  <tr class="form-select">
    <th>
      <span class="title-contactform7 u-required">役職</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>[select* position first_as_label "--- 選択してください ---" "経営者/役員" "部長" "課長/マネージャー" "主任" "一般社員" "代理店/クライアント提案" "その他/個人事業主"]</td>
  </tr>
  <tr class="form-select">
    <th>
      <span class="title-contactform7 u-required">問い合わせ項目</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>
      [select* inquiry first_as_label "--- 選択してください ---" "ビッグデータ活用のお問い合わせ" "マーケティング戦略、調査に関するご相談" "ブランド戦略に関するご相談" "商品企画・マーチャンダイジングに関するご相談" "営業、ビジネス提案、協業について" "求人に関するお問い合わせ" "Report内容について" "お問い合わせ（一般）"]
      <p class="c-form-notice wpcf7c-elm-step1">送信ボタンを押すことで、<a href="/privacy-policy/">個人情報保護方針</a>に同意したものといたします</p>
    </td>
  </tr>
  <tr class="form-textarea">
    <th><span class="title-contactform7 u-required">お問い合わせ内容</span></th>
    <td>[textarea* textarea-other placeholder] こちらご記入ください [/textarea*]</td>
  </tr>
</table>

<ul class="l-submit-btn">
  <li class="c-confirm-submit">
    [submit "確認する"]
    [multistep multistep-718 first_step "/contact-confirm"]
  </li>
</ul>