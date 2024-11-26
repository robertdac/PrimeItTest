<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use App\Services\TokenValidator;

    class VerifyBearerToken
    {
        /**
         *
         *
         * @param \App\Services\TokenValidator $tokenValidator
         */
        public function __construct(TokenValidator $tokenValidator)
        {
            $this->tokenValidator = $tokenValidator;
        }


        /**
         * Handle an incoming request.
         *
         * @param Request $request
         * @param \Closure(Request): (Response|RedirectResponse) $next
         * @return JsonResponse
         */
        public function handle(Request $request, Closure $next)
        {


            return $next($request);
        }

    }
