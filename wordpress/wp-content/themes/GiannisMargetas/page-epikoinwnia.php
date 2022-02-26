<?php
get_header()
?>
<div class="container">
    <div class="header">
        <h1 class="section-header">Επικοινωνία</h1>
    </div>

    <div class="content">
        <form action="" method="">
            <div class="form-group">
                <input name="name" id="name" class="form-control-input" placeholder="Όνομα" required>
                <span class="span-error"></span>
            </div>
            <div class="form-group">
                <input name="mail" id="mail" class="form-control-input" placeholder="Email" required>
                <span class="span-error"></span>

            </div>
            <div class="form-group">
                <textarea rows="10" placeholder="Μύνημα" name="body" id="body" required></textarea>
                <span class="span-error"></span>

            </div>
            <div class="form-group" style="display: flex;justify-content: center;align-items: center">
                <button type="submit" class="form-control-submit-button ">Αποστολή</button>
            </div>
        </form>
    </div>
    <?php
    get_footer()
    ?>
</div>


