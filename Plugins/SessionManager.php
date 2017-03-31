<?php

namespace TheliaSmartyPlugins\Plugins;

use Symfony\Component\HttpFoundation\RequestStack;
use TheliaSmarty\Template\AbstractSmartyPlugin;
use TheliaSmarty\Template\SmartyPluginDescriptor;
use TheliaSmarty\Template\Exception\SmartyPluginException;

class SessionManager extends AbstractSmartyPlugin
{
    private $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getCurrentRequest()->getSession();
    }

    public function sessionSet($params, $template = null)
    {
        foreach ($params as $k=>$v) {
            $this->session->set($k, $v);
        }
    }

    public function sessionGet($params, $template = null)
    {
        $var = $this->getParam($params, 'var');
        if ($var === null) {
            throw new SmartyPluginException('"var" parameter is mandatory for "session_get" function');
        }
        $default = $this->getParam($params, 'default');
        return $this->session->get($var, $default);
    }

    /**
     * @return SmartyPluginDescriptor[]
     */
    public function getPluginDescriptors()
    {
        return array(
            new SmartyPluginDescriptor("function", "session_set", $this, "sessionSet"),
            new SmartyPluginDescriptor("function", "session_get", $this, "sessionGet"),
        );
    }
}
