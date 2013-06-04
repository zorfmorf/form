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
 * @version     0.1.2
 */

class Form extends Record {
    const TABLE_NAME = 'form';
    
    public $id;
    public $name;
    public $mail_to;
    
    public $created_on;
    public $updated_on;
    public $created_by_id;
    public $updated_by_id;
    
    public $values = array();
    
    public function __construct() {
        if (!isset($this->fields)) {
            $this->fields = FormField::findByFormId($this->id);
        }
    }
    
    public function beforeDelete() {
        if (!FormField::deleteByFormId($this->id)) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function beforeInsert() {
        $this->created_on       = date('Y-m-d H:i:s');
        $this->created_by_id    = AuthUser::getRecord()->id;

        return true;
    }
    
    public function beforeSave() {
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->updated_by_id    = AuthUser::getRecord()->id;
        
        return true;
    }
    
    public function afterSave() {
        FormField::deleteByFormId($this->id);
        
        foreach($this->fields as $field_properties) {
            $form_field = new FormField();
            $form_field->setFromData($field_properties);
            $form_field->form_id = $this->id;
            
            if (trim($form_field->label) != '') {
                if (!$form_field->save()) {
                    return false;
                }
            }
            
            if (trim($form_field->options) != '') {
                $pos = 1;
                
                $options = explode(';', $form_field->options);
                foreach ($options as $option_label) {
                    $option = new FormFieldOption();
                    $option->label = $option_label;
                    $option->field_id = $form_field->id;
                    $option->position = $pos;
                    if (!$option->save()) {
                        return false;
                    }
                    
                    $pos++;
                }
            }
        }
        
        return true;
    }
    
    public function display($html5 = false) {
        if ($html5) {
            // display html5 version
            echo new View('../../plugins/form/views/frontend/form_html5', array(
                'form' => $this
            ));
        }
        else {
            // display html4 version
            echo new View('../../plugins/form/views/frontend/form_html', array(
                'form' => $this
            ));
        }
    }
    
    public function emails() {
        $emails = explode(';',$this->mail_to);
        
        return $emails;
    }
    
    public static function findAll() {
        return Record::findAllFrom('Form');
    }
    
    public static function findById($id) {
        return Record::findByIdFrom('Form', $id);
    }
    
    public function getColumns() {
        return array(
            'id', 'name', 'mail_to',
            'created_on', 'updated_on', 'created_by_id', 'updated_by_id'
        );
    }
    
    public function validate($data = false) {
        $fields = FormField::findByFormId($this->id);
        $data = (object) $data;
        $this->errors = array();
        
        $empty = true;
        
        foreach ($fields as $field) {
            $field_name = $field->slug;
            if (isset($data->$field_name)) {
                $value = $data->$field_name;
                
                if (is_string($value) && trim($value != '')) $empty = false;
            }
            else {
                $value = '';
            }
            
            if (!$field->validate($value)) {
                $this->errors[$field->slug] = $field->label;
            }
        }
        
        if (count($this->errors) > 0) {
            return false;
        }
        
        if ($empty) {
            return false;
        }
        
        return true;
    }
}