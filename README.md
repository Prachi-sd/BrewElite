# BrewElite
An Application To create a perfectly curated list of beers
___
- How to Install
    -
    1. clone the git repository / pull the latesst commits on master
    2. cd to BrewElite Directory that contains the laravel project
    3. create Database For app - default name is `brewelite`
    4. update .env variables accordingly
    3. run command  `composer install`
    4. run command `composer dump-autoload`
    5. run command `php artisan migrate`
    6. run command `php artisan migrate --seed`
    7. run command `php artisan serve`

- After Installation the applicatin will be available on Development localost @ http://127.0.0.1:8000/
login to the system using the following Credentials
`Username : admin@brewelite.com`
`Password : Brew@1234 `
___
- Featuers
    -
    1. Fomrs For Adding Breweries
    2. Forms For Adding Beer Lables
    3. A JSON endpoint to display all Beer Labels @route `/getbeerlables`
    4. A JSON endpoint to display all Beer Labels Belonging to a perticular Brewery @route `/getbeerlablesbybrewery/{id}` where {id} is Brewery id
    5. Dashboard Metrics That Displays
        - Total Nubmer of Breweries
        - Total Number of Beer Lables
        - List of all the Breweries
        - List of all the Beer Lables
        - Actions to delete Breweries and Beer Lables with Forighn key check
    6. A JSON endpoint for beer lables with pagination @route `\getbeerspaginate`

___
- References
    -
    1. UI - Obtained From Creative Tim @ `https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/quick-start.html`
