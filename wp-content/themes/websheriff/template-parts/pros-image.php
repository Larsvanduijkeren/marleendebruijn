<?php
$title = get_field('title');
$pros = get_field('pros');
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="pros-image"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="card" data-aos="fade-up">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($pros) === false) : ?>
                <?php foreach ($pros as $pro) : ?>
                    <div class="pro">
                        <?php if (empty($pro['text']) === false) {
                            echo $pro['text'];
                        } ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if (empty($image) === false) : ?>
        <span class="image" data-aos="fade-up">
            <img src="<?php echo $image['sizes']['full']; ?>" alt="<?php echo $image['alt']; ?>">
        </span>
    <?php endif; ?>
</section>
