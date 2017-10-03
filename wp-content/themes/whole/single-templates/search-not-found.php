<?php
/**
 * Created by PhpStorm.
 * User: FOX
 * Date: 2/22/2016
 * Time: 1:52 PM
 */
?>
<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'whole' ); ?></h1>
    </header>

    <div class="entry-content">
        <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'whole' ); ?></p>
        <?php get_search_form(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 -->
