<?php
use GDO\Form\GDT_Enum;
$field instanceof GDT_Enum;
?>
<md-select
 ng-controller="GDOSelectCtrl"
 ng-model="selection"
 multiple="true"
 placeholder="<?= html($field->label); ?>"
 ng-init='multiple=true; selection=<?=json_encode($field->filterValue()); ?>;'
 ng-change="multiValueSelected('#fsel_<?= $field->name; ?>')">
  <?php foreach ($field->enumValues as $enumValue) : ?>
    <md-option value="<?= $enumValue; ?>"><?= t($enumValue); ?></md-option>
    <?php endforeach; ?>
  </md-select>
  <input
   class="n"
   type="hidden"
   id="fsel_<?= $field->name; ?>"
   value="<?= $field->displayVar(); ?>"
   name="f[<?= $field->name?>]" />
  <div class="gdo-error"><?= $field->error; ?></div>
</md-input-container>
