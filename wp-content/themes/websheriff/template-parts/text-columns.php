<?php
$columns = get_field('columns');

$id = get_field('id');
?>

<section
    class="text-columns"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="content">
        <div class="flex-wrapper">
            <?php if (empty($columns) === false) : ?>
                <?php foreach ($columns as $column) : ?>
                    <div class="column" data-aos="fade-up">
                        <?php if (empty($column['title']) === false) : ?>
                            <h2><?php echo $column['title']; ?></h2>
                        <?php endif; ?>

                        <?php if (empty($column['text']) === false) {
                            echo $column['text'];
                        } ?>

                        <?php if (empty($column['button']) === false) {
                            echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $column['button']['url'], $column['button']['target'], $column['button']['title']);
                        } ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        </div>
    </div>
</section>
