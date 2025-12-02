<?php
$id = get_field('id');
?>

<section
    class="scan"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>scan</h2>
    </div>
</section>
