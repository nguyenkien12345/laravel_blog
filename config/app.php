<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    // Ghi Log
    // Khi sử dụng chế độ daily, Laravel chỉ giữ lại 5 file log của 5 ngày gần nhất,
    // nếu bạn muốn điều chỉnh số lượng file log được lưu trữ lại, bạn có thể thay đổi giá trị log_max_files.
    // 'log' => 'daily',
    // 'log_max_files' => 30,
    // Khi sử dụng Monolog, các message log có rất nhiều cấp độ với độ nghiêm trọng khác nhau. Mặc định, Laravel ghi tất cả các cấp độ log,
    // tuy nhiên, trong môi trường ứng dụng chạy thực tế, bạn nên thiết lập chỉ ghi log với các cấp độ nghiêm trọng cần thiết thông qua giá trị
    // log_level trong file app.php. Khi tùy chọn này được cấu hình, Laravel sẽ ghi log tất cả các cấp độ nghiêm trọng hơn hoặc bằng với cấp độ được cấu hình.
    // Ví dụ, mặc định giá trị log_level có giá trị là error do đó Laravel sẽ ghi log các cấp độ là error, critical, alert và emergency:
    // 'log_level' => env('APP_LOG_LEVEL', 'error'),


    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    // 'timezone' => 'UTC',
    'timezone' => 'Asia/Ho_Chi_Minh',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    // Ngôn ngữ mặc định
    'locale' => 'vi',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    // Nếu ngôn ngữ mặc định (locale) không tồn tại thì sẽ lấy fallback_locale thay thế
    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,
        /*
         * Package Service Providers...
         */
        Barryvdh\Debugbar\ServiceProvider::class,
        Barryvdh\DomPDF\ServiceProvider::class,
        Mews\Captcha\CaptchaServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
        Stevebauman\Location\LocationServiceProvider::class,
        Yaza\LaravelGoogleDriveStorage\LaravelGoogleDriveStorageServiceProvider::class,
        // SimpleSoftwareIO\QrCode\ServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\TelescopeServiceProvider::class,
        App\Providers\GoogleDriveServiceProvider::class,
        Ladumor\OneSignal\OneSignalServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    // Lưu ý: Để khai báo các file định danh trong aliases thì các hàm các biến trong các file này phải ở dạng static
    'aliases' => Facade::defaultAliases()->merge([
        'Helpers' => App\Helpers\Helpers::class,
        'Debugbar' => Barryvdh\Debugbar\Facades\Debugbar::class,
        'PDF' => Barryvdh\DomPDF\Facade\Pdf::class,
        'QrCode' => SimpleSoftwareIO\QrCode\Facade::class,
        'Menu' => App\Menu\Facade\MenuFacade::class,
        'Captcha' => Mews\Captcha\Facades\Captcha::class,
        'Image' => Intervention\Image\Facades\Image::class,
        'Location' => Stevebauman\Location\Facades\Location::class,
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'OneSignal' => \Ladumor\OneSignal\OneSignal::class,
    ])->toArray(),
];

// Cái thằng định danh aliases chỉ gán được cho những Facades hoặc những Helpers mà có chứa những cái hàm static
// Facedes chỉ được trỏ tới những cái class mà có cái phương thức static thôi
