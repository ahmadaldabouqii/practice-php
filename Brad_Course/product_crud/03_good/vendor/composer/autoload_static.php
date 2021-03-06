<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b35c7119d8a18d0a84722efdcde8bad
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b35c7119d8a18d0a84722efdcde8bad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b35c7119d8a18d0a84722efdcde8bad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4b35c7119d8a18d0a84722efdcde8bad::$classMap;

        }, null, ClassLoader::class);
    }
}
