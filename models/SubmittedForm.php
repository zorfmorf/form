<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

class SubmittedForm
{
    public $form;
    public $submitted_fields;
    
    public function __construct($form, $data)
    {
        $this->form = $form;
        $this->data = $data;
        $this->submitted_fields = $data;
    }
    
    public function save()
    {
		$errors = 0;
		
        $nr = $this->data['patientennummer'];
        $name = $this->data['name'];
        $email = $this->data['email'];
        $anfrage = $this->data['anfrage'];
        $text = $this->data['text'];
        
        if (isset($nr) && isset($name) && isset($email) && isset($anfrage) && isset($text))
        {
			save_new_patient_record($nr, $name, $email, $anfrage, $text);
		}
		else
		{
			$errors++;
		}
        
        if ($errors > 0) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function validate()
    {
        if ($this->form instanceof Form and is_array($submitted_fields)) {
            return $this->form->validate($submitted_fields);
        }
    }
}
