<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


// Đây là nơi cấu hình thông báo lỗi trả về từ laravel
class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // Tất cả các request hay tất cả các lỗi nó đều sẽ đi vô đây
        // $this->renderable(function (AuthenticationException $authen, $request) {
        // Nếu như request của chúng ta mà có prefix là api và khi nó bị lỗi thì nó sẽ chạy vào hàm dưới đây
        // Demo: http://127.0.0.1:8000/api/user
        //     if ($request->is('api/*')) {
        //         return response()->json([
        //             "message" => "Api Failure",
        //             "status" => false,
        //             "code" => 1000
        //         ], 400);
        //     }
        // });

        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // Phương thức render có tránh nhiệm chuyển đổi một exception thành một HTTP response để trả lại cho trình duyệt
    public function render($request, Throwable $exception)
    {
        // Với những trường hợp dùng hàm findOrFail() thì khi không tìm thấy đối tượng nó sẽ ném ra 1 Eloquent exception có tên là ModelNotFoundException.
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'status' => Response::HTTP_NOT_FOUND,
                'text' => 'failure',
                'message' => $exception->getMessage(),
                'time' => date("d/m/Y h:i:s")
            ], Response::HTTP_NOT_FOUND);
        }

        // Với những trường hợp khi ta nhập 1 đường dẫn api không tồn tại thì nó sẽ ném ra 1 Eloquent exception có tên là NotFoundHttpException
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'success' => false,
                'status' => Response::HTTP_NOT_FOUND,
                'text' => 'failure',
                'message' => 'page not found',
                'time' => date("d/m/Y h:i:s")
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
}
