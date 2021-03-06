<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0500cfa6e892a4b35cb6d84c4bb75d58
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0500cfa6e892a4b35cb6d84c4bb75d58::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0500cfa6e892a4b35cb6d84c4bb75d58::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
