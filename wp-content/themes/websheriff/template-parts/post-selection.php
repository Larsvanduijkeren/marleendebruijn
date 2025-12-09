<?php
$title = get_field('title');
$text = get_field('text');
$category = get_field('category');
$add_connector_arrow = get_field('add_connector_arrow');

$id = get_field('id');

$args = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'post_date',
    'order'          => 'desc',
    'tax_query'      => [
        'relation' => 'AND',
    ],
];


$query = new WP_Query($args);
$posts = $query->posts;
?>

<section
    class="post-selection grey"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if (empty($add_connector_arrow) === false) : ?>
        <span class="connector"></span>
    <?php endif; ?>

    <div class="container">
        <?php if (empty($title) === false) : ?>
            <div class="intro center" data-aos="fade-up">
                <h2><?php echo $title; ?></h2>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>
            </div>
        <?php endif; ?>

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
