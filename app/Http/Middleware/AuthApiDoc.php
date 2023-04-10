<?php


namespace App\Http\Middleware;

use Closure;

class AuthApiDoc
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $envs = [
            'develop'
        ];

        if (in_array(app()->environment(), $envs)) {
            if ($request->getUser() == env('API_DOC_AUTH_USER_NAME') && $request->getPassword() == env('API_DOC_AUTH_USER_PASSWORD')) {
                return $next($request);
            }
        }

        $headers = array('WWW-Authenticate' => 'Basic');
        return response('Unauthorized', 401, $headers);
    }

}
