<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Telegram\Bot\Laravel\Facades\Telegram;

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
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ( ! env('APP_DEBUG')) {
            $message =
                '```' .
                '#Host: ' . config('app.name') . "\n\n" .
                '#url: ' . url()->current() . "\n\n" .
                '#file: ' . $exception->getFile() . "\n\n" .
                '#Line: ' . $exception->getLine() . "\n\n" .
                '#Message: ' . $exception->getMessage() . "\n\n
                ```";

            Telegram::sendMessage([
                'chat_id' => '@tooska_error_reporter',
                'text' => $message,
                'parse_mode' => 'markdown'
            ]);
        }

        return parent::render($request, $exception);
    }
}
