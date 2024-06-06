<?php
/**
 * Front page
 */

get_header();

AVB::avb_banners(); ?>

<div class="ticker-container">
    <div class="ticker-static">
        <p style="text-align: center;">ANNOUNCEMENT: OUR NEW WEBSITE HAS LAUNCHED!</p>
    </div>
</div>

<?php global $post;

FC_Helpers::flexible_content();

get_footer(); ?>