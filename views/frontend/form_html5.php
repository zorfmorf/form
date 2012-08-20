<style>
form dt, form dd {
    display: block;
    padding: 0 0 7px;
}

form dt {
    clear: left;
    float: left;
    overflow: hidden;
    width: 160px;
}

form dd {
    float: left;
    margin-left: 5px;
}

label.required {
    font-weight: bold;
}

label.required:after {
    content: ' *';
}

label.invalid {
    color: #f00;
}

button {
    display: block;
    clear: both;
}
</style>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<dl>
    <?php foreach($form->fields as $field): ?>
    <dt><label for="<?php echo $field->slug; ?>" class="<?php if ($field->required > 0): ?>required<?php endif; ?> <?php if (isset($form->errors[$field->slug])): ?>invalid<?php endif; ?>"><?php echo $field->label; ?></label></dt>
    <dd>
        <?php if ($field->type == 'text'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'long_text'): ?>
        <textarea name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if ($field->required > 0): ?> required="required"<?php endif; ?>><?php if (isset($form->values[$field->slug])) {echo $form->values[$field->slug];} ?></textarea>
        <?php endif; ?>
        
        <?php if ($field->type == 'number'): ?>
        <input type="number" pattern="[0-9\.\,]+" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'postcode'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'email_address'): ?>
        <input type="email" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'phone_number'): ?>
        <input type="tel" pattern="^[0-9]{7,11}$" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'url'): ?>
        <input type="url" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'dropdown'): ?>
        <select name="form[<?php echo $field->slug; ?>]">
        <?php foreach ($field->options as $option): ?>
        <option value="<?php echo $option->label; ?>"<?php if (isset($form->values[$field->slug]) && $form->values[$field->slug] == $option->label): ?> selected="selected"<?php endif; ?>><?php echo $option->label; ?></option>
        <?php endforeach; ?>
        </select>
        <?php endif; ?>
        
        <?php if ($field->type == 'checkboxes'): ?>
        <?php foreach ($field->options as $option): ?>
        <input type="checkbox" name="form[<?php echo $field->slug; ?>][<?php echo $option->slug; ?>]" id="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>" value="<?php echo $option->label; ?>"<?php if (isset($form->values[$field->slug][$option->slug])): ?> checked="checked"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> /> <label for="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>"><?php echo $option->label; ?></label>
        <?php endforeach; ?>
        <?php endif; ?>
        
        <?php if ($field->type == 'radio_buttons'): ?>
        <?php foreach ($field->options as $option): ?>
        <input type="radio" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>" value="<?php echo $option->label; ?>"<?php if (isset($form->values[$field->slug]) && $form->values[$field->slug] == $option->label): ?> checked="checked"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> /> <label for="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>"><?php echo $option->label; ?></label>
        <?php endforeach; ?>
        <?php endif; ?>
    </dd>
    <?php endforeach; ?>
</dl>

<button type="submit"><?php echo __('Submit'); ?></button>

</form>