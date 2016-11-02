<?php
/*

@package mojorising
-- Standard Post Format

*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
       
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        
        <div class="entry-meta">
            <?php mojo_posted_meta(); ?>
        </div>
    </header>
</article>