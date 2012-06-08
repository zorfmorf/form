<?php
if (!defined('IN_CMS')) { exit(); }

/**
* Form
* 
* Lets you create and display forms.
* 
* @author Nic Wortel <nd.wortel@gmail.com>
* 
* @file         /views/backend/forms.php
* @date         31/05/2012
*/

?>
<h1><?php echo __('Forms'); ?></h1>

<div id="form">
    <table id="forms" class="forms list">
        <tr>
            <th class="num"><?php echo __('ID'); ?></th>
            <th class="fill"><?php echo __('Form name'); ?></th>
            <th class="icon"><?php echo __('Delete'); ?></th>
        </tr>
    <?php foreach($forms as $form): ?>
        <tr>
            <td class="num"><?php echo $form->id; ?></td>
            <td class="fill"><a href="<?php echo get_url('plugin/form/edit', $form->id); ?>"><?php echo $form->name; ?></a></td>
            <td class="icon">
                <?php if (AuthUser::hasPermission('form_delete')): ?>
                    <a href="<?php echo get_url('plugin/form/delete', $form->id); ?>" onclick="return confirm('<?php echo __('Are you sure you wish to delete the form :name?', array(':name' => $form->name)); ?>');">
                        <img width="16" height="16" src="<?php echo URI_PUBLIC;?>wolf/icons/delete-16.png" alt="<?php echo __('Delete'); ?>" title="<?php echo __('Delete'); ?>" />
                    </a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>