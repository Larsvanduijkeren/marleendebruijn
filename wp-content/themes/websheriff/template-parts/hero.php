<?php
$order = get_field('order');
$color = get_field('color');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="hero <?php echo $order . ' ' . $color; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="content">
            <?php if (empty($title) === false) : ?>
                <h1><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php if (empty($text) === false) : ?>
                <p><?php echo $text; ?></p>
            <?php endif; ?>

            <?php if (empty($button) === false) {
                $class = '';

                if($color === 'dark-blue') {
                    $class = 'white';
                }

                echo sprintf('<a href="%s" target="%s" class="btn-ghost %s">%s</a>', $button['url'], $button['target'], $class, $button['title']);
            } ?>
        </div>
    </div>

    <?php if (empty($image) === false) : ?>
        <span class="image">
            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
        </span>
    <?php endif; ?>
</section>
