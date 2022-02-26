<div class="post">
    <?php
    $title = get_the_title();
    $id = get_the_ID();
    $excerpt = get_the_excerpt($id);
    $img = wp_get_attachment_image_url(get_post_thumbnail_id($id), 'medium');
    $permalink = get_permalink($id);
    ?>
    <a href='<?php echo $permalink ?>'>

        <img src='<?php echo $img ?>' alt='' class='post-thumbnail'>
        <p class='post-title'><?php echo $title ?></p>

        <div class='post-excerpt'><?php echo $excerpt ?></div>
    </a>
    <a href='<?php echo $permalink ?>' class='btn-anim'>
        <span>Περισσοτερα</span> <i class='fa-solid fa-arrow-right'></i>
    </a>
</div>