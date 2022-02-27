<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    if (is_singular()) wp_enqueue_script('comment-reply');
    wp_head();
    global $wp;
    $currentUrl = home_url(add_query_arg(array(), $wp->request));
    ?>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Γιάννης Μαργέτας">
    <meta name="keywords" content="Μαργέτας, Γιάννης Μαργέτας, Ερμιονίδα, Εκλογές">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>

</head>
<body>
<div class="container">
    <nav class="navbar">
        <p class="logo">
            <a href="Index" style="color:white;">
                Γιάννης Μαργέτας
            </a>

        </p>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="<?php get_site_url() ?>/">Αρχική</a>
            </li>
            <li class="nav-item">
                <a href="<?php get_site_url() ?>/arthra">Δημοσιεύσεις</a>
            </li>
            <li class="nav-item">
                <a href="<?php get_site_url() ?>/biografiko">Ποιος Είμαι</a>
            </li>
            <li class="nav-item">
                <a href="<?php get_site_url() ?>/epikoinwnia">Επικοινωνία</a>
            </li>
            <li class="nav-item nav-btn">
                <a href="https://www.facebook.com/profile.php?id=100064610224607" target="_blank">Facebook</a>
            </li>
            <li class="nav-item nav-btn">
                <a href="https://www.instagram.com/giannesmargetas/" target="_blank">Instagram</a>
            </li>
        </ul>
        <div class="hamburger"></div>
    </nav>
    <div class="social">
        <div class="social-toggle">
            <i class="fas fa-share-alt"></i>
        </div>
        <div class="social-icon facebook" data-href="https://developers.facebook.com/docs/plugins/"
             data-layout="button">
            <a target="_blank"
               href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl ?>&amp;src=sdkpreparse">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
        <div class="social-icon gmail">
            <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=target@email.com" target="_blank">
                <i class="fab fa-google"></i>
            </a>
        </div>
        <div class="social-icon mail">
            <a href="mailto:info@example.com">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>
</div>
