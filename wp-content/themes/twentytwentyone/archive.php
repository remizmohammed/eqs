<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->
	<?php  
		if( is_archive() && ! is_tax() ):
			get_template_part( 'template-parts/content/content', 'filter' ); 
		endif;
	?>
	<div class="vehicle-listing-wrap">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/content/content', get_post_type() ); ?>
		<?php endwhile; ?>
	</div>	

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
