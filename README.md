# Instructions

Make sure you're on the correct branch by running the following command:

git checkout develop

After switching to the develop branch, run the following command to install the project dependencies:

composer install

run the tests to ensure everything is working as expected. You can run the tests using the following command:

php artisan test

Once the tests pass successfully, you can start the Laravel development server by running:

php artisan serve

After the server is up and running, you can make a POST request to the /api/v1/short-urls endpoint using the following curl command:

curl -X POST --location "http://127.0.0.1:8000/api/v1/short-urls" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer ([]) " \
-d '{ "url": "https://primeit.es/" }'


