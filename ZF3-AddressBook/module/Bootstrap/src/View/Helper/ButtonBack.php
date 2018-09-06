<?php

namespace Bootstrap\View\Helper;


use Zend\Http\Header\Referer;
use Zend\View\Helper\AbstractHelper;

class ButtonBack extends AbstractHelper
{
    /** @var \Zend\Http\PhpEnvironment\Request */
    protected $request;

    /**
     * ButtonBack constructor.
     * @param \Zend\Http\PhpEnvironment\Request $request
     */
    public function __construct(\Zend\Http\PhpEnvironment\Request $request)
    {
        $this->request = $request;
    }


    public function __invoke()
    {
        /** @var Referer $referer */
        $referer = $this->request->getHeader('referer');

        if (!$referer) {
            return '';
        }

        // syntaxe HEREDOC (php.net)
        return <<<MA_CHAINE_DE_CARACTERE
<a href="{$referer->getUri()}" class="btn btn-default">Back</a>
MA_CHAINE_DE_CARACTERE;
    }
}