<?php
$logos = get_field('logos');

$id = get_field('id');
?>

<section
    class="logos"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($logos) === false) : ?>
            <div class="grid">
                <?php foreach ($logos as $logo) : ?>
                    <?php if (empty($logo) === false) : ?>
                        <span class="logo">
                            <img src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php echo $logo['alt']; ?>">
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
