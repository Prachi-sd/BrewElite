# BrewElite
An Application To create a perfectly curated list of beers
___
- How to Install
    -
    1. clone the git repository / pull the latest commits on master
    2. cd to BrewElite Directory that contains the Laravel project
    3. create Database For app - default name is `brewelite`
    4. update .env variables accordingly
    3. run command  `composer install`
    4. run command `composer dump-autoload`
    5. run command `php artisan migrate`
    6. run command `php artisan migrate --seed`
    7. run command `php artisan serve`

- After Installation the application will be available on Development localhost @ http://127.0.0.1:8000/
login to the system using the following Credentials
`Username : admin@brewelite.com`
`Password : Brew@1234 `
___
- Features
    -
    1. Forms For Adding Breweries
    2. Forms For Adding Beer Labels
    3. A JSON endpoint to display all Beer Labels @route `/getbeerlables`
    4. A JSON endpoint to display all Beer Labels Belonging to a particular Brewery @route `/getbeerlablesbybrewery/{id}` where {id} is Brewery id
    5. Dashboard Metrics That Displays
        - Total Number of Breweries
        - Total Number of Beer Labels
        - List of all the Breweries
        - List of all the Beer Labels
        - Actions to delete Breweries and Beer u with Foreign key check
        - Actions to edit Breweries and Beer Labels
    6. A JSON endpoint for beer Labels with pagination @route `\getbeerspaginate`

___
- References
    -
    1. UI - Obtained From Creative Tim @ `https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/quick-start.html`
