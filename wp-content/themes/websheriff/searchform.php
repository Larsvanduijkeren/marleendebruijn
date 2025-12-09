<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div>

    <input
        type="text"
        id="s"
        class="search-input"
        placeholder="Wat zoek je?"
        value="<?php echo esc_attr(get_search_query()); ?>"
        name="s"
        autocomplete="off"
    />

    <input type="submit" class="search-submit" value="Zoeken">
    </input>
    </div>
</form>
