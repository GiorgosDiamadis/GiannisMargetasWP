<?php
get_header();
$id = get_option("page_on_front");
$carouselIds = get_post_meta($id, "carousel");
$carouselImgs = array();

foreach ($carouselIds as $carouselId) {
    $url = wp_get_attachment_url($carouselId);
    array_push($carouselImgs, $url);
}
?>

<section class="container">
    <div class="carousel">
        <?php
        $i = 0;
        foreach ($carouselImgs as $carouselImg) {
            $current = $i == 0 ? '' : 'fade';
            echo "<img src='$carouselImg' class='carousel-img $current'/>";
            $i++;
        }
        ?>
    </div>

    <div class="header-content">
        <h1 class="onoma-kinimatos">Γιαννης Μαργετας</h1>
        <p>Υποψήφιος Δήμαρχος Ερμιονίδας</p>
        <button class="btn-primary"><a href="/biografiko">Ποιος Είμαι</a></button>
        <button class="btn-secondary"><a href="/artha">Δημοσιεύσεις</a></button>

    </div>


    <div class="diakiriksi">
        <?php the_content(); ?>
    </div>
    <h1 class="section-header">Τελευταία Νέα</h1>
    <div class="posts">
        <?php
        global $wpdb;
        $sql = "select * from wp_posts where post_status='publish' and post_type='post' order by ID desc limit 4 ";
        $posts = $wpdb->get_results($sql);

        foreach ($posts as $post) {
            $title = $post->post_title;
            $id = $post->ID;
            $excerpt = get_the_excerpt($id);
            $img = wp_get_attachment_image_url(get_post_thumbnail_id($id), 'medium');
            $permalink = get_permalink($id);
            echo "<div class='post'>
                    <a href='$permalink'>

                        <img src='$img' alt='' class='post-thumbnail'>
                        <p class='post-title' >$title</p>
                        
                        <div class='post-excerpt'>$excerpt</div>
                    </a>
                    <a href='$permalink' class='btn-anim'>
                        <span>Περισσοτερα</span> <i class='fa-solid fa-arrow-right'></i>
                    </a>
              </div>";
        }
        ?>


    </div>
    <button class="btn"><a href="<?php get_site_url() ?>/arthra">Περισσότερα άρθρα</a></button>

    <?php
    get_footer()
    ?>
</section>

