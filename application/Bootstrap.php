<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
  protected function _initDoctype()
  {
    $this->bootstrap('view');
    $view = $this->getResource('view');
    $view->doctype('HTML5');
    $view->siteTile = 'Jobs To PHP';
    $view->headTitle()->headTitle($view->siteTile)->setSeparator(' - ');
    $view->headLink()->prependStylesheet('css/application.css');
  }

}

