<?php
if ($_POST) {
    $general_options = array();

    foreach ($_POST as $key => $value) {
        $general_options[$key] = ($value);
    }
    if (update_option('general_options', $general_options)){
        echo '<div id="message" class="updated notice notice-success is-dismissible"><p>Settings updated.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
    }
}
$result = get_option('general_options');
?>
<div class="wrap">
    <h1 class="wp-heading-inline">General settings</h1>

    <form method="POST">
        <div class="form-group">
            <label for="phone">Main phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?=stripslashes($result['phone']);?>">
        </div>

        <div class="form-group">
            <label for="email">Main E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=stripslashes($result['email']);?>">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="30" rows="10"><?=stripslashes($result['address']);?></textarea>
        </div>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>