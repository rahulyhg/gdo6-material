<?php /** @var $page \GDO\UI\GDT_Page **/
use GDO\Core\Website;
use GDO\Util\Javascript;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Icon;
use GDO\Core\Module_Core;
?>
<!DOCTYPE html>
<html>
  <head>
    <? Website::displayMeta(); ?>
    <?= Website::displayLink(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow" />
  </head>
  <body ng-app="gdo6-material" layout="column" layout-fill flex ng-controller="GDOAppCtrl" ng-cloak>
  
    <!-- Begin Toolbar -->
    <header>
    <md-toolbar class="md-hue-2">
      <div class="md-toolbar-tools">
        <md-button class="md-icon-button" aria-label="<?= t('btn_left_menu'); ?>" ng-disabled="data.leftMenu.disabled" ng-click="openLeft()">
          <?= GDT_Icon::iconS('menu'); ?>
        </md-button>
        <?= GDT_Bar::make()->horizontal()->yieldHook('TopBar'); ?>
        <md-button class="md-icon-button" aria-label="<?= t('btn_right_menu'); ?>" ng-disabled="data.rightMenu.disabled" ng-click="openRight()">
          <?= GDT_Icon::iconS('menu'); ?>
        </md-button>
      </div>
    </md-toolbar>
    </header>
	<!-- End Toolbar -->
 
    <section layout="row" flex>
  
      <!-- LEFT SIDENAV -->
      <md-sidenav class="md-sidenav-left" md-component-id="left" md-is-locked-open="$mdMedia('gt-md')" md-whiteframe="4">
        <?= GDT_Bar::make()->yieldHook('LeftBar'); ?>
      </md-sidenav>
      <!-- END LEFT SIDENAV -->

      <!-- CONTENT -->
      <md-content flex class="gdo-main">
        <div layout="column" layout-align="top center">
          <?= $page->html; ?>
        </div>
        <div flex></div>
      </md-content>
      <!-- END CONTENT -->

      <!-- RIGHT SIDENAV -->
      <md-sidenav class="md-sidenav-right md-whiteframe-4dp" md-component-id="right">
        <md-toolbar class="md-theme-light">
          <h1 class="md-toolbar-tools"><?= t('sidenav_right_title'); ?></h1>
        </md-toolbar>
        <?= GDT_Bar::make()->yieldHook('RightBar'); ?>
      </md-sidenav>
      <!-- END RIGHT SIDENAV -->

    </section>
    
    <!-- BEGIN FOOTER -->
    <footer class="md-whiteframe-4dp" layout="row" layout-align="center center">
        <?= GDT_Bar::make()->yieldHook('BottomBar'); ?>
    </footer>
    <!-- END FOOTER -->

	<!-- JS -->
		<?= Javascript::displayJavascripts(Module_Core::instance()->cfgMinifyJS() === 'concat'); ?>
	<!-- END JS -->

  </body>
</html>