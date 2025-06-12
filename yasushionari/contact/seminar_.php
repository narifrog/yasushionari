<p class="c-form-required">必須項目</p>
[page_title]
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
      <p class="c-form-notice">会社でご使用されるメールアドレスをご入力ください。Gmail等、フリーアドレスは使用できません。</p>
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
      <span class="title-contactform7 u-required">役職</span>
      <span class="error-message">こちらは必須項目になります</span>
    </th>
    <td>[select* position first_as_label "--- 選択してください ---" "経営者/役員" "部長" "課長/マネージャー" "主任" "一般社員" "代理店/クライアント提案" "その他/個人事業主"]</td>
  </tr>
  <tr class="form-textarea">
    <th><span class="title-contactform7">本セミナーに興味をもたれた理由</span></th>
    <td>[textarea textarea-reason placeholder] こちらご記入ください [/textarea]</td>
  </tr>
  <tr class="form-textarea">
    <th><span class="title-contactform7">お悩み事や課題などご記入ください</span></th>
    <td>
      [textarea textarea-other placeholder] こちらご記入ください [/textarea]
      <p class="c-form-notice">本お申し込みフォームよりお預かりした個人情報の取扱いについて、次のように管理し保護に努めてまいります。また、本セミナーに申し込むことで、<a href="/privacy-policy/">プライバシーポリシー</a> に同意したものといたします。【個人情報の収集・利用・提供について】お預かりしました個人情報は、本セミナーご参加の確認、及び次回以降に開催するセミナーのご案内、サービスのご紹介に利用させていただくことがございます。【個人情報保護方針】個人情報取扱い管理の詳細は<a href="/terms-of-use/">こちら</a>からご覧いただけます。</p>
    </td>
  </tr>
</table>

<ul class="l-submit-btn">
  <li class="c-confirm-submit">
    [submit "確認する"]
    [multistep multistep-718 first_step "/seminar-confirm"]
  </li>
</ul>