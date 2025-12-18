<?php
get_header();
$post = get_the_id();
$featured_image = get_the_post_thumbnail_url($post, 'full');
$thumbnail_id = get_post_thumbnail_id($post);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

$categories = get_the_category(get_the_id());

$text_blocks = get_field('text_blocks', 'option');
$single_post_sidebar_cards = get_field('single_post_sidebar_cards', 'option');
$author = get_post_field('post_author', get_the_id());
?>

    <section class="blue text vertical add-connector-arrow">
        <div class="container">
            <span class="connector"></span>
            <div class="content" data-aos="fade-up">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
    </section>

    <section class="post-content">
        <div class="container">
            <div class="content" data-aos="fade-up">
                <?php if (empty($featured_image) === false) : ?>
                    <span class="image">
                        <img src="<?php echo $featured_image; ?>" alt="<?php echo $alt; ?>">
                    </span>
                <?php endif; ?>

                <?php echo the_content(); ?>
            </div>
        </div>
        </div>
    </section>

<?php
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'post_date',
    'order'          => 'desc',
    'post__not_in'   => [get_the_id()],
];

$query = new WP_Query($args);
$posts = $query->posts;
?>

    <section
        class="post-selection grey"
        id="<?php if (empty($id) === false) {
            echo $id;
        } ?>"
    >
        <div class="container">
            <div class="intro center" data-aos="fade-up">
                <h2>Meer lezen? Vooruit.</h2>
            </div>

            <div class="post-grid">
                <?php if (empty($posts) === false) :
                    foreach ($posts as $post) :
                        $featured_image = get_the_post_thumbnail_url($post, 'large');
                        $thumbnail_id = get_post_thumbnail_id($post);
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        $author_id = $post->post_author;
                        ?>

                        <div data-aos="fade-up" class="single-post">
                            <?php if (empty($featured_image) === false) : ?>
                                <span class="image">
                                    <img src="<?php echo $featured_image; ?>"
                                         alt="<?php echo $alt; ?>">
                                </span>
                            <?php endif; ?>

                            <div class="content">
                                <h3><?php echo get_the_title($id); ?></h3>

                                <div class="time-to-read"><?php echo get_reading_time($post); ?> minuten leestijd</div>

                                <p><?php echo get_the_excerpt(); ?></p>

                                <a href="<?php echo get_the_permalink($id); ?>" class="btn-text">Lees verder</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php if (empty($text_blocks) === false) : ?>
    <?php foreach ($text_blocks as $text_block) :
        $text_size = $text_block['text_size'];
        $background = $text_block['background'];
        $direction = $text_block['direction'];
        $image = $text_block['image'];
        $device_screenshots = $text_block['device_screenshots'];
        $title = $text_block['title'];
        $title_text = $text_block['title_text'];
        $text = $text_block['text'];
        $buttons = $text_block['buttons'];
        $add_connector_arrow = $text_block['add_connector_arrow'];
        ?>


        <section
            class="text <?php echo $background . ' ' . $direction . ' text-' . $text_size;
            if (empty($image) === false) {
                echo ' has-image';
            }
            if ($add_connector_arrow) {
                echo ' add-connector-arrow';
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
                <?php if (empty($image) === false) : ?>
                    <img data-aos="fade-up" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php endif; ?>

                <div class="flex-wrapper">
                    <?php if (empty($title) === false || empty($title_text) === false) : ?>
                        <div class="col" data-aos="fade-up">
                            <?php if (empty($title) === false) : ?>
                                <h2><?php echo $title; ?></h2>

                                <?php if (empty($title_text) === false) {
                                    echo $title_text;
                                } ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="content" data-aos="fade-up">
                        <?php if (empty($text) === false) {
                            echo $text;
                        } ?>

                        <?php if (empty($device_screenshots) === false) : ?>
                            <div class="devices">
                                <?php foreach ($device_screenshots as $screenshot) : ?>
                                    <?php if (empty($screenshot) === false) : ?>
                                        <span class="image">
                                            <img src="<?php echo $screenshot['sizes']['large']; ?>"
                                                 alt="<?php echo $screenshot['alt']; ?>">
                                        </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (empty($buttons) === false) : ?>
                            <?php foreach ($buttons as $button) : ?>
                                <?php if (empty($button['button']) === false) {
                                    echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['button']['url'], $button['button']['target'], $button['button']['title']);
                                } ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<?php
get_footer();

