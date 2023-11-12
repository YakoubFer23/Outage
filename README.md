<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About Outage

Outage is a simple web application developped in Laravel during my time at Wavescall. Its purpose is to enable supervisors to add different data and voice outages informations so that call center operators can access them easily.


## Installation

- Clone the repository
- Run composer update
- Rename .env.example to .env
- Run php artisan key:generate
- Create the database outage
- Run migrations
- Run seeders
- Serve

## Features
- Admin Role have access to add an entry to the database, en entry constitues of a title, state and a thumbnail.
- Admin Role have access to modify his password.
- Super Admin role can view the logs which shows which admin added or deleted an entry.
- Regular users have a simple read only role where they can browse the entries and click on them to view the thumbnail. 

### To Implement

- Add a feature that allows the super admin to create accounts and change their roles.
- Fix the logs page so that it dynamically references the user id from the users table.
