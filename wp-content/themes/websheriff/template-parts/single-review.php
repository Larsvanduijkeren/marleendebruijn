<?php
$id = get_field('id');
?>

<section
    class="single-review"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>single-review</h2>
    </div>
</section>
