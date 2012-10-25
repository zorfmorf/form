<?php
if (!defined('IN_CMS')) { exit(); }

/**
* Catalog
* 
* Plugin for displaying articles or products that can be bought at different sellers.
* 
* @author Nic Wortel <nd.wortel@gmail.com>
* 
* @file        /views/backend/sidebar.php
* @date        13/10/2011
*/

?>
<p class="button">
    <a href="<?php echo get_url("plugin/form"); ?>">
        <img width="32" height="32" src="<?php echo URL_PUBLIC; ?>wolf/icons/file-php-32.png" align="middle" alt="<?php echo __('Forms'); ?>" />
        <?php echo __('Forms'); ?>
    </a>
</p>
<p class="button">
    <a href="<?php echo get_url("plugin/form/add"); ?>">
        <img width="32" height="32" src="<?php echo URL_PUBLIC; ?>wolf/icons/add-32.png" align="middle" alt="<?php echo __('Add form'); ?>" />
        <?php echo __('Add form'); ?>
    </a>
</p>
<p class="button">
    <a href="<?php echo get_url("plugin/form/settings"); ?>">
        <img width="32" height="32" src="<?php echo URL_PUBLIC; ?>wolf/icons/settings-32.png" align="middle" alt="<?php echo __('Settings'); ?>" />
        <?php echo __('Settings'); ?>
    </a>
</p>
<div class="box">
    <h2><?php echo __('Form plugin'); ?></h2>
    <p><?php echo __('The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.'); ?></p>
</div>
<div class="box">
    <h2><?php echo __('How to use'); ?></h2>
    <p>1. <?php echo __('After enabling the Form plugin, you can click the Settings button to change the messages that are shown after submitting the form.'); ?></p>
    <p>2. <?php echo __('To create a new form, click on the Add form button.'); ?></p>
    <p>3. <?php echo __("Fill in the 'Form name' and 'Mail results to' fields, and create one or more form fields. Save the form."); ?></p>
    <p>4. <?php echo __('Use the following piece of PHP code in the page were you want to include the form:'); ?></p>
    <p><code>&lt;?php display_form(id); ?&gt;</code></p>
    <p><?php echo __("Don't forget to replace id with the id of your form!"); ?></p>
    <p><?php echo __("Do you want a HTML5 compliant form? Use the following code:"); ?></p>
    <p><code>&lt;?php display_form(id, true); ?&gt;</code></p>
</div>