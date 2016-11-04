<?php
/*

@package mojorising
-- Standard Post Format

*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header text-center">
       
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        
        <div class="entry-meta">
            <?php echo mojo_posted_meta(); ?>
        </div>
    </header>
    
    <div class="entry-content"> 
        
        <?php if ( has_post_thumbnail() ): 
            $featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        ?>
        
            <div class="standard-featured background-image" style="background-image: url(<?php echo $featured_image; ?>)"></div>
        <?php endif; ?>
        
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e('Read More'); ?></a>
        </div>
    </div><!-- .entry-content -->
    
    <footer class="entry-footer">
         <?php echo mojo_posted_footer(); ?>
    </footer>
</article>