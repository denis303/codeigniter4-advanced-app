<?php

namespace Config;

use App\Models\UserModel;
use denis303\codeigniter4\UserService;
use denis303\codeigniter4\MailerService;

require_once SYSTEMPATH . 'Config/Services.php';

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends \CodeIgniter\Config\Services
{

	//    public static function example($getShared = true)
	//    {
	//        if ($getShared)
	//        {
	//            return static::getSharedInstance('example');
	//        }
	//
	//        return new \CodeIgniter\Example();
	//    }

    public static function user($getShared = true)
    {
        if ($getShared)
        {
            return static::getSharedInstance('user');
        }

        $appConfig = config(App::class);

        return new UserService(UserModel::class, static::session(), $appConfig);
    }

    public static function mailer($getShared = true)
    {
        if ($getShared)
        {
            return static::getSharedInstance('mailer');
        }

        $mailerConfig = config(Mailer::class);

        return new MailerService($mailerConfig->fromEmail, $mailerConfig->fromName);
    }

}
