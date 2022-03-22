<?php
/**
 * Template Name: page-home
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<!-- 固定ページ「About」 -->
			<?php 
				$about = get_page_by_path('About');
				$page = get_post($about);
			?>
			<section id="about" class="s-wrapper">
				<h2 class="sec-title text-center">About</h2>
				<?php echo $page->post_content; ?>
			</section>

			<!-- 固定ページ「Works」 -->
			<?php 
				// メディアはpage_idを指定しないと認識できなかった
				$page_id = 30;
				$Works = get_page($page_id);
			?>
			<section id="works" class="s-wrapper">
				<h2 class="sec-title text-center">Works</h2>
				<div class="d-flex justify-content-between">
					<div class="row mx-0">
						<?php echo $Works->post_content; ?>
					</div>
				</div>
			</section>

			<!-- 投稿一覧「News」 -->
			<?php 
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 5

				];
				$content = get_posts($args);
				
			?>
			<section id="news" class="s-wrapper">
				<h2 class="sec-title text-center">News</h2>
				<?php foreach ( $content as $data ): ?>
					<dl>
						<dt class="post-date"><?php echo date('Y.m.d', strtotime($data->post_date)); ?></dt>
						<dd class="post-title"><?php echo $data->post_title; ?></dd>
					</dl>
				<?php endforeach; ?>
			</section>

			<!--「Contact Form 7」 のショートコード -->
			<section id="contact" class="s-wrapper">
				<h2 class="sec-title text-center">Contact</h2>
				<?php echo do_shortcode('[contact-form-7 id="50" title="無題"]'); ?>
			</section>
			

		
		</main><!--#main -->
	</div><!-- #primary -->

<?php
get_footer();
