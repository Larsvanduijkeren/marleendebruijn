<?php
$id = get_field('id');
?>

<section
    class="bullets-image-card"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>bullets-image-card</h2>
    </div>
</section>
