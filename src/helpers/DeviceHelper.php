<?php

namespace SpeedWeb\core;

use Detection\MobileDetect;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class DeviceHelper
{

    private static $crawlerDetectInstance;
    private static $mobileDetectInstance;
    private static $userAgent;

    public static function isSmartphone()
    {
        return (self::isMobile() && !self::isTablet());
    }

    public static function isMobile()
    {
        return self::mobileDetect()->isMobile() !== false;
    }

    public static function isTablet()
    {
        return self::mobileDetect()->isTablet() !== false;
    }

    public static function isDesktop()
    {
        return (!self::isMobile() && !self::isTablet() && !self::isRobot());
    }

    public static function isRobot()
    {
        return self::crawlerDetect()->isCrawler(self::$userAgent);
    }

    public static function isAndroid()
    {
        return self::mobileDetect()->version("Android") !== false;
    }

    public static function isIos()
    {
        return self::mobileDetect()->is("iOS") !== false;
    }

    public static function isIphone()
    {
        return self::mobileDetect()->is('iPhone') !== false;
    }

    public static function isSamsung()
    {
        return self::mobileDetect()->is('Samsung') !== false;
    }

    public static function mobileDetect()
    {
        if(self::$mobileDetectInstance == null){
            self::$mobileDetectInstance = new MobileDetect();
        }

        return self::$mobileDetectInstance;
    }

    public static function crawlerDetect()
    {
        if(self::$crawlerDetectInstance == null){
            self::$crawlerDetectInstance = new CrawlerDetect();
        }

        return self::$crawlerDetectInstance;
    }

    public static function setUserAgent($userAgent)
    {
        self::mobileDetect()->setUserAgent($userAgent);
        self::$userAgent = $userAgent;
    }
}