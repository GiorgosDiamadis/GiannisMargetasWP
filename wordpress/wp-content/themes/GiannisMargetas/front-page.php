<?php
get_header();
$id = get_option("page_on_front");
$carouselIds = get_post_meta($id, "carousel");
$carouselImgs = array();

foreach ($carouselIds as $carouselId) {
    $url = wp_get_attachment_url($carouselId);
    $caption = wp_get_attachment_caption($carouselId);

    array_push($carouselImgs, array('img' => $url, 'caption' => $caption));
//    var_dump($carouselImgs[0]['img']);
}
?>

<section class="container">
    <div class="carousel">
        <?php
        $i = 0;
        foreach ($carouselImgs as $carouselImg) {
            $current = $i == 0 ? '' : 'fade';
            $img = $carouselImg["img"];
            $caption = $carouselImg["caption"];
            echo "<div class='carousel-img $current'>
                       <img src='$img'/>
                       <p class='caption'>$caption</p>
                  </div> ";
            $i++;
        }
        ?>
    </div>

    <div class="header-content">
        <h1 class="onoma-kinimatos">Γιαννης Μαργετας</h1>
        <p>Υποψήφιος Δήμαρχος Ερμιονίδας</p>
        <button class="btn-primary"><a href="/biografiko">Ποιος Είμαι</a></button>
        <button class="btn-secondary"><a href="/arthra">Δημοσιεύσεις</a></button>

    </div>


    <div class="diakiriksi">
        <?php the_content(); ?>
    </div>
    <h1 class="section-header">Τελευταία Νέα</h1>
    <div class="posts grid" id="gridd">
        <?php
        global $wpdb;
        $sql = "select * from wp_posts where post_status='publish' and post_type='post' order by ID desc limit 3";
        $posts = $wpdb->get_results($sql);

        foreach ($posts as $post) {
            $title = $post->post_title;
            $id = $post->ID;
            $category = get_the_category($id)[0]->slug;

            $excerpt = get_the_excerpt($id);
            $img = wp_get_attachment_image_url(get_post_thumbnail_id($id), 'medium');
            $permalink = get_permalink($id);
            $imgElement = '';

            if ($img != null) {
                $imgElement = "<img src='$img' alt='' class='post-thumbnail'>";
            }

            $date = get_post_meta($id, "date")[0];
            $badge = "";

            if ($category == "xronomixani") {
                $badge = "<div class='badge-time'>Χρονομηχανή <i class='fa-solid fa-calendar-days'></i>$date</div>";
            }

            echo "<div class='post grid-item'>
                    <a href='$permalink'>
                        $badge
                        $imgElement
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

