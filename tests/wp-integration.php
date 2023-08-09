<?php
/**
   Template Name: Practice Tools
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
	$post_id = edumodo_get_id();
	// Prefix
    $prefix = '_edumodo_';
	// Page title enable
	$title_enable = get_post_meta($post_id, $prefix . 'title_enable', true);
	// $learnpress_select = edumodo_get_theme_mod('edumodo_single_lp_course_layout', '1');
	$learnpress_single_course_layout = edumodo_get_theme_mod('edumodo_single_lp_course_layout', '1');
get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php if(defined( 'CMB2_LOADED' )): ?>
				
				<?php
					if(is_archive('lp_course')):
						do_action('edumodo-learnpress-header-title-breadcrumb');
					elseif(is_singular('lp_course') && '3' == $learnpress_single_course_layout):
						do_action('edumodo_lp_course_header_style_3');
					elseif(is_singular('lp_course')):
						do_action('edumodo-learnpress-header-title-breadcrumb');
					else:
						do_action('edumodo-page-header-title-breadcrumb');
					endif;
				?>

			<?php else: ?>
				<?php if(! is_front_page()):?>
					<div class="page-details">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2 class="page-title">
										<?php the_title(); ?>
									</h2>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?> 
			<?php endif; ?>
			<div class="content-wrap">
				<div class="container">
					<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						
		
						$curr_local = (get_locale() == "en_US") ? "en" : "ar";
						$token = base64_encode(wp_get_current_user()->user_email);
						$role = (wp_get_current_user()->user_login == "admin") ? "admin" : "tool";
						
						$src = (!wp_get_current_user()->user_email) 
						? "https://lms.el-market.store/$curr_local"
						:"https://lms.el-market.store/$curr_local/$role/index?token=$token";
						
					?>						
				
					<iframe style="width: 100%; height: 80vh;" src="<?php echo $src ?>" frameborder="0"></iframe>

				</div><!-- .container -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
