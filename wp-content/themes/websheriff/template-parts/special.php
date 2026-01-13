<?php
    $courses = get_field('courses');
    $label = get_field('label');
    $title = get_field('title');
    $text = get_field('text');
    $availability_title = get_field('availability_title');
    $extra_text = get_field('extra_text');
    $button = get_field('button');
    $meta_text = get_field('meta_text');
    $image = get_field('image');
    
    $id = get_field('id');
?>
<section class="text purple forward vertical add-connector-arrow">
    <span class="connector"></span>

    <div class="container">
        <div class="content">
            <?php if (empty($label) === false) : ?>
                <span class="badge"><?php echo $label; ?></span>
            <?php endif; ?>
            
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="special light-purple">
    <div class="container">
        <div class="content">
            <?php if (empty($text) === false) {
                echo $text;
            } ?>
            
            <?php if (empty($availability_title) === false) : ?>
                <h3><?php echo $availability_title; ?></h3>
            <?php endif; ?>
            
            <?php if (empty($courses) === false) : ?>
                <div class="courses">
                    <?php foreach ($courses as $course) : ?>
                        <div class="course">
                            <div class="date">
                                <?php if (!empty($course['date'])) :
                                    
                                    // Parse ACF date (d/m/Y)
                                    $date = DateTime::createFromFormat('d/m/Y', $course['date']);
                                    
                                    // Dutch months
                                    $months_nl = [
                                        1 => 'jan', 2 => 'feb', 3 => 'mrt', 4 => 'apr',
                                        5 => 'mei', 6 => 'jun', 7 => 'jul', 8 => 'aug',
                                        9 => 'sep', 10 => 'okt', 11 => 'nov', 12 => 'dec',
                                    ];
                                    
                                    $day = $date->format('d');
                                    $month = $months_nl[(int)$date->format('n')];
                                    ?>

                                    <span class="day">
                                        <?php echo $day; ?>
                                    </span>

                                    <span class="month">
                                        <?php echo $month; ?>
                                    </span>
                                
                                <?php endif; ?>
                            </div>

                            <div class="info">
                                <?php if (empty($course['title']) === false) : ?>
                                    <strong><?php echo $course['title']; ?></strong>
                                <?php endif; ?>
                                
                                <?php if (empty($course['text']) === false) : ?>
                                    <p><?php echo $course['text']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if (empty($extra_text) === false) {
                echo $extra_text;
            } ?>
            
            <?php if (empty($button) === false) {
                echo sprintf('<div class="button-wrap"><a href="%s" target="%s" class="btn">%s</a></div>', $button['url'], $button['target'], $button['title']);
            } ?>
            
            <?php if (empty($meta_text) === false) : ?>
                <div class="meta">
                    <?php echo $meta_text; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (empty($image) === false) : ?>
            <span class="image">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
            </span>
        <?php endif; ?>
    </div>
</section>
