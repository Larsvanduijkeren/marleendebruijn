<?php
$id = get_field('id');
?>

<section
    class="text-columns"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>text-columns</h2>
    </div>
</section>
