<?php namespace Craft;

class CreditCardPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Credit Card');
    }

    public function getVersion()
    {
        return '0.1.0';
    }

    public function getDeveloper()
    {
        return 'Experience';
    }

    public function getDeveloperUrl()
    {
        return 'http://experiencehq.net';
    }

    public function hasCpSection()
    {
        return true;
    }
}
