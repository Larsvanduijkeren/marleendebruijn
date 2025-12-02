<?php
$id = get_field('id');
?>

<section
    class="image"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>image</h2>
    </div>
</section>
