<?php
$add_connector_arrow = get_field('add_connector_arrow');

$id = get_field('id');
?>

<section
    class="post-selection <?php
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
        <h1>Post selection</h1>
    </div>
</section>
