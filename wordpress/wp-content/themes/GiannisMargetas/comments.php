<div class="comments-wrapper">

    <div class="comments" id="comments">
        <div class="comments-header">
<!--            <h2 style="font-size: revert" class="section-header comment-reply-title">-->
<!--                --><?php
//                if (!have_comments()) {
//                    echo "Αφήστε ένα σχόλιο";
//                } else {
//                    comments_number();
//                }
//                ?>
<!--            </h2>-->
        </div>
    </div>
    <div class="comments-inner">
        <?php wp_list_comments(
            array('max-depth' => 3,
                'avatar_size' => 120,
                "style" => 'div')
        ) ?>

    </div>

    <?php
    if (comments_open()) {
        comment_form(array(
            'class_form' => '',
            'title_reply_before' => '<h1 style="font-size: revert" class="section-header">',
            'title_reply_after' => '</h1>'
        ));
    }
    ?>

</div>