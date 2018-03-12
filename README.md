# :loudspeaker: Beacon
Real-time error reporting for developers. We should catch errors before users do. 

## Install
Require this package with composer. It is recommended to only require the package for development.

```
composer require dyned/beacon
```

And then you need to copy config from Beacon's default config to your projects config 
```
cp vendor/dyned/beacon/config/beacon.php ./config/beacon.php
```
You can add `BEACON_HANDLER` to specified report handler for Beacon. Refer to Beacon's config file to some insight. 

Register Beacon service provider to project's `bootstrap/app.php` file.
```php
$app->register(DynEd\Beacon\BeaconServiceProvider::class);
```

To catch error from project's add Beacon Facade to `app/Exceptions/Handler.php` file:
```php
use DynEd\Beacon\Facades\Beacon;

```
And then add this code to "report" method:
```php
Beacon::report($e);
``` 

Your report method should look like this
```php
public function report(Exception $e)
{
    Beacon::report($e);

    parent::report($e);
}
```

That's it. When an exception occur, you'll received notifications real time.