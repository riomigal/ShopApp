<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## How to start 

1. Rename .env.example to .env (APP_URL to http://127.0.0.1:8000)
2. Update the DB and MAIL variables
3. Create a database
4. Run:
```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```
5. Run:
```
php artisan queue:work
```
6. Run in a separate terminal window:
```
php artisan serve
```
7. Open http://127.0.0.1:8000 in the browser
8. Login as admin: 
admin@admin.com
aaaaaaaa
9. Go to users and edit the admin user. Update the email address to a valid one.

Deploy app (SSH on server)
1. Rename in .env-production to .env (Set the APP_URL to the desired domain)
2. Follow the steps above (First approach)
3. Follow the steps on https://laravel.com/docs/9.x/deployment


## Stack
The app uses the TALLkit filament (https://filamentphp.com/).

## Resources
The resources (Brands, Permissions, Products, Roles and Users) do support all CRUD operation. It is also possible to extend the functionality and implement Softdeletes for each Model Class in a later step. 

## Authorization
Authorization is handled with the laravel-permission package together with policies. https://spatie.be/docs/laravel-permission/v5/introduction
The current roles and permissions are automatically populated and assigned to the admin, when running db:seed command.
Admins have full access on the platform, seller have only limited access to brands and products. This model serves of course only as an example and the structure can be changed as requried (E.g. creating new roles with different permissions).

## Brands
User can create/update/view/delete new brands and assign them later products. 

## Products
User can create/update/view/delete new products and assign brands. 
All user receive a notification email, after a user creates / updates / deletes a product 

### Tables
Search (Input Search...): User can make a textsearch (id,name,barcode).

Filter (Filter symbol): User can filter the products by brand and price range.

Import legacy products (Button): User can import the legacy products by clicking on the button "Import legacy products" and upload a csv file. E.g. /legacy_products.csv. The header of the file have to correspond the attributes of the model. All user receive an email as soon as the import has finished.

Export to CSV (button): User can export the filtered products by clicking on the button "Export to CSV". The file will be send the file by mail to the current authenticated user.

The import/export and emails are sent via queue, please make sure to run php artisan queue:work to process the jobs.

P.S.: The MustVerifyEmail trait is not enabled, please make sure to insert a valid email address.

