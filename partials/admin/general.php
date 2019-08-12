<?php
if ($_POST) {
    $general_options = array();

    foreach ($_POST as $key => $value) {
        $general_options[$key] = $value;
    }
    if (update_option('general_options', $general_options)){
        echo '<div id="message" class="updated notice notice-success is-dismissible"><p>Settings updated.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
    }
}
$result = get_option('general_options');
?>
<div class="wrap">
    <h1 class="wp-heading-inline">Social settings</h1>

    <form method="POST">
        <div class="form-group">
            <label for="tel1">Telephone 1:</label>
            <input type="tel" class="form-control" id="tel1" name="tel1" value="<?=$result['tel1'];?>">
            <label for="tel2">Telephone 2:</label>
            <input type="tel" class="form-control" id="tel2" name="tel2" value="<?=$result['tel2'];?>">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$result['email'];?>">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?=$result['address'];?>">
        </div>

        <div class="form-group">
            <label for="top_text">Top showreel text:</label>
            <input type="text" class="form-control" id="top_text" name="top_text" value="<?=$result['top_text'];?>">
        </div>
        <div class="form-group">
            <label for="bottom_text">Bottom showreel text:</label>
            <input type="text" class="form-control" id="bottom_text" name="bottom_text" value="<?=$result['bottom_text'];?>">
        </div>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>