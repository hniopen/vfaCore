# Viamo Foundation App - Core

## Settings Logging on Laravel
   Here you may configure the log settings for your application. Out of
  the box, Laravel uses the Monolog PHP logging library. This gives
   you a variety of powerful log handlers / formatters to utilize.
   Available Settings: "single", "daily", "syslog", "errorlog"
 

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'emergency'),
    'log_max_files' => 30,
###Basic Usage
```
use Illuminate\Support\Facades\Log;
Log::info('info log');
Log::debug('debug log');


```

## How to install Monolog.
Run `composer require monolog/monolog
### Basic Usage
```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');
```

