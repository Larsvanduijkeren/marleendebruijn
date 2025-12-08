<?php
$text_size = get_field('text_size');
$background = get_field('background');
$direction = get_field('direction');
$image = get_field('image');
$title = get_field('title');
$title_text = get_field('title_text');
$text = get_field('text');
$buttons = get_field('buttons');

$id = get_field('id');
?>

<section
    class="text <?php echo $background . ' ' . $direction . ' text-' . $text_size;
    if (empty($image) === false) {
        echo ' has-image';
    } ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($image) === false) : ?>
            <img  data-aos="fade-up" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
        <?php endif; ?>

        <div class="flex-wrapper">
            <div class="col" data-aos="fade-up">
                <?php if (empty($title) === false) : ?>
                    <h2><?php echo $title; ?></h2>

                    <?php if (empty($title_text) === false) {
                        echo $title_text;
                    } ?>
                <?php endif; ?>
            </div>
            <div class="content" data-aos="fade-up">
                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <?php if (empty($buttons) === false) : ?>
                    <?php foreach ($buttons as $button) : ?>
                        <?php if (empty($button['button']) === false) {
                            echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['button']['url'], $button['button']['target'], $button['button']['title']);
                        } ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
