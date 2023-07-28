Tích hợp notification trong laravel:
- Tài liệu tham khảo: https://viblo.asia/p/tim-hieu-ve-notifications-trong-laravel-ORNZqBEGl0n
- Video tham khảo: https://www.youtube.com/watch?v=_T0M9241eic

+ Cách tạo 1 notification cho 1 sự kiện:
php artisan make:notification Tên-notification
VD: php artisan make:notification LoginNotification
VD: php artisan make:notification RegisterNotification
=> Lúc này trong app\Notifications sẽ xuất hiện 2 file LoginNotification.php và RegisterNotification.php

+ Hướng dẫn cách sử dụng Notification trong controller
VD Sử dụng trong RegisterController
use App\Notifications\RegisterNotification;
use Illuminate\Support\Facades\Notification;

Trong function ta sẽ gọi: Notification::send($user, new RegisterNotification);

mehtod via($notifiable) để xác định kiểu thông báo nào sẽ được chọn và bao gồm 2 method toMail, toDatabase.

Notification sẽ được gởi bằng hai cách đó là sử dụng lớp Notifiable trait và Notification facade. Nếu sử dụng Notifiable trait thì:
<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
}

=> Note: Sử dung class Notifiable trait ở tất cả những đối tượng mà bạn muốn thực hiện notification

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotificationUser;
use App\User;

    class UserController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $user = User::find(1);
            $user->notify(new NotificationUser());
        }
     }
------------------------------------------------------------------------------------------------------------------------------
