<?php

/*
  Plugin Name: Easy Chitika
  Plugin URI: http://www.thulasidas.com/plugins/easy-chitika
  Version: 2.20
  Description: Make more money from your blog using <a href="http://chitika.com/publishers.php?refid=manojt">Chitika</a>. Configure it at <a href="options-general.php?page=easy-chitika-lite.php">Settings &rarr; Easy Chitika</a>.
  Author: Manoj Thulasidas
  Author URI: http://www.thulasidas.com
 */

/*
  Copyright (C) 2010 www.thulasidas.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 3 of the License, or (at
  your option) any later version.

  This program is distributed in the hope that it will be useful, but
  WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
  General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$plg = "Easy Chitika Lite";
if (class_exists("EasyChitika")) {
  $pro = plugin_basename(__FILE__);
  $lite = "easy-chitika-lite/easy-chitika.php";
  include_once('ezKillLite.php');
  ezKillLite($plg, $pro, $lite);
}
else {
  $plgFile = __FILE__;
  $pwd = dirname($plgFile);
  require($pwd . '/validate.php');

  class EasyChitika extends ezPlugin {

    var $adArrays = array();
    var $adStacks = array();
    var $positions = array('top', 'middle', 'bottom');
    var $slug;

    function EasyChitika() { // Constructor
      ezNS::setNS(__FILE__, PLUGINDIR, $killLite = true);
      $this->slug = 'easy-chitika';
      $this->CWD = ezNS::$CWD;
      $this->baseName = ezNS::$baseName;
      $this->URL = ezNS::$URL;
      $this->name = ezNS::$name;
      $this->genOptionName = ezNS::$genOptionName;
      if (file_exists($this->CWD . '/defaults.php')) {
        include ($this->CWD . '/defaults.php');
        $this->defaults = $defaults;
      }
      if (empty($this->defaults)) {
        $this->errorMessage = '<div class="error"><p><b><em>ezAPI</em></b>: ' .
                'Could not locate <code>defaults.php</code>. ' .
                'Default Tabs loaded!</p></div>';
      }
      if (!is_array($this->defaults['tabs'])) {
        $baseTabs = array('Overview' => array(),
            'Admin' => array(),
            'Example' => array(),
            'About' => array());
        $this->defaults['tabs'] = $baseTabs;
      }
      else { // build tabs from defaults.php
        $baseTabs = array('Overview' => array(),
            'Admin' => array());
        $baseTabs = array_merge($baseTabs, $this->defaults['tabs']);
        $this->defaults['tabs'] = $baseTabs;
        if (empty($this->defaults['tabs']['About'])) {
          $aboutTab = array('About' => array());
          $this->defaults['tabs'] = array_merge($this->defaults['tabs'], $aboutTab);
        }
      }
      foreach ($this->defaults['tabs'] as $k => $v) {
        $className = ezNS::ns($k);
        $ezClassName = 'ez' . $k;
        if (class_exists($className)) {
          $this->tabs[$k] = new $className($k, $v);
        }
        else if (class_exists($ezClassName)) {
          $this->tabs[$k] = new $ezClassName($k, $v);
        }
        else {
          $this->tabs[$k] = new provider($k, $v);
        }
        $this->tabs[$k]->setPlugin($this);
        if (!empty($this->tabs[$k]->options['active'])) {
          $this->tabs[$k]->isActive = $this->tabs[$k]->options['active']->value;
        }
      }
      foreach ($this->positions as $pos) {
        $this->adArrays[$pos] = array();
      }
      $this->plgDir = $this->CWD;
      $this->plgURL = $this->URL;
      if (is_admin()) {
        require_once($this->plgDir . '/EzTran.php');
        $this->ezTran = new EzTran(__FILE__, "Easy Chitika", "easy-ads");
        $this->ezTran->setLang();
        require($this->plgDir . '/myPlugins.php');
        $slug = $this->slug;
        $plg = $this->myPlugins[$slug];
        $plgURL = $this->plgURL;
        require_once($this->plgDir . '/EzAdmin.php');
        $ez = new EzAdmin($plg, $slug, $plgURL);
        $ez->plgFile = __FILE__;
        if ($this->options['kill_author']) {
          $ez->killAuthor = true;
        }
        $this->ez = $ez;
      }
    }

    function filterContent($content) {
      foreach ($this->tabs as $p) {
        $p->setPlugin($this);
        if ($p->isActive) {
          $p->buildAdBlocks();
          $p->applyAdminOptions();
        }
      }
      $midpoint = strlen($content) / 2;
      $paraPosition = ezExtras::findPara($content, $midpoint);

      foreach ($this->tabs as $p) {
        if ($p->isActive) {
          $p->buildAdStacks();
        }
      }
      $adsPerSlot = 1;
      foreach ($this->positions as $pos) { // pick random ads to fill the ad slots ($pos)
        $$pos = '';
        $adStack = & $this->adArrays[$pos];
        if (empty($adStack)) {
          continue;
        }
        $adKeys = array_keys($adStack);
        if (count($adStack) > $adsPerSlot) {
          $adKeys = array_rand($adStack, $adsPerSlot);
        }
        if (!is_array($adKeys)) {
          $adKeys = array($adKeys);
        }
        foreach ($adKeys as $k) {
          $ad = ezExtras::handleDefaultText($adStack[$k]);
          $$pos .= $ad;
        }
      }
      return $top . substr_replace($content, $middle, $paraPosition, 0) . $bottom;
    }

    function addAdminPage() {
      $plugin_page = add_options_page(ezNS::$name, ezNS::$name, 'manage_options', basename(ezNS::$CWD), array($this, 'renderAdminPage'));
      add_action('admin_head-' . $plugin_page, array($this, 'writeAdminHeader'));
    }

    function addWidgets() {
      foreach ($this->tabs as $p) {
        if ($p->isActive && method_exists($p, 'buildWidget')) {
          $p->buildWidget();
        }
      }
    }

  }

}//End: Class easyChitika


if (class_exists("easyChitika")) {
  // error_reporting(E_ALL);
  $mChitika = new EasyChitika();
  if (isset($mChitika)) {
    ezNS::setStaticVars($mChitika->defaults, $mChitika->genOptionName);
    add_action('admin_menu', array($mChitika, 'addAdminPage'));
    add_filter('the_content', array($mChitika, 'filterContent'));
    $mChitika->addWidgets();
    register_activation_hook(__FILE__, array($mChitika, 'migrateOptions'));
  }
}
else {
  add_action('admin_notices', create_function('', 'if (substr( $_SERVER["PHP_SELF"], -11 ) == "plugins.php"|| $_GET["page"] == "easy-chitika.php") echo \'<div class="error"><p><b><em>Easy Chitika</em></b>: Not Active!</p></div>\';'));
}
