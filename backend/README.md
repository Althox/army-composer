Project is build in NGINX, PHP and Symfony with Doctrine as framework.

After container has been started, you need to enter the PHP-container and perform some commands.

PHP has not yet any modules downloaded, thus you need to run `composer install`.

For creating the database links, use the commands mentioned in [#Database & Doctrine](#database--doctrine)

## Database & Doctrine
* To create a new migration file, run: `php bin/console make:migration`
* To migrate changes to DB, run: `php bin/console doctrine:migrations:migrate`