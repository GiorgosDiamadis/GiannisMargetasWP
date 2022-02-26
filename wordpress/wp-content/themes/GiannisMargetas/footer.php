<div class="footer-container" style="margin-top: 8em">
    <ul class="footer-ul">
        <li style="text-align: center">
            <a class="onoma-kinimatos" asp-action="Index" asp-controller="Home">
                Γιάννης Μαργέτας
            </a>
        </li>
    </ul>
    <ul class="footer-ul">
        <h1 style="color: white">Χρήσιμοι σύνδεσμοι</h1>

        <li>
            <a href="<?php get_site_url() ?>/">Αρχικη</a>
        </li>
        <li>
            <a href="<?php get_site_url() ?>/arthra">Δημοσιεύσεις</a>
        </li>
        <li>
            <a href="<?php get_site_url() ?>/biografiko">Βιογραφικό</a>
        </li>
        <li>
            <a href="<?php get_site_url() ?>/epikoinwnia">Επικοινωνία</a>
        </li>
        <li>
            <a href="<?php get_site_url() ?>/privacy-policy">Πολιτική Απορρήτου</a>
        </li>
    </ul>
    <ul class="footer-ul">
        <h1 style="color: white">Τελευταία</h1>
        <?php
        global $wpdb;
        $sql = "select * from wp_posts where post_status='publish' and post_type='post' order by ID desc limit 4 ";
        $posts = $wpdb->get_results($sql);


        foreach ($posts as $post) {
            $title = $post->post_title;
            $id = $post->ID;
            $img = wp_get_attachment_image_url(get_post_thumbnail_id($id), 'thumbnail');
            $permalink = get_permalink($id);

            echo "<li>
                    <a href='$permalink'>
                        <p class='post-title' >$title</p>
                    </a></li>
              ";
        }
        ?>

    </ul>
    <ul class="footer-ul">
        <h1 style="color: white">Social Media</h1>

        <li>
            <a target="_blank" href="https://www.facebook.com/profile.php?id=100064610224607">Facebook</a>
        </li>
        <li>
            <a target="_blank" href="/https://www.instagram.com/giannesmargetas/">Instagram</a>
        </li>
    </ul>
</div>
<div class="copyright">
    <p>Copyright Giannis Margetas | Made by Diamadis Giorgos</p>
</div>
<?php wp_footer(); ?>
</body>
</html>