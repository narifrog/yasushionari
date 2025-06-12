<?php
/**
 * Template Name: TEST
 */
get_header(); ?>

<div class="p-about p-page p-page--col">
  <?php $url = $_SERVER['REQUEST_URI']; ?>
  <?php if(strstr($url,'?')): ?>
    <?php $arr = explode("?", $url);?>
    <h3 class="c-news-category">グループ／<?php  print_r($arr[1]) ?></h3>
    <?php
      $custom_posts = get_posts(array(
        'post_type' => array('seminar','report','news'), 
        'posts_per_page' => -1,
        'date_query' => array(
          array(
            'year'  => $arr[1]
          ),
        )
      ));
    global $post;
    if($custom_posts): foreach($custom_posts as $post): setup_postdata($post); ?>

      <article>
        <p class="c-news-date"><?php echo get_the_date(); ?></p>
        <p class="c-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
      </article>

      <?php endforeach; else:?>
        <p class="c-news-nonews">ニュース情報はありません。</p>
      <?php endif;?>
      <?php wp_reset_postdata(); ?>
      <p class="c-news-more c-news-more__group">さらに見る</p>

  <!-- 通常 -->
  <?php else: ?>
    <h3 class="c-news-category">グループ</h3>
    <?php
      $custom_posts = get_posts(array(
        'post_type' => array('seminar','report','news'),
        'posts_per_page' => -1
      ));
    global $post;
    if($custom_posts): foreach($custom_posts as $post): setup_postdata($post); ?>

      <article>
        <p class="c-news-date"><?php echo get_the_date(); ?></p>
        <p class="c-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
      </article>

      <?php endforeach; else:?>
        <p class="c-news-nonews">ニュース情報はありません。</p>
      <?php endif;?>
      <?php wp_reset_postdata(); ?>
      <p class="c-news-more c-news-more__group">さらに見る</p>
  <?php endif; ?>

</div>

<?php // 年別アーカイブリストを表示
        $year=NULL; // 年の初期化
        $args = array( // クエリの作成
          'post_type' => array('seminar','report','news'), // 投稿タイプの指定
          'orderby' => 'date', // 日付順で表示
          'posts_per_page' => -1 // すべての投稿を表示
        );
        $the_query = new WP_Query($args); if($the_query->have_posts()){ // 投稿があれば表示
          echo '<ul class="year-list">';
          while ($the_query->have_posts()): $the_query->the_post(); // ループの開始
            if ($year != get_the_date('Y')){ // 同じ年でなければ表示
              $year = get_the_date('Y'); // 年の取得
              echo '<li><a href="'.home_url( '/', 'http' ).'test/?'.$year.'">'.$year.'年</a></li>'; // 年別アーカイブリストの表示
            }
          endwhile; // ループの終了
          echo '</ul>';
          wp_reset_postdata(); // クエリのリセット
        }
      ?>

<?php get_footer(); ?>