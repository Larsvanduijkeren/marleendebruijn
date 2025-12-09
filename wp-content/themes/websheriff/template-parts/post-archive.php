<?php
$intro_card_image = get_field('intro_card_image');
$intro_card_title = get_field('intro_card_title');
$intro_card_button = get_field('intro_card_button');

$id = get_field('id');

$args = [
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'post_date',
    'order'          => 'desc',
    'tax_query'      => [
        'relation' => 'AND',
    ],
];


$query = new WP_Query($args);
$posts = $query->posts;

$slider_args = [
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'orderby'        => 'post_date',
    'order'          => 'desc',
    'tax_query'      => [
        'relation' => 'AND',
    ],
];


$slider_query = new WP_Query($slider_args);
$slider_posts = $slider_query->posts;
?>

<section class="post-archive-intro">
    <div class="container">
        <div class="flex-wrapper">
            <div class="slider" data-aos="fade-up">
                <?php if (empty($slider_posts) === false) :
                    foreach ($slider_posts as $post) :
                        $featured_image = get_the_post_thumbnail_url($post, 'large');
                        $thumbnail_id = get_post_thumbnail_id($post);
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        $author_id = $post->post_author;
                        ?>
                        <div  class="single-post">
                            <?php if (empty($featured_image) === false) : ?>
                                <span class="image">
                                    <img src="<?php echo $featured_image; ?>"
                                         alt="<?php echo $alt; ?>">
                                </span>
                            <?php endif; ?>

                            <div class="content">
                                <div class="title-wrap">
                                <h3><?php echo get_the_title($id); ?></h3>

                                    <div class="controls">
                                        <span class="prev"></span>
                                        <span class="next"></span>
                                    </div>
                                </div>

                                <div class="time-to-read"><?php echo get_reading_time($post); ?> minuten leestijd</div>

                                <p><?php echo get_the_excerpt(); ?></p>

                                <a href="<?php echo get_the_permalink($id); ?>" class="btn-text">Lees verder</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="intro-card" data-aos="fade-up">
                <?php if (empty($intro_card_image) === false) : ?>
                    <span class="image">
                        <img src="<?php echo $intro_card_image['sizes']['large']; ?>"
                             alt="<?php echo $intro_card_image['alt']; ?>">
                    </span>
                <?php endif; ?>

                <div class="content">
                    <?php if (empty($intro_card_title) === false) : ?>
                        <h3><?php echo $intro_card_title; ?></h3>
                    <?php endif; ?>

                    <?php if (empty($intro_card_button) === false) {
                        echo sprintf('<a href="%s" target="%s" class="btn-ghost">%s</a>', $intro_card_button['url'], $intro_card_button['target'], $intro_card_button['title']);
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section
    class="post-archive grey"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class='search-form' data-aos="fade-up">
            <?php get_search_form(); ?>
        </div>

        <div class="post-grid">
            <?php if (empty($posts) === false) :
                foreach ($posts as $post) :
                    $featured_image = get_the_post_thumbnail_url($post, 'large');
                    $thumbnail_id = get_post_thumbnail_id($post);
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    $author_id = $post->post_author;
                    ?>

                    <div data-aos="fade-up" class="single-post">
                        <?php if (empty($featured_image) === false) : ?>
                            <span class="image">
                                <img src="<?php echo $featured_image; ?>"
                                     alt="<?php echo $alt; ?>">
                            </span>
                        <?php endif; ?>

                        <div class="content">
                            <h3><?php echo get_the_title($id); ?></h3>

                            <div class="time-to-read"><?php echo get_reading_time($post); ?> minuten leestijd</div>

                            <p><?php echo get_the_excerpt(); ?></p>

                            <a href="<?php echo get_the_permalink($id); ?>" class="btn-text">Lees verder</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
