<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];
//     protected $dontReport = [
//         \Illuminate\Auth\AuthenticationException::class,
//         \Illuminate\Auth\Access\AuthorizationException::class,
//         \Symfony\Component\HttpKernel\Exception\HttpException::class,
//         \Illuminate\Database\Eloquent\ModelNotFoundException::class,
//         \Illuminate\Session\TokenMismatchException::class,
//         \Illuminate\Validation\ValidationException::class,
//     ];
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        
//         if (in_array('admin', $exception->guards())) {
//             //return redirect()->guest(route('admin.login'));
//             $login = 'admin/login';
//             return redirect($login);
//         }
        $class = get_class($exception);
        switch($class) {
          // 認証エラーの場合、どの認証に失敗したかによって、ログインURLを振り分ける
            case 'Illuminate\Auth\AuthenticationException':
                $guard = array_get($exception->guards(), 0);
                switch ($guard) {
                    case 'user':
                        $login = 'login';
                        break;
                    case 'worker':
                        $login = 'worker/login';
                        break;
                    case 'admin':
                        $login = 'admin/login';
                        break;
					case 'stylistadmin':
                        $login = 'stylistadmin/login';
                        break;
                    default:
                        $login = 'login';
                        break;
                }
                return redirect($login);
                //return redirect()->guest(route($login));
        }
        // それ以外のエラーは、そのまま画面に表示
        return parent::render($request, $exception);
    }
    
//     protected function unauthenticated($request, AuthenticationException $exception)
//     {
//         if ($request->expectsJson()) {
//             return response()->json(['error' => 'Unauthenticated.'], 401);
//         }
//         $guard = array_get($exception->guards(), 0);
//         switch ($guard) {
//             case 'admin':
//                 $login = 'admin.login';
//                 break;
//             default:
//                 $login = 'login';
//                 break;
//         }
//         return redirect()->guest(route($login));
//     }

//     protected function unauthenticated($request, AuthenticationException $exception)
//     {
//         if ($request->expectsJson()) {
//             return response()->json(['error' => 'Unauthenticated.'], 401);
//         }
//         if (in_array('admin', $exception->guards(), true)) { // ここから
//             return redirect()->guest('admin/login');
//         } // ここまで追記
//         return redirect()->guest(route('login'));
//     }
//     protected function unauthenticated($request, AuthenticationException $exception)
//     {
//         return $request->expectsJson()
//         ? response()->json(['message' => $exception->getMessage()], 401)
//         : redirect()->guest(route('login'));
//     }
}
