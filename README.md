# Clauber Oliveira - My portfolio

This project is for my personal portfolio. I would like to make it editable so anyone could eventually use it as scratch for their on portfolio.

## Getting Started

Follow the instructions to get started as with any Laravel application.

### Prerequisites

```

NPM
A webserver application(XAMPP or NGINX)
A database appllication(such as MySQL)

```
### Installing

Follow all the steps to start this application just like you would with any laravel appllication.

After downloading the repository into your machine, run the following commands.
```
composer install
cp .env.example .env
php artisan key:generate

############################################
 Optional(at least for now), but recommended
php artisan storage:link
############################################

```
Then setup you database information in the .env file.

Now that we have the php packages installed we will have to install the npm/yarn packages. 
For this example I will be using npm.

```
npm install
npm run watch

```
After the system is ready you can use the following credentials to log into localhost/admin

```
admin
password

```

Currently the website is not doing much, so it doesn't make a lot of sense for you to use it now.

## Trello Board
[Clauber Oliveira - Portfolio](https://trello.com/b/x5wARpYh/clauber-oliveira-portfolio)

## Authors

* **Clauber Oliveira** - *Initial work* - [Clauber Oliveira](https://github.com/Cklauber)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* All those who helped me to be here today.
