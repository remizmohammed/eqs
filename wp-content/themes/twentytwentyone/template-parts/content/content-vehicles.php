<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="content-list-wrap">
    <?php 
        $title = get_the_title();
        $image = get_the_post_thumbnail_url();
        $description = get_the_content();
        $eqs_vehicle_number = get_post_meta(get_the_ID(), 'eqs_vehicle_number', true);
        $eqs_driver_name = get_post_meta(get_the_ID(), 'eqs_driver_name', true);
    ?>
    <div class="content-wrap">
        <div class="content-img">
            <img src="<?php echo $image?>" alt="Thumbnail">
        </div>
        <div class="content-meta">
            <div class="content-meta-title">
                <?php echo $title; ?>
            </div>
            <div class="content-meta-info">
                <span class="content-meta-vhno"><?php echo $eqs_vehicle_number; ?></span>
                <span class="content-meta-name"><?php echo $eqs_driver_name; ?></span>
            </div>
            <div class="content-meta-description">
                <?php echo $description; ?>
            </div>
            <div class="content-cta">
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-vehicle-cta">View Details</a>
            </div>
        </div>
        
    </div>
</article>
