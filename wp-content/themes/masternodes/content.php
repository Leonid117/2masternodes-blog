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
<?php if (!is_single($post)): ?>
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
<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        // Post thumbnail.
        masternodes_post_thumbnail();
        ?>

        <header class="entry-header <?php if (is_single($post)) {
            echo 'post-header';
        } ?>">
            <span class="p-show text-secondary"><a href="<?php echo get_site_url(); ?>">Back to BLOG</a></span>
            <?php
            if (is_single()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
            endif;
            ?>
            <a class="p-show secondary-btn" href="https://2masternodes.com">Bitcoin Ink</a>
        </header><!-- .entry-header -->


        <div class="entry-content  <?php if (is_single($post)) {
            echo 'col-xs-12 col-sm-10 col-md-8 col-lg-5 col-xl-5 entry-content-post container';
        } ?>">
            <?php if (is_single()) : ?>
                <div class="autor-block">
                    <div class="post-autor">
                        <?php echo get_avatar(get_the_author_meta('ID')); ?>
                    </div>
                    <div class="post-autor-info">
                        <div class="post-date">Posted
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
                            }; ?> by
                        </div>
                        <div class="post-autor post-autor-mane">
                            <?php the_author_meta('display_name'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            /* translators: %s: Name of current post */
            the_content(sprintf(
                __('Continue reading %s', 'masternodes'),
                the_title('<span class="screen-reader-text">', '</span>', false)
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'masternodes') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'masternodes') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            ));
            ?>
        </div><!-- .entry-content -->

        <?php
        // Author bio.
        if (is_single() && get_the_author_meta('description')) :
            get_template_part('author-bio');
        endif;
        ?>
        <?php if (!is_single()) : ?>
            <footer class="entry-footer">
                <?php masternodes_entry_meta(); ?>
                <?php edit_post_link(__('Edit', 'masternodes'), '<span class="edit-link">', '</span>'); ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>


    </article><!-- #post-## -->

    <div class="related-posts container">
        <h2>Related posts:</h2>
        <div class="relatedposts">
            <div class="row">

                <?php
                $orig_post = $post;
                global $post;
                $tags = wp_get_post_tags($post->ID);

                if ($tags) {
                    $tag_ids = array();
                    foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                    $args = array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 3, // Number of related posts to display.
                        'caller_get_posts' => 1
                    );

                    $my_query = new wp_query($args);

                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                        <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="relatedthumb">
                                <a rel="external" href="<?php the_permalink() ?>">
                                    <div class="img-related-post">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail(); ?>

                                        <?php else : ?>
                                            <img src="/wp-content/themes/masternodes/img/Chrysanthemum.png" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="related_post_bottom">
                                        <div class="post-autor-info">
                                            <div class="post-date">
                                <span class="post-date entry-date published">
                                    <?php $post_date = get_the_date('F j, Y');
                                    echo $post_date; ?> by
                                </span>
                                            </div>
                                            <div class="post-autor post-autor-mane">
                                                <?php the_author_meta('display_name') ?>
                                            </div>
                                        </div>
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }
                }
                $post = $orig_post;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>


<?php endif; ?>
