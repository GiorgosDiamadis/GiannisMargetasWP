<?php
get_header();
?>

<section class="container">
    <div class="header">
        <h1 class="section-header">Δημοσιεύσεις</h1>

    </div>
    <div class="posts">

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part("templates/content", "article");
            }
        }
        ?>
    </div>

    <?php the_posts_pagination();?>
    <?php get_footer() ?>
</section>

