<?php
if (!defined('IN_CMS')) { exit(); }

/**
* Form
* 
* Lets you create and display forms.
* 
* @author Nic Wortel <nd.wortel@gmail.com>
* 
* @file         /index.php
* @date         31/05/2012
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
    'version'               => '0.1.1',
    'website'               => 'http://www.wolfcms.org/repository/111',
    'require_wolf_version'  => '0.7.5',
    'type'                  => 'backend'
));

AutoLoader::addFolder(FORM.'/models');

Plugin::addController('form', __('Forms'), 'form_builder_view', true);

function display_form($id) {
    if ($form = Form::findById($id)) {
        if (get_request_method() == 'POST') {
            (object) $data = $_POST['form'];
            if ($form->validate($data)) {
                use_helper('Email');
                
                $email_body = '';
                
                $email_body .= "<table style=\"font: 12px/18px 'Arial','Helvetica',sans-serif;\">";
                foreach($data as $label => $value)
                {
                    $email_body .= '<tr><th style="text-align: left; vertical-align: top; white-space:nowrap;">'.ucfirst($label).':</th><td style="text-align: left; vertical-align: top;">'.nl2br($value)."</td></tr>";
                }
                $email_body .= '</table>';
                
                $email = new Email(array('mailtype' => 'html'));
                
                $email->from(Setting::get('admin_email'), Setting::get('admin_title'));
                $email->to($form->mail_to);
                $email->subject($form->name);
                $email->message($email_body);
                
                if($email->send()) {
                    echo Plugin::getSetting('success_message', 'form');
                }
                else {
                    $form->values = $data;
                    
                    echo Plugin::getSetting('error_message', 'form');
                    echo new View('../../plugins/form/views/frontend/form_html', array(
                        'form' => $form
                    ));
                }
            }
            else {
                $form->values = $data;
                
                echo Plugin::getSetting('invalid_message', 'form');
                echo new View('../../plugins/form/views/frontend/form_html', array(
                    'form' => $form
                ));
            }
        }
        else {
            echo new View('../../plugins/form/views/frontend/form_html', array(
                'form' => $form    
            ));
        }
        
    }
}

function form_field_types() {
    $types = FormField::typesArray();
    
    foreach ($types as $key => $type) {
        $types[$key] = $type['label'];
    }
    
    return $types;
}