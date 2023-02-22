<?php
/* The template for displaying all single posts */

get_header();
?>

<style>
    .single__main {
        min-height: calc(100% - 65px);;
        display: flex;
        flex-direction: column;
    }
    .single__wrapper {
        padding: 10% 5% 0;
        flex-grow: 1;
    }
    .comments{
        padding-top: 50px;
    }
</style>

<main id="primary" class="single__main">
    <div class="single__wrapper">
        <?php the_post(); have_posts(); ?>
        
        <?php the_content(); ?>
        
        <div class="comments">
            <?php comments_template(); ?>
        </div>
    </div>
</main>
<?php gt_set_post_view(); ?>
<?php

get_footer();