<?php
if (!defined('IN_CMS')) { exit(); }

/**
* Form
* 
* Lets you create and display forms.
* 
* @author Nic Wortel <nd.wortel@gmail.com>
* 
* @file         /views/backend/settings.php
* @date         31/05/2012
*/

?>
<h1><?php echo __('Settings'); ?></h1>

<div id="form">

<form method="post" action="<?php echo get_url('plugin/form/settings'); ?>">
    <table cellspacing="5" cellpadding="5" border="0">
        <tr>
            <td><strong><?php echo __('Success message'); ?></strong></td>
            <td><textarea name="setting[success_message]"><?php echo $settings['success_message']; ?></textarea></td>
        </tr>
        <tr>
            <td><strong><?php echo __('Failure message'); ?></strong></td>
            <td><textarea name="setting[invalid_message]"><?php echo $settings['invalid_message']; ?></textarea></td>
        </tr>
        <tr>
            <td><strong><?php echo __('Error message'); ?></strong></td>
            <td><textarea name="setting[error_message]"><?php echo $settings['error_message']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <br />
                <input type="submit" name="save" value="<?php echo __('Save Settings'); ?>" />
            </td>
        </tr>
    </table>
</form>

</div>