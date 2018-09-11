<?php

namespace Bolt\Extension\MichaelMezger\Adsense\Twig;

use Silex\Application;

class Adsense
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @return Application
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param Application $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    public function __construct(Application $app)
    {
        $this->setApp($app);
    }

    public function ad($maxwidth = null, $maxheight = null, $cssStyle = '', $format = 'auto') {

        $cssStyles = explode(';', $cssStyle);
        $cssStyles[] = 'margin-bottom: 2rem';

        return $this->getApp()['twig']->render($this->getApp()['config']->get('general/adsense/twig_template'), [
            'slot' => $this->getApp()['config']->get('general/adsense/slot_rwd'),
            'client' => $this->getApp()['config']->get('general/adsense/client'),
            'css' => implode(';', $cssStyles),
            'format' => $format
        ]);
    }
}