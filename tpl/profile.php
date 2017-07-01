<?php
$user instanceof GWF_User;
// $profile instanceof GWF_Profile;
$module = Module_Profile::instance();
?>
<md-card>
  <md-card-title>
    <md-card-title-text>
      <span class="md-headline"><?php l('card_title_profile', [$user->displayName()]); ?></span>
      <span class="md-subhead"><?php l('card_subtitle_profile', [tt($user->getRegisterDate())]); ?></span>
    </md-card-title-text>
  </md-card-title>
  <md-card-content layout="column" layout-align="space-between">
    <?php foreach ($module->getUserSettings() as $gdoType) : ?>
    <div>
      <label><?php echo $gdoType->displayLabel(); ?></label>
      <i><?php echo $gdoType->renderCell(); ?></i>
    </div>
    <?php endforeach; ?>
  </md-card-content>
  <md-card-actions layout="row" layout-align="end center">
    <?php echo GDO_Back::make()->renderCell(); ?>
  </md-card-actions>
</md-card>
