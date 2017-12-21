# Migration & seeding

## Reverse seeding
We use iSeed generator, https://github.com/orangehill/iseed

### Command
```bash
php artisan iseed my_table
php artisan iseed my_table,another_table

```
Then reset `DatabaseSeeder.php` if you don't want to consider generated seeds class automatically.
One by one seeding `php artisan db:seed --class="{path to}MySeed"`