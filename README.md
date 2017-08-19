##Lawline Development Test

####Stack used
This app written on Laravel 5.2 with PHP 7.1.

####Set up
Please run the following commands:

- composer install
- Copy .env.example and rename to .env within the same directory
- Run command: php artisan key:generate
    - Copy generated key to .env in APP_KEY (excluding the brackets)
- php artisan migrate
- php db:seed

####Testing
All tests are under tests/app. To run simple run this command: phpunit

####Routes
* GET     /api/products   - This gets all the products
* POST    /api/product        - This stores a product to the products table
* GET     /api/product/{id}   - This gets a product by id
* PATH    /api/product/{id}   - This updates a product by id
* DELETE  /api/product/{id}   - This deletes a product by id
* GET     /api/user/products      - This gets all the products for the authorized user
* PUT     /api/user/product/{id}  - This links the authorized to a product
* DELETE  /api/user/product/{id}  - This un-links the authorized to a product
* POST    /api/product/image  - This saves a product image to the server

####Authentication
All routes under /api are under the 'auth:api' middleware. What this essentially means is that 
all requests must have a parameter of api_token. This token is the unique identifier of who is
a valid api user based on the user table api_token column.