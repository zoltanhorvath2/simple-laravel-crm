Installation guide for Simple-Laravel-Crm

Prequisities:

- PHP 8.0.11 <
- MySQL  Ver 8.0.26 <
- Composer version 2.1.6 <
- Npm 7.24.0 <

Installation:

- Run 'git clone https://github.com/zoltanhorvath2/simple-laravel-crm.git'
- Navigate into project root
- Run 'composer install'
- make '.env' file based on '.env.example' and set your database credentials
- Run 'php artisan key:generate'
- Run 'npm install'
- Run 'npm run dev'
- Run 'php artisan migrate:fresh --seed'
- Run 'php artisan serve' and open the page on the port in browser
- Make 'assets/logos' directories for logo assets in public directory
