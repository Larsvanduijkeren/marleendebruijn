</main>

<?php
$footer_text = get_field('footer_text', 'option');
$footer_contact_information = get_field('footer_contact_information', 'option');
$footer_image = get_field('footer_image', 'option');
?>

<footer class='footer'>
    <div class='container'>
        <?php if (empty($footer_text) === false) : ?>
            <h4><?php echo $footer_text; ?></h4>
        <?php endif; ?>

        <div class="flex-wrapper">
            <div class="col">
                <?php if (empty($footer_contact_information) === false) {
                    echo $footer_contact_information;
                } ?>
            </div>

            <?php if (empty($footer_image) === false) : ?>
                <img src="<?php echo $footer_image['sizes']['large']; ?>" alt="<?php echo $footer_image['alt']; ?>">
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
