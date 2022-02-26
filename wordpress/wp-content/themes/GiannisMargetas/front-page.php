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
        <h1 class="onoma-kinimatos">Γιάννης Μαργέτας</h1>
        <p>Υποψήφιος Δήμαρχος</p>
        <button class="btn-primary"><a href="/biografiko">Ποιός Είμαι</a></button>
        <button class="btn-secondary"><a href="/artha">Δημοσιεύσεις</a></button>

    </div>

    <div class="diakiriksi">
        Συμπατριώτισσες, συμπατριώτες, ορμώμενος από την <span class="important">αγάπη</span>
        μου για τον τόπο μας, τον τόπο που γεννήθηκα και μεγάλωσα, έχοντας <span class="important">όραμα</span> για το
        μέλλον του και ύστερα από
        παροτρύνσεις συμπολιτών μας και συζητήσεις με πολλούς από εσάς, σας ενημερώνω ότι προτίθεμαι, στηριζόμενος στο
        δυναμισμό των ανθρώπων μας, να προχωρήσω σε συγκρότηση ανεξάρτητης Δημοτικής Παράταξης, προκειμένου να
        συμμετάσχουμε στις προσεχείς Δημοτικές Εκλογές. Η συνεργασία σας είναι απολύτως απαραίτητη και πολύτιμη. Σήμερα
        σ΄ ένα κόσμο που αλλάζει και το αρχαιοελληνικό « τα πάντα ρει» (Ηράκλειτος) λαμβάνει διαστημική ταχύτητα,
        απαιτείται, χωρίς καμία καθυστέρηση να λάβουμε <span class="important">πρωτοβουλίες</span> χρήσιμες για το Δήμο
        μας. Από την αρχαιότητα, από
        τον καιρό του Κλεισθένη που θεμελίωσε τον δήμο στην Αθήνα, η έννοια του θεσμού της Τοπικής Αυτοδιοίκησης είναι
        βαθειά ριζωμένη στην <span class="important">ψυχή</span> κάθε Έλληνα και συνέβαλε αποφασιστικά στη διατήρηση της
        εθνικής μας ταυτότητας. Η
        Τοπική Αυτοδιοίκηση σήμερα αποτελεί βασικό θεσμό του δημοκρατικού πολιτεύματος, γιατί διασφαλίζει στους πολίτες
        το δικαίωμα να συμμετέχουν ενεργά στη διοίκηση των τοπικών υποθέσεων, των υποθέσεων δηλαδή που αναφέρονται στις
        συνθήκες διαβίωσης των πολιτών και την ποιότητα της ζωής τους. Με άλλα λόγια, η οργάνωση και η λειτουργία της
        Τοπικής Αυτοδιοίκησης συνιστούν ουσιαστική εκδήλωση λαϊκής κυριαρχίας στις κρίσιμες εκφάνσεις του
        δημόσιου και του κοινωνικού βίου μας. Στόχος μου είναι ο Δήμος Ερμιονίδας να είναι φορέας <span
                class="important">δημοκρατίας</span>, να
        αναδειχθεί σε μοχλό κοινωνικών αλλαγών και να συμβάλει στην τοπική <span class="important">ανάπτυξη</span> της
        περιοχής μας, εκπληρώνοντας την
        αποστολή του έναντι της κοινωνίας και κερδίζοντας την καταξίωση που του αξίζει στη συνείδηση των πολιτών.
        Θέλουμε αυτοδιοίκηση της συμμετοχής, της οργάνωσης, της γνώσης, της αυτοτέλειας, της αναπτυξιακής δράσης και
        καινοτομίας και προσβλέπω στη δική σας υποστήριξη.

        <div class="usterografo">
            <p>Κρανίδι 15-02-2022.</p>
            <p>Με Τιμή,</p>
            <p><span class="important">Γιάννης Μαργέτας.</span></p>

        </div>

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

