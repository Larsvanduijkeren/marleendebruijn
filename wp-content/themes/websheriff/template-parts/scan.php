<?php
$label = get_field('label');
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
$form_shortcode = get_field('form_shortcode');
$form_text = get_field('form_text');
$review = get_field('review');

$id = get_field('id');
?>

<section
    class="scan"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($label) === false) : ?>
            <h2 class="h4"><?php echo $label; ?></h2>
        <?php endif; ?>

        <div class="flex-wrapper">
            <div class="content">
                <?php if (empty($title) === false) : ?>
                    <h3 class="h2"><?php echo $title; ?></h3>
                <?php endif; ?>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>
            </div>

            <?php if (empty($image) === false) : ?>
                <span class="image">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                </span>
            <?php endif; ?>
        </div>

        <div class="form-wrap">
            <?php if (!is_admin() && empty($form_shortcode) === false) {
                echo do_shortcode($form_shortcode);
            } ?>

            <?php if (empty($form_text) === false) : ?>
                <p class="light"><?php echo $form_text; ?></p>
            <?php endif; ?>
        </div>

        <?php if (empty($review) === false) :
            $review_image = get_field('image', $review);
            $review_text = get_field('review_text', $review);
            $review_author = get_field('author', $review);
            $review_meta = get_field('meta', $review);
            ?>
            <div class="single-review">
                <?php if (empty($review_image) === false) : ?>
                    <span class="image">
                        <img src="<?php echo $review_image['sizes']['medium']; ?>"
                             alt="<?php echo $review_image['alt']; ?>">
                    </span>
                <?php endif; ?>

                <h4><?php echo get_the_title($review); ?></h4>

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
        <?php endif; ?>
    </div>
</section>
