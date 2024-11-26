<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\ShortUrlRequest;
    use App\Http\Resources\ShortenedUrlResource;
    use App\Services\UrlShortenerService;

    class ShortUrlController extends Controller
    {
        /**
         * @var UrlShortenerService
         */
        protected $urlShortenerService;

        /**
         * shortening service
         *
         * @param UrlShortenerService $urlShortenerService
         */
        public function __construct(UrlShortenerService $urlShortenerService)
        {
            $this->urlShortenerService = $urlShortenerService;
        }

        public function create(ShortUrlRequest $request)

        {
            $shortenedUrl = $this->urlShortenerService->shortenUrl($request->input('url'));

            if (!empty($shortenedUrl)) {
                return new ShortenedUrlResource($shortenedUrl);
            }

            return response()->json([
                'error' => 'An unexpected error occurred. Please try again later.'
            ], 422);

        }


    }
