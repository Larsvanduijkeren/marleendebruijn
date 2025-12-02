<?php
$id = get_field('id');
?>

<section
    class="form-image
"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>form-image
        </h2>
    </div>
</section>
