<?php
get_header();
$id = get_the_ID();
$title = get_the_title();
?>


<section class="container">
    <div class="header">
        <h1 class="article-title"><?php echo get_the_title() ?></h1>
        <span class="date important"><?php echo get_the_date() ?></span>
        <br>
        <br>
        <a href="#comments"><span class="important comments"><?php comments_number() ?></span></a>

    </div>

    <div class="content">
<!--        <img class="post-img" src="--><?php //echo $img ?><!--" alt="">-->
        <?php the_content(); ?>
        <?php comments_template(); ?>
    </div>

    <?php get_footer() ?>
</section>
