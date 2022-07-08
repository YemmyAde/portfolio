<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3fd6f8dc34f21a6587b64ebfe44e1d32
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3fd6f8dc34f21a6587b64ebfe44e1d32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3fd6f8dc34f21a6587b64ebfe44e1d32::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3fd6f8dc34f21a6587b64ebfe44e1d32::$classMap;

        }, null, ClassLoader::class);
    }
}