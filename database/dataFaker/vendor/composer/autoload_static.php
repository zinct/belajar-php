<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc34ebcdfebccc3f06379a830292668e
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc34ebcdfebccc3f06379a830292668e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc34ebcdfebccc3f06379a830292668e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
