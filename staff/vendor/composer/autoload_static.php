<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit545e1c4b8b1f66c74052f381b7cbb22e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit545e1c4b8b1f66c74052f381b7cbb22e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit545e1c4b8b1f66c74052f381b7cbb22e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit545e1c4b8b1f66c74052f381b7cbb22e::$classMap;

        }, null, ClassLoader::class);
    }
}
