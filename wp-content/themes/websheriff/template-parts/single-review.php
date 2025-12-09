<?php
$size = get_field('size');
$image = get_field('image');
$review = get_field('review');

$id = get_field('id');
?>

<section
    class="single-review <?php echo $size;
    if ($size === 'small') {
        echo ' grey';
    } ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if ($size === 'small') : ?>
    <div class="container">
        <?php endif; ?>

        <?php if ($size !== 'small' && empty($image) === false) : ?>
            <span class="image">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
            </span>
        <?php endif; ?>

        <div class="content">
            <?php if ($size === 'small' && empty($image) === false) : ?>
                <span class="image"  data-aos="fade-up">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                </span>
            <?php endif; ?>

            <?php if (empty($review) === false) :
                $review_image = get_field('image', $review);
                $review_text = get_field('review_text', $review);
                $review_author = get_field('author', $review);
                $review_meta = get_field('meta', $review);
                ?>
                <div class="single-review"  data-aos="fade-up">

                    <h2><?php echo get_the_title($review); ?></h2>

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
        <?php if ($size === 'small') : ?>
    </div>
<?php endif; ?>
</section>
