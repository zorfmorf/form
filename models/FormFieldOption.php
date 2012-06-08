<?php
if (!defined('IN_CMS')) { exit(); }

/**
* Form Builder
* 
* Lets you create and display forms.
* 
* @author Nic Wortel <nd.wortel@gmail.com>
* 
* @file         /models/FormField.php
* @date         31/05/2012
*/

class FormFieldOption extends Record {
    const TABLE_NAME = 'form_field_option';
    
    public $id;
    public $label;
    public $slug;
    public $field_id;
    public $position;
    
    public function beforeSave() {
        $this->slug = Node::toSlug($this->label);
        
        return true;
    }
    
    public static function deleteByFieldId($field_id) {
        $field_id = (int) $field_id;
        
        $form_field_options = self::findByFieldId($field_id);
        
        if (is_array($form_field_options)) {
            foreach ($form_field_options as $form_field_option) {
                if (!$form_field_option->delete()) {
                    return false;
                }
            }
        }
        elseif ($form_field_options instanceof FormFieldOption) {
            if (!$form_field_options->delete()) {
                return false;
            }
        }
        
        return true;
    }
    
    public static function deleteByFormId($form_id) {
        $form_id = (int) $form_id;
        
        $fields = FormField::findByFormId($form_id);
        
        foreach ($fields as $field) {
            FormFieldOption::deleteByFieldId($field->id);
        }
    }
    
    public static function findByFieldId($id) {
        $id = (int) $id;
        
        return Record::findAllFrom('FormFieldOption', 'field_id = ' . $id . ' ORDER BY position ASC, id ASC');
    }
}