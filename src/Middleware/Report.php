<?php


namespace Hogus\LaravelResponseLogging\Middleware;

use Closure;
use Illuminate\Http\Request;

class Report
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!config('response-logging.enable')) {
            return $response;
        }

        try {
            logs('response')->info($request->url(), [
                'request' => [
                    'url' => $request->fullUrl(),
                    'data' => $request->input(),
                    'method' => $request->method(),
                    'headers' => $request->header()
                ],
                'response' => [
                    'content' => $response->getContent(),
                ]
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return $response;
    }
}
