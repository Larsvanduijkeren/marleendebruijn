<?php
$logos = get_field('logos');
$add_connector_arrow = get_field('add_connector_arrow');

$id = get_field('id');
?>

<section
    class="logos <?php if ($add_connector_arrow) {
        echo ' add-connector-arrow';
    } ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if (empty($add_connector_arrow) === false) : ?>
        <span class="connector"></span>
    <?php endif; ?>

    <div class="container">
        <?php if (empty($logos) === false) : ?>
            <div class="flex-wrapper" data-aos="fade-up">
                <?php foreach ($logos as $logo) : ?>
                    <?php if (empty($logo) === false) : ?>
                        <span class="image">
                            <img src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php echo $logo['alt']; ?>">
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
