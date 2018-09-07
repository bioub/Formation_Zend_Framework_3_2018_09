<?php

namespace Bootstrap\View\Helper;


use Zend\View\Helper\AbstractHelper;

class AlertFlashMessenger extends AbstractHelper
{
    public function __invoke($type = 'success')
    {
        $html = '';

        foreach ($this->view->flashMessenger()->getMessagesFromNamespace($type) as $msg) {
            $html .= $this->view->btspAlert($msg);
        }

        return $html;
    }

}