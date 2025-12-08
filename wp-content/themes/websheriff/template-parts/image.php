<?php
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="image"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if (empty($image) === false) : ?>
            <img src="<?php echo $image['sizes']['full']; ?>" alt="<?php echo $image['alt']; ?>">
    <?php endif; ?>
</section>
