<?php
$id = get_field('id');
?>

<section
    class="post-archive"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h1>Post archive</h1>
    </div>
</section>
