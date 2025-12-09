<?php
// Deze is nu eigenlijk overbodig, maar kan blijven staan als je 'm later nog gebruikt
$form = get_field('search_form_shortcode', 'option');

$s = get_search_query();

$args = [
    's'              => $s,
    'posts_per_page' => -1,
    'post_type'      => 'post',
];

$the_query = new WP_Query($args);

get_header(); ?>
<section class="text vertical blue add-connector-arrow">
    <div class="container">
        <span class="connector"></span>

        <div class="flex-wrapper">
            <div class="content" data-aos="fade-up">
                <h1 class="h2">
                    Zoekresultaten voor
                    <span class="orange"><?php echo esc_html($s); ?></span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section class='search-results grey'>
    <div class='container'>
        <?php if ($the_query->have_posts()) : ?>
            <div class='post-grid' data-aos="fade-up">
                <?php
                while ($the_query->have_posts()) :
                    $the_query->the_post();

                    $post_id        = get_the_ID();
                    $featured_image = get_the_post_thumbnail_url($post_id, 'large');
                    $thumbnail_id   = get_post_thumbnail_id($post_id);
                    $alt            = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    $author_id      = get_post_field('post_author', $post_id);
                    ?>

                    <div data-aos="fade-up" class="single-post">
                        <?php if (!empty($featured_image)) : ?>
                            <span class="image">
                                <img
                                    src="<?php echo esc_url($featured_image); ?>"
                                    alt="<?php echo esc_attr($alt); ?>"
                                >
                            </span>
                        <?php endif; ?>

                        <div class="content">
                            <h3><?php echo esc_html(get_the_title()); ?></h3>

                            <?php if (function_exists('get_reading_time')) : ?>
                                <div class="time-to-read">
                                    <?php echo esc_html(get_reading_time($post_id)); ?> minuten leestijd
                                </div>
                            <?php endif; ?>

                            <p><?php echo esc_html(get_the_excerpt()); ?></p>

                            <a href="<?php echo esc_url(get_the_permalink($post_id)); ?>" class="btn-text">
                                Lees verder
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <div class='no-results' data-aos="fade-up">
                <h2>Geen resultaten</h2>

                <p>
                    We konden niks vinden voor:
                    <span class='search'><?php echo esc_html(get_query_var('s')); ?></span>
                </p>

                <div class='search-form'>
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
