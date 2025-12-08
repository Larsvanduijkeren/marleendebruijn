<?php
$background = get_field('background');
$order = get_field('order');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="text-image <?php echo $background . ' ' . $order; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($title) === false) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>

        <div class="flex-wrapper">
            <div class="content">
                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <?php if (empty($button) === false) {
                    echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['url'], $button['target'], $button['title']);
                } ?>
            </div>

            <?php if (empty($image) === false) : ?>
                <span class="image">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                </span>
            <?php endif; ?>
        </div>
    </div>
</section>
