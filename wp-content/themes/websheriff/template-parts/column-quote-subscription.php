<?php
$quotes = get_field('quotes');
$title = get_field('title');
$form_shortcode = get_field('form_shortcode');
$form_text = get_field('form_text');

$id = get_field('id');
?>

<section
    class="column-quote-subscription"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($quotes) === false) : ?>
            <div class="quotes">
                <?php foreach ($quotes as $quote) : ?>
                    <div class="quote">
                        <?php if (empty($quote['title']) === false) : ?>
                            <h3><?php echo $quote['title']; ?></h3>
                        <?php endif; ?>

                        <?php if (empty($quote['text']) === false) : ?>
                            <p><?php echo $quote['text']; ?></p>
                        <?php endif; ?>

                        <?php if (empty($quote['author']) === false) : ?>
                            <div class="author">
                                <?php echo $quote['author']; ?>

                                <?php if (empty($quote['meta']) === false) : ?>
                                    - <?php echo $quote['meta']; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="form-content">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($form['text']) === false) {
                echo $form['text'];
            } ?>

            <?php if (!is_admin() && empty($form_shortcode) === false) {
                echo do_shortcode($form_shortcode);
            } ?>
        </div>
    </div>
</section>
