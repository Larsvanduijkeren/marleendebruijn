<?php
$alignment = get_field('alignment');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$form_shortcode = get_field('form_shortcode');
$form_text = get_field('form_text');
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="form-image <?php echo $alignment; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if (empty($image) === false) : ?>
        <span class="image">
            <img src="<?php echo $image['sizes']['full']; ?>" alt="<?php echo $image['alt']; ?>">
        </span>
    <?php endif; ?>
    <div class="container">
        <div class="content">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($text) === false) {
                echo $text;
            } ?>

            <?php if (empty($button) === false) {
                echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['url'], $button['target'], $button['title']);
            } ?>

            <?php if (!is_admin() && empty($form_shortcode) === false) {
                echo do_shortcode($form_shortcode);
            } ?>

            <?php if (empty($form_text) === false) {
                echo $form_text;
            } ?>
        </div>
    </div>
</section>
