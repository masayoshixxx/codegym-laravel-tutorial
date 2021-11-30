<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use Closure;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];

    public function handle($request, Closure $next)
    {
        $input = $request->all();

        $trimmed = [];
        foreach ($input as $key => $val) {
            // 入力フォームの前後のスペース(全角・半角)を除去する
            $trimmed[$key] = preg_replace('/(^\s+)|(\s+$)/u', '', $val);
        }

        $request->merge($trimmed);

        return $next($request);
    }
}
