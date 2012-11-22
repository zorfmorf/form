<?php
if (!defined('IN_CMS')) { exit(); }

/*
 * Form
 * 
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 * 
 * @package     Plugins
 * @subpackage  form
 * 
 * @author      Nic Wortel <nic.wortel@nth-root.nl>
 * @copyright   Nic Wortel, 2012
 * @version     0.1.1
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
            <td><strong><?php echo __('Copy message'); ?></strong></td>
            <td><textarea name="setting[copy_message]"><?php echo $settings['copy_message']; ?></textarea></td>
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