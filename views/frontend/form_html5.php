<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <?php foreach($form->fields as $field): ?>
    <div class="form-group">
		<label for="<?php echo $field->slug; ?>" class="<?php if ($field->required > 0): ?>required<?php endif; ?> <?php if (isset($form->errors[$field->slug])): ?>invalid<?php endif; ?>"><?php echo $field->label; ?></label></dt>
        <?php if ($field->type == 'text'): ?>
        <input class="form-control" type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'long_text'): ?>
        <textarea class="form-control" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if ($field->required > 0): ?> required="required"<?php endif; ?>><?php if (isset($form->values[$field->slug])) {echo $form->values[$field->slug];} ?></textarea>
        <?php endif; ?>
        
        <?php if ($field->type == 'number'): ?>
        <input class="form-control" type="number" pattern="[0-9\.\,]+" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'postcode'): ?>
        <input class="form-control" type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'email_address'): ?>
        <input class="form-control" type="email" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'phone_number'): ?>
        <input class="form-control" type="tel" pattern="^[0-9]{7,11}$" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'url'): ?>
        <input class="form-control" type="url" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?><?php if ($field->required > 0): ?> required="required"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'dropdown'): ?>
        <select class="form-control" name="form[<?php echo $field->slug; ?>]">
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
    </div>
    <?php endforeach; ?>

    <dt style="display: none"><label for="mellis"><?php echo __('Humans should leave this field empty'); ?></label></dt>
    <dd style="display: none"><input type="text" class="mellis" name="mellis" id="mellis" /></dd>

<button class="btn btn-default type="submit"><?php echo __('Submit'); ?></button>

</form>
