<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 * 
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 * 
 * @package     Plugins
 * @subpackage  form
 * 
 * @author      Nic Wortel <nic.wortel@nth-root.nl>
 * @copyright   Nic Wortel, 2012
 * @version     0.1.4
 */

if(!defined("FORM")) {
    define('FORM', PLUGINS_ROOT.'/form');
}
if(!defined("FORM_IMAGES")) {
    define('FORM_IMAGES', URL_PUBLIC.'wolf/plugins/form/images/');
}

Plugin::setInfos(array(
    'id'                    => 'form',
    'title'                 => __('Form'),
    'description'           => __('Lets you create and display forms.'),
    'author'                => 'Nic Wortel',
    'version'               => '0.1.4',
    'website'               => 'http://www.wolfcms.org/repository/111',
    'require_wolf_version'  => '0.7.4',
    'type'                  => 'backend'
));

AutoLoader::addFolder(FORM.'/models');

Plugin::addController('form', __('Forms'), 'form_builder_view', true);

function display_form($id, $html5 = false)
{
    if ($form = Form::findById($id)) {
        if (get_request_method() == 'POST') {
            if ($_POST['mellis'] == '') {
                (object) $data = $_POST['form'];
                if ($form->validate($data)) {
                    $subm_form = new SubmittedForm($form, $data);
                    
                    if ($subm_form->save()) {
                        echo Plugin::getSetting('success_message', 'form');
                    } else {
                        $form->values = $data;

                        echo Plugin::getSetting('error_message', 'form');
                        $form->display($html5);
                    }
                } else {
                    $form->values = $data;
                    
                    echo Plugin::getSetting('invalid_message', 'form');
                    $form->display($html5);
                }
            } else {
                echo Plugin::getSetting('invalid_message', 'form');
                $form->display($html5);
            }
        } else {
            $form->display($html5);
        }
    }
}

function form_field_types()
{
    $types = FormField::typesArray();
    
    foreach ($types as $key => $type) {
        $types[$key] = $type['label'];
    }
    
    return $types;
}