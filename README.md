## Steps to run the project : 
1. Clone the repo .  <br> <br>
2. Install composer 
   ` composer install`  <br> <br>
3. Install NPM `npm install`  and run npm run dev<br> <br>
4. Edit `.env` file with your database configuration .  <br> <br>
5. run migration command <br>
    `php artisan migrate --seed`
   * This will create :
     - 6 pre-defined categories
     - Admin user :
        - Email : `admin@admin.com`
        - Password : `admin1998`  <br> <br>
6. `php artisan key:generate`  <br> <br>
7. php artisan storage:link <br>
8. `php artisan serve`
