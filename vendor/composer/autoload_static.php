<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3836c5c90e9138736c02139cccda588
{
    public static $files = array (
        '367e7f1fbd5a4640ed18913a66bd0727' => __DIR__ . '/../..' . '/app/helpers/constants.php',
        '747e069ad8626029d5d63b93246f5b1c' => __DIR__ . '/../..' . '/app/router/router.php',
        'afc4fa8f49460c7211f49991640ce7ad' => __DIR__ . '/../..' . '/app/core/controller.php',
    );

    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Guilh\\PhpPro\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Guilh\\PhpPro\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3836c5c90e9138736c02139cccda588::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3836c5c90e9138736c02139cccda588::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3836c5c90e9138736c02139cccda588::$classMap;

        }, null, ClassLoader::class);
    }
}
