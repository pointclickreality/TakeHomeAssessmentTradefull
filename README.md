<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Welcome to My Take Home Assestment - JD Hawkins

This application will demonstate my development skills as a FULL STACK Developer. This includes all aspects of development, such as Front-End/Back-End Logic, Database, & Front-end UI

The concept is that a user can create NFT products, & users can leave comments on those products. you can also visit a users' profile to see all products that belong to user.
You are also able to Edit, Delete, Like or Dislike products & the same applies for any comments.


Please accept this application as a submission for my take home assestment.
## Getting Started - Step 1

To try to make this application as intuitive as possible a number of functions have been moved directly to the application interface, so the need to
run command lines has been reduced to only one single command line. I hope this is taken as an initiative effort to allow ease of use when getting started.

## Install Composer Packages  - Step 2
Once you have the app installed, please open your terminal or your preferred Command Line Interface & enter the following command in project root.


```angular2html
composer install
```
## Install NPM Packages - Step 3

This will install all of the necessary packages in order to render the app properly. Once you see that composer has sucessfully installed the required packages, proceed to the next step.

```angular2html
npm install
```
The above command will install all of the npm packages related to this app

## Update the .env file - Step 4

Update the .env file with your database credentials, or update the database.php file found in config/database.php if you wish to register database variables there.
After you have updated your .env file you can move to the next step


### Install Migration & Seeder via One-Click Button Step 5

Once you have run the above commands, please visit the root of your domain in which the app is installed & you should see the below introduction. The remaining steps on this page 
will allow you to set the app up in a few clicks.

Please follow the steps on screen once you visit the root of your domain. 

You should see a button that says " Click Me To Run Migration & Seeder" 
This button will allow you to run Migration & Seed the database in a single click.
After that step you should see the products table loaded with new NFT products, by users who have left comments on products via seeder
![Welcome Page](https://user-images.githubusercontent.com/3782848/193999504-43c256b7-fa98-4a4d-a863-44b242293b6f.png
"Welcome Page")

### But, if you prefer Command Line  - Step 5-A (1)
IMPORTANT !!! If you followed Step 5, then you should already have a new Database & it has been seeded, ONLY follow this step if you prefer to use Command line & you have not performed Step 5, as this wil delete & re-seed the database, causing you to lose any previous data.
If you would rather install the rest of the required files like migration & seeder via CLI follow steps below.

To install migration files

```angular2html
php artisan migrate:fresh
```

## Seed the Database - Step 5-A (2)

The below command will seed the newly migrated database. 
```angular2html
php artisan db:seed
```

## Congrats!

Once you have sucessfully completed Step 5 or Steps 5-A 1 & 2 you will have sucessfully done all of the required steps in order to get the app running. Please visit homepage of domain app is installe on to see the magic.

## Screenshots Galore
Below are some screenshots of what to expect when using the app.

### No migration default view

This view is displayed after you sucessfully install composer & npm, but the migration & seeder have not been run. This intuitive UI allows you to migrate and seed in a single button click.
No CLI Needed!!!
![No Migration](https://user-images.githubusercontent.com/3782848/193989150-dff702d9-42e8-4361-b20d-584d5962c83e.png
"No Migration Present")


### Global Search Livewire Component
This very power component allows you to search multiple models at once via a single query. You only need to enter at least one letter for search to trigger.
The search will search any models that are referenced in the Searchable array, regardless of the Model.
![Global Search](https://user-images.githubusercontent.com/3782848/193989620-11d56f09-cc4f-44e4-b6db-9d30b48fedcf.png
"Global Seach Component")

### Products Table CRUD Component
The products table component is flexible and powerful, you can perform any crud operation directly from the UI, without reloading the page at all. 
You are also able to perform powerful searches against one or multiple columns available on the table, you are also able to search for results  greater or equal to the number of likes, dislikes, &/or sales based on the given value(s) provided.
Hoverable bootstrap ui based tooltips are also available

![Products Table](https://user-images.githubusercontent.com/3782848/193989943-0c3242af-425a-419d-80b0-546eeef7636f.png
"Products Table")

### Create Product
Create a new product using the product form. Each time you visit the create product page a new image is selected from the available images in the media folder.
![Create Product](https://user-images.githubusercontent.com/3782848/193992538-e668d4d7-1d44-49fc-b89a-33752593212a.png
"Create Product")

### View Product
Viewing a product can happen in two ways, via Livewire Rendering the state of the component, or directly via the Laravel Show Route.
Each Product, can be Edited, liked, disliked, or commented on via UI. All of these functions are possible without reloading the page a single time.

![View Product](https://user-images.githubusercontent.com/3782848/193990492-776127e5-ec3c-4016-b03a-1dbe51aac225.png
"View Product")


### Edit A Comment
The edit product form is reused by the edit page so that we DRY, the params are prefilled with the relevant Porduct Model, so there is no worries that we will edit the incorrect product.
We can also access this route via Laravel Controller
![Edit Comment](https://user-images.githubusercontent.com/3782848/193992538-e668d4d7-1d44-49fc-b89a-33752593212a.png
"Edit Comment")

### View User Profile
When viewing the products table, or a product, you can visit a user Profile to see all products that belong to that user, from there you can also click any products for that user & view the product details.
![User Profile](https://user-images.githubusercontent.com/3782848/193995700-b3110d0d-fb67-48bb-a0b1-328788f4d40d.png
"User Profile")
