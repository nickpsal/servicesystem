<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd64912e5182b4a30253eed2e839a516f
{
    public static $files = array (
        '82ffb4d71edfb5c66d1e2ffd9d40efc5' => __DIR__ . '/../..' . '/app/Core/config.php',
        '3d01d43237d510fd8ad532f47e2c0521' => __DIR__ . '/../..' . '/app/Core/functions.php',
    );

    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/app/Core/App.php',
        'Branch' => __DIR__ . '/../..' . '/app/Models/Branch.php',
        'Client' => __DIR__ . '/../..' . '/app/Models/Client.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Controller' => __DIR__ . '/../..' . '/app/Core/Controller.php',
        'Database' => __DIR__ . '/../..' . '/app/Core/Database.php',
        'Device' => __DIR__ . '/../..' . '/app/Models/Device.php',
        'Migration' => __DIR__ . '/../..' . '/app/Models/Migration.php',
        'MigrationManager' => __DIR__ . '/../..' . '/app/Core/MigrationManager.php',
        'Model' => __DIR__ . '/../..' . '/app/Core/Model.php',
        'Notification' => __DIR__ . '/../..' . '/app/Models/Notification.php',
        'Request' => __DIR__ . '/../..' . '/app/Core/Request.php',
        'Ticket' => __DIR__ . '/../..' . '/app/Models/Ticket.php',
        'User' => __DIR__ . '/../..' . '/app/Models/User.php',
        'User_branch' => __DIR__ . '/../..' . '/app/Models/User_branch.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitd64912e5182b4a30253eed2e839a516f::$classMap;

        }, null, ClassLoader::class);
    }
}
