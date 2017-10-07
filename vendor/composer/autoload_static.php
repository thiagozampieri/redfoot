<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce301164c31d61b26c2394554a118755
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitce301164c31d61b26c2394554a118755::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce301164c31d61b26c2394554a118755::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
