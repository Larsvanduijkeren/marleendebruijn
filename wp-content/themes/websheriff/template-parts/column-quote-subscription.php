<?php
$quotes = get_field('quotes');
$title = get_field('title');
$form_shortcode = get_field('form_shortcode');
$form_text = get_field('form_text');

$id = get_field('id');
?>

<section
    class="column-quote-subscription purple"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($quotes) === false) : ?>
            <div class="reviews" data-aos="fade-up">
                <?php foreach ($quotes as $review) :
                    $review_id = $review;
                    $review_text = get_field('review_text', $review_id);
                    $review_author = get_field('author', $review_id);
                    $review_meta = get_field('meta', $review_id);
                    ?>
                    <div class="single-review">
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

        <div class="form-content" data-aos="fade-up">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($form['text']) === false) {
                echo $form['text'];
            } ?>

            <?php if (!is_admin() && empty($form_shortcode) === false) {
                echo do_shortcode($form_shortcode);
            } ?>
        </div>
    </div>
</section>
