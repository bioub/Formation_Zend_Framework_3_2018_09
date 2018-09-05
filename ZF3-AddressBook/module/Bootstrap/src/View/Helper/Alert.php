<?php

namespace Bootstrap\View\Helper;


use Zend\View\Helper\AbstractHelper;

class Alert extends AbstractHelper
{
    public function __invoke($msg, $type = 'success')
    {
        // syntaxe HEREDOC (php.net)
        return <<<MA_CHAINE_DE_CARACTERE
<div class="alert alert-$type">
    <button class="close" data-dismiss="alert">&times;</button>
    $msg
</div>
MA_CHAINE_DE_CARACTERE;
    }
}