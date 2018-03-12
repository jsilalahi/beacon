# :loudspeaker: Beacon
Real-time error reporting for engineering team.

Imagine that your application in production and customers using it. Sometimes, an runtime exception is occur by users. And engineering team did not know it happens to your customers, until a ticket is raised.

Beacon can help engineering team to catch this runtime error and notify them. We should catch errors before users do.


## Install
Require this package with composer. It is recommended to only require the package for development.

```
composer require dyned/beacon
```

And then you need to copy config from Beacon's default config to your projects config (if config folder does not exists, create it first in project's root)
```
cp vendor/dyned/beacon/config/beacon.php ./config/beacon.php
```

Register Beacon's service provider to project's `bootstrap/app.php` file.
```php
$app->register(DynEd\Beacon\BeaconServiceProvider::class);
```

In order to make Beacon catches error, add Beacon's Facade to `app/Exceptions/Handler.php` file:
```php
use DynEd\Beacon\Facades\Beacon;

```
And then add this code to "report" method:
```php
Beacon::report($e);
``` 

The report method now more or less similar like this
```php
public function report(Exception $e)
{
    Beacon::report($e);

    parent::report($e);
}
```

That's it. When an exception occur, you'll received notifications real time.