<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="s">
        <span class="screen-reader-text"><?php echo _x('Searching for anything?', 'label', 'custom'); ?></span>
    </label>
    <div class="input-group">
        <input class="input-group-field search-field" id="s" type="search" placeholder="Write something..."
               value="<?php echo get_search_query(); ?>" name="s">
        <div class="input-group-button">
            <button type="submit" class="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>