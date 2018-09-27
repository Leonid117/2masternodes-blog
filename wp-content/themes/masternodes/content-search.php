<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage
 * @since  Theme 1.0
 */
?>

<article onclick="window.location = '<?php echo(get_permalink()); ?>'" id="post-<?php the_ID(); ?>"
         class="col-xs-12; col-sm-12;col-md-9 col-lg-8 col-xl-8 main-page-post <?php if (has_post_thumbnail()) {
             echo 'post_with_img';
         } ?>">
    <div class="post-info <?php if (has_post_thumbnail()) {
        echo 'post_has_img';
    } ?>">
        <div class="post-date">
            <?php if (in_array(get_post_type(), array('post', 'attachment'))) {
                $time_string = '<time class="post-date entry-date published updated" datetime="%1$s">%2$s</time>';

                if (get_the_time('U') !== get_the_modified_time('U')) {
                    $time_string = '<time class="post-date entry-date published" datetime="%1$s">%2$s</time>';
                }

                $time_string = sprintf($time_string,
                    esc_attr(get_the_date('c')),
                    get_the_date(),
                    esc_attr(get_the_modified_date('c')),
                    get_the_modified_date()
                );

                printf('<a href="%2$s" rel="bookmark">%3$s</a>',
                    _x('', 'Used before publish date.', 'masternodes'),
                    esc_url(get_permalink()),
                    $time_string
                );
            }; ?>
        </div>
        <div class="post-name">
            <?php
            if (is_single()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
            endif;
            ?>
        </div>
        <div class="post-autor">
            <?php echo get_avatar(get_the_author_meta('ID')); ?>
            <?php the_author_meta('display_name'); ?>

        </div>
    </div>
    <?php if (has_post_thumbnail()): ?>
        <div class="post-image">
            <?php
            // Post thumbnail.
            masternodes_post_thumbnail();
            ?>
        </div>
    <?php endif; ?>

</article><!-- #post-## -->
