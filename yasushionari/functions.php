<?php
define('CSS_PATH', get_theme_file_uri('/css/'));
define('JS_PATH', get_theme_file_uri('/js/'));
define('IMG_PATH', get_theme_file_uri('/images/'));

// 更新通知非表示（WordPress本体）
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');
add_filter('pre_site_transient_update_core', function($a){return '';});

// 更新通知非表示（プラグイン）
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', function($a){return '';});

// 更新通知非表示（テーマ）
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', function($a){return '';});


// wp-head不要情報削除（バージョン情報）
remove_action('wp_head', 'wp_generator');

// wp-head不要情報削除（RSS）
remove_action('wp_head', 'feed_links_extra', 3);

// wp-head不要情報削除（パーマリンク）
remove_action('wp_head', 'wp_shortlink_wp_head');

// wp-head不要情報削除（前後記事のURL）
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// wp-head不要情報削除（リモート投稿）
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// wp-head不要情報削除（絵文字）
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// wp-head不要情報削除（REST API）
remove_action('wp_head', 'rest_output_link_wp_head');

// wp-head不要情報削除（Embed）
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

//自動更新を無効にする
add_filter( 'automatic_updater_disabled', '__return_true' );

//main css & scripts
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('main_style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css'), false);
  wp_enqueue_script('main_script', get_template_directory_uri() . '/js/script.min.js', array('jquery'), gmdate('YmdHi', filemtime(get_theme_file_path('/js/script.min.js'))), true);
});

add_filter('bogo_localizable_post_types', 'add_localizable_post_types', 10, 1);
    function add_localizable_post_types($localizable)
    {
        $localizable[] = 'modelcase';
        return $localizable;
    }

function page_content_e($page_path, $post_type = 'page')
{
    $page = get_page_by_path($page_path, OBJECT, $post_type);
    if ($page && $page->post_status == 'publish') {
        echo apply_filters('the_content', $page->post_content);
    }
}


// （タクソノミーと）タームのリンクを取得する
function custom_taxonomies_terms_links()
{
    // 投稿 ID から投稿オブジェクトを取得
    $post = get_post($post->ID);

    // その投稿から投稿タイプを取得
    $post_type = $post->post_type;

    // その投稿タイプからタクソノミーを取得
    $taxonomies = get_object_taxonomies($post_type, 'objects');

    $out = array();
    foreach ($taxonomies as $taxonomy_slug => $taxonomy) {

    // 投稿に付けられたタームを取得
        $terms = get_the_terms($post->ID, $taxonomy_slug);

        if (!empty($terms)) {
            // $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
            foreach ($terms as $term) {
                $out[] =
          '  <li><a href="'
        .    get_term_link($term->slug, $taxonomy_slug) .'">'
        .    $term->name
        . "</a></li>\n";
            }
            $out[] = "</ul>\n";
        }
    }

    return implode('', $out);
}

// アイキャッチ画像の追加（投稿及び固定ページで有効にする）
add_theme_support('post-thumbnails');
// アイキャッチ画像のサイズを指定する(trueでトリミング)
set_post_thumbnail_size(420, 420, true);

//自動生成する画像サイズ
add_image_size('thumbnails', 2800, 2800, array('center','top'));
add_image_size('topthumb', 770, 770, array('center','top'));
// add_image_size('menuthumb', 440, 307, true);

//srcsetの無効
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );


//改行の時に自動的にPタグが挿入されるのを防ぐ
//remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

// <?php wp_head(); を入れた時に勝手にマージンがつくのを防ぐ
add_filter('show_admin_bar', '__return_false');


// カスタム投稿タイプを追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'work', //カスタム投稿タイプ名を指定
        array(
            'labels' => array(
            'name' =>'WORK',
            'singular_name' =>'WORK'
        ),
        'public' => true,
        'has_archive' => true, /* アーカイブページを持つ */
        'menu_position' =>3, //管理画面のメニュー順位
        'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest' => true
        )
    );
}



//【管理画面】管理者以外の投稿メニューを非表示
if (!current_user_can('contributor')) { // 管理者以外を対象
    function remove_menus () {
        global $menu;
        remove_menu_page('edit.php'); // 投稿を非表示
    }
    add_action('admin_menu', 'remove_menus');
}

/** エディタにオリジナルのスタイルを適用 */
function wpdocs_theme_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'css/style.css', 'css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'wpdocs_theme_add_editor_styles' );

// タイトルタグ
add_theme_support( 'title-tag' );
function ct_separator($sep) {
  $sep = '｜';
  return $sep;
}
add_filter( 'document_title_separator', 'ct_separator' );
function change_doc_title_parts( $title ){
    $title['tagline'] = '';
   
    return $title;
  }
add_filter( 'document_title_parts', 'change_doc_title_parts' );


// 予約投稿を公開にする方法
function future_post_to_publish($data) {
  if( $data['post_type'] == 'seminar' && $data['post_status'] == 'future' ) {
    $data['post_status'] = 'publish';
  }
  return $data;
}
add_filter('wp_insert_post_data', 'future_post_to_publish');


// //問合せメールに投稿タイトル追加
// function set_post_title_to_cf7_tag( $tag ){
// 	// 対象のタグかどうかチェック
// 	if ( ! is_array( $tag ) || $tag['name'] !== 'post_title' ) {
// 		return $tag;
// 	}
// 	// 投稿のタイトルを取得
// 	$post_title = get_the_title();
// 	// 空文字列の場合は処理しない
// 	if ( empty( $post_title ) ) {
// 		return $tag;
// 	}
// 	// タグの値を更新
// 	$tag['values'] = (array)$post_title;
// 	return $tag;
// }
// // フィルターフックに登録
// add_filter( 'wpcf7_form_tag', 'set_post_title_to_cf7_tag', 11 );
add_action( 'wpcf7_init', 'add_custom_form_tags' );

function add_custom_form_tags() {
  wpcf7_add_form_tag( 'page_title', 'get_page_title_form_tag_handler' );
  wpcf7_add_form_tag( 'page_url', 'get_page_url_form_tag_handler' );
}

function get_page_title_form_tag_handler( $tag ) {
  return '<input type="hidden" name="page_title" value="' . get_the_title() . '" />';
}

function get_page_url_form_tag_handler( $tag ) {
  return '<input type="hidden" name="page_url" value="' . get_permalink() . '" />';
}


?>