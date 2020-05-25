# Laravel or Laravel Permission bug

### Steps to setup

1. Clone the repository
2. run following
    * `composer install`
    * `php artisan migrate`
    * `php artisan db:seed` _(Select any option while seeding roles seeder, if seeding for the first time.)_
    * `npm install`
    * `npm run dev`
3. Register
4. Login
5. Go to `/bug`, it should ideally return role objects of roles that user has _(i.e. that you selected while registering)_, but it is showing role objects of `ids` stored in model-roles pivot table.
6. The issue gets solved, if you comment out `auth()->user()->roles` line from `ProductCategory` within `products` relation. OR, if you `load` the roles first before calling `role` relation on user.
