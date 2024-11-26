<?php

    namespace App\Services;

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Log;

    class UrlShortenerService
    {
        /**
         * Shortens a URL using the TinyURL API.
         *
         * @param string $url
         * @return string|null
         */
        public function shortenUrl(string $url): ?string
        {
            try {

                $response = Http::get('https://tinyurl.com/api-create.php', [
                    'url' => $url,
                ]);

                if ($response->successful()) {
                    return $response->body();
                }
            } catch (\Exception $e) {
                Log::error('Error shortening the URL: ' . $e->getMessage());
            }


            return null;
        }
    }
