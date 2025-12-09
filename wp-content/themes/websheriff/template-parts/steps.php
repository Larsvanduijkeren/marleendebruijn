<?php
$style = get_field('style');
$title = get_field('title');
$text = get_field('text');
$steps = get_field('steps');
$add_connector_arrow = get_field('add_connector_arrow');

$id = get_field('id');
?>

<section
    class="steps <?php echo $style;
    if ($add_connector_arrow) {
        echo ' add-connector-arrow';
    }
    if ($style === 'card') {
        echo ' grey';
    }
    if ($style === 'slider') {
        echo ' blue';
    }
    ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if (empty($add_connector_arrow) === false) : ?>
        <span class="connector"></span>
    <?php endif; ?>

    <div class="container">
        <?php if (empty($title) === false || empty($text) === false ) : ?>
            <div class="intro center" data-aos="fade-up">
                <h2><?php echo $title; ?></h2>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>
            </div>
        <?php endif; ?>

        <?php if (empty($steps) === false) : ?>
            <div class="steps-wrapper" data-aos="fade-up">
                <?php foreach ($steps as $key => $step) : ?>
                    <div class="step">
                        <span class="count">
                            <?php echo $key + 1; ?>
                        </span>

                        <?php if (empty($step['title']) === false) : ?>
                            <h4><?php echo $step['title']; ?></h4>
                        <?php endif; ?>

                        <?php if (empty($step['text']) === false) {
                            echo $step['text'];
                        } ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
