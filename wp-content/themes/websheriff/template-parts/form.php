<?php
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
$form_shortcode = get_field('form_shortcode');
$form_text = get_field('form_text');

$id = get_field('id');
?>

<section
    class="form"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="flex-wrapper">
            <div class="content">
                <?php if (empty($title) === false) : ?>
                    <h2><?php echo $title; ?></h2>
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
                <p class="small"><?php echo $form_text; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
