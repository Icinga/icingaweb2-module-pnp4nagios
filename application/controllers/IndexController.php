<?php

use Icinga\Web\Controller;

class Pnp4nagios_IndexController extends Controller
{
    public function indexAction()
    {
        $cfg = $this->Config()->module('pnp4nagios')->getSection('pnp4nagios');
        $baseUrl = rtrim($cfg->get('base_url', '/pnp4nagios'), '/');

        $this->view->url = sprintf(
             '%s/graph?host=%s&srv=%s&view=%d',
             $baseUrl,
             urlencode($this->getParam('host')),
             urlencode($this->getParam('srv')),
             $this->getParam('view')
        );
    }
}
