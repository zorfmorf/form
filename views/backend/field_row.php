<tr id="field-<?php echo $current_id; ?>" class="field""><?php
?><td><input name="form[fields][<?php echo $current_id; ?>][label]" type="text"<?php if(isset($field->label)): ?> value="<?php echo $field->label; ?>"<?php endif; ?> /></td><?php
?><td><select name="form[fields][<?php echo $current_id; ?>][type]"><?php foreach($types as $value => $type): ?><option value="<?php echo $value; ?>"<?php if (isset($field->type) && $field->type == $value): ?> selected="selected"<?php endif; ?>><?php echo $type; ?></option><?php endforeach; ?><?php
?></select></td><?php
?><td><input name="form[fields][<?php echo $current_id; ?>][options]" type="text"<?php if(isset($field->options)): ?> value="<?php $i = 0; foreach($field->options as $option) { echo $i > 0 ?  ';' . $option->label : $option->label; $i++; } ?>"<?php endif; ?> /></td><?php
?><td><input name="form[fields][<?php echo $current_id; ?>][required]" type="checkbox" value="1"<?php if (isset($field->required) && $field->required == 1): ?> checked="checked"<?php endif; ?> /></td><?php
?><td><a href="javascript:removeField(<?php echo $current_id; ?>)"><img width="16" height="16" src="<?php echo URL_PUBLIC; ?>wolf/icons/delete-16.png" align="middle" alt="<?php echo __('Delete'); ?>" /></a></td><?php
?></tr>