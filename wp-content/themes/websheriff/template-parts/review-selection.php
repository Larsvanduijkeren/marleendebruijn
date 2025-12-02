<?php
$id = get_field('id');
?>

<section
    class="review-selection"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>review-selection</h2>
    </div>
</section>
