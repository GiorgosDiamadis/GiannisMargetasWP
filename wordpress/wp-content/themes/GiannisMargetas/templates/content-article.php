<div class="post grid-item">
    <?php
    $category = get_the_category()[0]->slug;

    $title = get_the_title();
    $id = get_the_ID();
    $excerpt = get_the_excerpt($id);
    $img = wp_get_attachment_image_url(get_post_thumbnail_id($id), 'medium');
    $permalink = get_permalink($id);
    ?>
    <a href='<?php echo $permalink ?>'>
        <?php
        $date = get_post_meta($id, "date")[0];
        if ($category == "xronomixani") {
            echo "<div class='badge-time'>Χρονομηχανή<i class='fa-solid fa-calendar-days'></i>$date</div>";
        }

        if ($img != null) {
            echo "<img src='$img' alt='' class='post-thumbnail'>";
        }
        ?>


        <p class='post-title'><?php echo $title ?></p>

        <div class='post-excerpt'><?php echo $excerpt ?></div>
    </a>
    <a href='<?php echo $permalink ?>' class='btn-anim'>
        <span>Περισσοτερα</span> <i class='fa-solid fa-arrow-right'></i>
    </a>
</div>