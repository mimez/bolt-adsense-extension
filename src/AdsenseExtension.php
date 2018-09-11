<?php

namespace Bolt\Extension\MichaelMezger\Adsense;

use Bolt\Extension\SimpleExtension;
use Bolt\Extension\MichaelMezger\Adsense\Twig\Adsense;

class AdsenseExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        $adsense = new Adsense($this->container);

        return [
            'ad' => [[$adsense, 'ad'], ['is_safe' => ['html']]]
        ];
    }
}
