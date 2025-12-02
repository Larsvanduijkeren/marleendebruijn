<?php
$id = get_field('id');
?>

<section
    class="pros-image"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>pros-image</h2>
    </div>
</section>
