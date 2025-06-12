<?php get_header(); ?>

<div class="top">

  <section class="fv-section">
    <video autoPlay loop="" muted="" playsinline="" tabindex="-1">
      <source src="<?php echo get_template_directory_uri();?>/images/index/wave.mp4">
    </video>
  </section>

  <section class="work-section">
    <div class="inner">
      <h2 class="heading" id="work">WORK</h2>
      <div class="work-section__list">
        <?php
            global $post;
            $lastposts = get_posts( array(
              'post_type' => 'work',
              'orderby' => 'date',
              'posts_per_page' => -1,
              'paged' => $paged
            ) );
            foreach ( $lastposts as $post ) :
                setup_postdata( $post );
          ?>
            <div class="article__item" data-aos="fade" data-aos-duration="1000" data-aos-easing="easeOutCubic">
              <a href="<?php the_permalink(); ?>">
                <h4 class="article__ttl"><?php the_title(); ?></h4>
                <img class="article__thumb" src="<?php echo get_the_post_thumbnail_url($post->ID, 'topthumb'); ?>" alt="">
              </a>
            </div>
            
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
      </div>
    </div>
  </section>

  <section class="service-section">
    <div class="inner">
      <h2 class="heading" id="service">SERVICE</h2>
      <div class="service-section__col">
        <div class="service-section__box">
          <h4 class="service-section__heading">ディレクション<span class="service-section__heading--en">DIRECTION</span></h4>
          <div class="service-section__icon"><img class="service-section__icon-img" src="<?php echo get_template_directory_uri();?>/images/index/direction.svg" alt=""></div>
          <p class="service-section__desc">お客様の要望をヒアリングし、現状の問題点を洗い出し、効果的なプランを作成いたします。問題解決に向けて最適なチームを編成して、費用対効果の高いWebサイトを制作させていただきます。</p>
        </div>
        <div class="service-section__box">
          <h4 class="service-section__heading">コーディング<span class="service-section__heading--en">CODING</span></h4>
          <div class="service-section__icon"><img class="service-section__icon-img" src="<?php echo get_template_directory_uri();?>/images/index/coding.svg" alt=""></div>
          <p class="service-section__desc">デザインの意図を理解し、BEMやFLOCSSを使用してメンテナンスしやすい・保守しやすいコード設計を行います。WordPressを使用した更新性の高いサイト、Javascriptを使用した動きのあるサイトなど、様々なサイトのコーディングを行っております。</p>
        </div>
        <div class="service-section__box">
          <h4 class="service-section__heading">運用<span class="service-section__heading--en">OPERATION</span></h4>
          <div class="service-section__icon"><img class="service-section__icon-img" src="<?php echo get_template_directory_uri();?>/images/index/operation.svg" alt=""></div>
          <p class="service-section__desc">CMS導入からコンテンツ制作、Webサイトの分析／改善など、サイト運用に関するお悩みを解決させていただきます。</p>
        </div>
    </div>
  </section>

  <section class="about-section">
    <div class="inner">
      <h2 class="heading" id="about">ABOUT</h2>
      <div class="about-section__text">
        <h3 class="about-section__name">大成 泰 / <span>Onari Yasushi</span></h3>
        <p class="about-section__desc">2013年より東京にてフリーランスでWeb制作をしております。<br>コーポレートサイトやLPのコーディングをはじめ、WordPressを用いたサイト構築・カスタマイズを中心に承っております。</p>
        <dl class="about-section__list">
          <dt class="about-section__skill"><i class="fas fa-pen"></i>スキル</dt>
          <dd class="about-section__skill-desc">HTML、CSS(Sass)、JavaScript(jQuery)、WordPress、Node.js、GitHub</dd>
        </dl>
        <p></p>
      </div>
    </div>
  </section>
  
</div>

<?php get_footer(); ?>