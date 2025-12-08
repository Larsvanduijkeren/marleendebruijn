<?php
$selection = get_field('selection');
$id = get_field('id');

$reviews = [];

if (!empty($selection)) {
    $args = [
        'post_type'      => 'review',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'asc',
        'tax_query'      => [
            [
                'taxonomy' => 'review_category',
                'terms'    => $selection,
                'operator' => 'IN',
            ],
        ],
    ];

    $query = new WP_Query($args);
    $reviews = $query->posts;
}
?>

<section
    class="team-selection"
    id="<?php if (!empty($id)) {
        echo esc_attr($id);
    } ?>"
>
    <div class="container">
        <?php if (empty($reviews) === false) : ?>
            <div class="flex-wrapper">
                <?php foreach ($reviews as $review) :
                    $review_id = $review->ID;
                    $review_image = get_field('image', $review_id);
                    $review_text = get_field('review_text', $review_id);
                    $review_author = get_field('author', $review_id);
                    $review_meta = get_field('meta', $review_id);
                    ?>
                    <div class="single-review">
                        <?php if (empty($review_image) === false) : ?>
                            <span class="image">
                                <img src="<?php echo $review_image['sizes']['medium']; ?>"
                                     alt="<?php echo $review_image['alt']; ?>">
                            </span>
                        <?php endif; ?>

                        <h4><?php echo get_the_title($review_id); ?></h4>

                        <?php if (empty($review_text) === false) : ?>
                            <p><?php echo $review_text; ?></p>
                        <?php endif; ?>

                        <?php if (empty($review_author) === false) : ?>
                            <div class="author">
                                <?php echo $review_author; ?>

                                <?php if (empty($review_meta) === false) : ?>
                                    - <?php echo $review_meta; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
