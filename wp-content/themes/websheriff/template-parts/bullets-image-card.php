<?php
$title = get_field('title');
$bullets = get_field('bullets');
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="bullets-image-card"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="card">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <div class="flex-wrapper">
                <?php if (empty($bullets) === false) : ?>
                    <div class="bullets">
                        <?php foreach ($bullets as $bullet) : ?>
                            <div class="bullet">
                                <?php if (empty($bullet['text']) === false) {
                                    echo $bullet['text'];
                                } ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (empty($image) === false) : ?>
                    <span class="image">
                        <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
