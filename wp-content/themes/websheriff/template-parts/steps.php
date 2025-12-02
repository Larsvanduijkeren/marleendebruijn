<?php
$id = get_field('id');
?>

<section
    class="step"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>step</h2>
    </div>
</section>
