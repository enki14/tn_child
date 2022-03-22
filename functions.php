<?php

// cssの読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


// jsファイルの読み込み
add_action('wp_enqueue_scripts', 'theme_enqueue_js');
function theme_enqueue_js(){
	wp_enqueue_script('utility', get_stylesheet_directory_uri().'/utility.js', array('jquery'), '3.4.1', true);
}


// 管理画面の投稿を「Works」とする
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'News';
  // 管理画面のデフォルト時で「 投稿 」という部分
	$menu[5][0] = $name;
  // 管理画面のデフォルト時で「 投稿一覧 」という部分
	$submenu['edit.php'][5][0] = $name.'一覧';
}
function Change_objectlabel() {
  // 登録済みの投稿タイプを表すオブジェクト
	global $wp_post_types;
	$name = 'News';
  // get_post_type_object( 'post' )->labels; と同じ
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
// Change_menulabel関数で管理画面のメニュー変更を定義する
add_action( 'admin_menu', 'Change_menulabel' );


// コンタクトフォーム7の余分なタグを削除
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/>/i', '', $content);

    return $content;
});



?>





