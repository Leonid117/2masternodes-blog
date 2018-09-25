<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage
 * @since  Theme 1.0
 */
?>
<?php if (is_front_page()): ?>
<article id="post-<?php the_ID(); ?>" class="main-page-post <?php if (has_post_thumbnail()){ echo 'post_with_img';} ?>">
    <div class="post-info <?php if (has_post_thumbnail()){ echo 'post_has_img';} ?>">
        <div class="post-date">
            <?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
                $time_string = '<time class="post-date entry-date published updated" datetime="%1$s">%2$s</time>';

                if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                    $time_string = '<time class="post-date entry-date published" datetime="%1$s">%2$s</time>';
                }

                $time_string = sprintf( $time_string,
                    esc_attr( get_the_date( 'c' ) ),
                    get_the_date(),
                    esc_attr( get_the_modified_date( 'c' ) ),
                    get_the_modified_date()
                );

                printf( '<a href="%2$s" rel="bookmark">%3$s</a>',
                    _x( '', 'Used before publish date.', 'masternodes' ),
                    esc_url( get_permalink() ),
                    $time_string
                );
            }; ?>
        </div>
        <div class="post-name">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
            ?>
        </div>
        <div class="post-autor">
            <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
            <?php the_author_meta( 'display_name'); ?>

        </div>
    </div>
    <?php if(has_post_thumbnail()):?>
    <div class="post-image">
        <?php
        // Post thumbnail.
        masternodes_post_thumbnail();
        ?>
    </div>
<?php endif;?>

</article><!-- #post-## -->

    <?php else:?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        // Post thumbnail.
        masternodes_post_thumbnail();
        ?>

        <header class="entry-header">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
            ?>
        </header><!-- .entry-header -->


        <div class="entry-content">
            <?php
            /* translators: %s: Name of current post */
            the_content( sprintf(
                __( 'Continue reading %s', 'masternodes' ),
                the_title( '<span class="screen-reader-text">', '</span>', false )
            ) );

            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'masternodes' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'masternodes' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div><!-- .entry-content -->

        <?php
        // Author bio.
        if ( is_single() && get_the_author_meta( 'description' ) ) :
            get_template_part( 'author-bio' );
        endif;
        ?>

        <footer class="entry-footer">
            <?php masternodes_entry_meta(); ?>
            <?php edit_post_link( __( 'Edit', 'masternodes' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-footer -->

    </article><!-- #post-## -->
<?php endif; ?>
