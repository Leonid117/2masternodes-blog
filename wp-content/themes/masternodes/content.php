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
<?php $post_date = get_the_date('F j, Y');?>

<?php if (!is_single($post)): ?>
    <article onclick="window.location = '<?php echo(get_permalink()); ?>'" id="post-<?php the_ID(); ?>"
             class="col-xs-12; col-sm-12;col-md-12 col-lg-12 col-xl-12 main-page-post <?php if (has_post_thumbnail()) {
                 echo 'post_with_img';
             } ?>">
        <div class="post-info <?php if (has_post_thumbnail()) {
            echo 'post_has_img';
        } ?>">
            <div class="post-date"> <?php echo $post_date; ?>
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
                            <?php echo $post_date; ?> by
                        </div>
                        <div class="post-autor post-autor-mane">
                            <?php the_author_meta('display_name'); ?>
                        </div>
                    </div>
                </div>
                    <div class="mb-4 mb-md-0 text-center text-md-left col-md-auto col-xl-4 social-links post-soc">
                        <ul class="list-unstyled">
                            <li>
                                <a href="https://www.facebook.com/2masternodes" target="_blank">
                                    <svg class="icon-facebook" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="icon Facebook">
                                            <path id="Oval 2 Copy 3.4" d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z" fill="#252533"></path>
                                            <path id="Vector" d="M0 8.96992H2.78348V7.70232V6.44545V6.24135C2.78348 5.0382 2.81548 3.1905 3.67932 2.04106C4.59648 0.827166 5.84425 0 7.99851 0C11.5072 0 12.9896 0.504893 12.9896 0.504893L12.2964 4.66221C12.2964 4.66221 11.1339 4.3292 10.0568 4.3292C8.969 4.3292 7.99851 4.71592 7.99851 5.81165V6.25209V7.70232V8.96992H12.435L12.1257 13.0306H7.99851V24.1354H2.78348V13.0306H0V8.96992Z" transform="translate(18 12)" fill="white"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/2Masternodes" target="_blank">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z" fill="#252533"></path>
                                        <path d="M26 2.60446C25.0389 3.04364 24.0189 3.33983 22.94 3.48282C24.0385 2.79852 24.8917 1.70566 25.284 0.408542C24.2542 1.04178 23.1068 1.51161 21.9004 1.75673C20.9295 0.674094 19.5368 0 18.0068 0C15.0645 0 12.6714 2.49211 12.6714 5.55617C12.6714 5.99536 12.7205 6.41411 12.8088 6.82266C8.37571 6.58774 4.44285 4.38162 1.81441 1.02136C1.35345 1.83844 1.08865 2.79851 1.08865 3.80966C1.08865 5.74002 2.03018 7.43547 3.46209 8.4364C2.58921 8.40576 1.76537 8.16063 1.04942 7.74188C1.04942 7.7623 1.04942 7.79294 1.04942 7.81337C1.04942 10.5097 2.88344 12.7465 5.32554 13.2572C4.87439 13.3798 4.40362 13.4513 3.92305 13.4513C3.57978 13.4513 3.24632 13.4206 2.92267 13.3491C3.5994 15.5552 5.57073 17.1588 7.90494 17.2098C6.08072 18.701 3.77593 19.5896 1.27499 19.5896C0.843456 19.5896 0.421728 19.559 2.99305e-07 19.5079C2.36364 21.0808 5.16861 22 8.17955 22C17.9872 22 23.3617 13.533 23.3617 6.18942C23.3617 5.94429 23.3519 5.70938 23.3421 5.47447C24.3719 4.69824 25.284 3.72795 26 2.60446Z" transform="translate(11 14)" fill="white"></path>
                                    </svg>

                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/2masternodes" target="_blank">
                                    <svg class="icon-facebook" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="icon Facebook">
                                            <path id="Oval 2 Copy 3.4" d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z" fill="#252533"></path>
                                            <path id="Vector" d="M0 8.96992H2.78348V7.70232V6.44545V6.24135C2.78348 5.0382 2.81548 3.1905 3.67932 2.04106C4.59648 0.827166 5.84425 0 7.99851 0C11.5072 0 12.9896 0.504893 12.9896 0.504893L12.2964 4.66221C12.2964 4.66221 11.1339 4.3292 10.0568 4.3292C8.969 4.3292 7.99851 4.71592 7.99851 5.81165V6.25209V7.70232V8.96992H12.435L12.1257 13.0306H7.99851V24.1354H2.78348V13.0306H0V8.96992Z" transform="translate(18 12)" fill="white"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/2Masternodes" target="_blank">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z" fill="#252533"></path>
                                        <path d="M26 2.60446C25.0389 3.04364 24.0189 3.33983 22.94 3.48282C24.0385 2.79852 24.8917 1.70566 25.284 0.408542C24.2542 1.04178 23.1068 1.51161 21.9004 1.75673C20.9295 0.674094 19.5368 0 18.0068 0C15.0645 0 12.6714 2.49211 12.6714 5.55617C12.6714 5.99536 12.7205 6.41411 12.8088 6.82266C8.37571 6.58774 4.44285 4.38162 1.81441 1.02136C1.35345 1.83844 1.08865 2.79851 1.08865 3.80966C1.08865 5.74002 2.03018 7.43547 3.46209 8.4364C2.58921 8.40576 1.76537 8.16063 1.04942 7.74188C1.04942 7.7623 1.04942 7.79294 1.04942 7.81337C1.04942 10.5097 2.88344 12.7465 5.32554 13.2572C4.87439 13.3798 4.40362 13.4513 3.92305 13.4513C3.57978 13.4513 3.24632 13.4206 2.92267 13.3491C3.5994 15.5552 5.57073 17.1588 7.90494 17.2098C6.08072 18.701 3.77593 19.5896 1.27499 19.5896C0.843456 19.5896 0.421728 19.559 2.99305e-07 19.5079C2.36364 21.0808 5.16861 22 8.17955 22C17.9872 22 23.3617 13.533 23.3617 6.18942C23.3617 5.94429 23.3519 5.70938 23.3421 5.47447C24.3719 4.69824 25.284 3.72795 26 2.60446Z" transform="translate(11 14)" fill="white"></path>
                                    </svg>

                                </a>
                            </li>
                        </ul>
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
                                <a rel="external" href="<? the_permalink() ?>">
                                    <div class="img-related-post">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="related_post_bottom">
                                        <div class="post-autor-info">
                                            <div class="post-date">
                                <span class="post-date entry-date published">
                                    <?php echo $post_date; ?> by
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
                    <? }
                }
                $post = $orig_post;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>


<?php endif; ?>
