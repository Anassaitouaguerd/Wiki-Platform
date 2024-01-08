<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2fa2057fb5b2cb0a1385968855c94fb2
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2fa2057fb5b2cb0a1385968855c94fb2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2fa2057fb5b2cb0a1385968855c94fb2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2fa2057fb5b2cb0a1385968855c94fb2::$classMap;

        }, null, ClassLoader::class);
    }
}