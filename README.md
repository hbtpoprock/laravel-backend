1. Update Database Configuration:
- Open the .env file in your project's root directory and update the database connection settings to use MySQL. Modify the following lines with your MySQL database details

```
DB_CONNECTION=mysql
DB_HOST=your_mysql_host
DB_PORT=your_mysql_port
DB_DATABASE=your_database_name
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```

- Replace the placeholders (your_mysql_host, your_mysql_port, your_database_name, your_mysql_username, your_mysql_password) with your actual MySQL database information.


2. Run Migrations:
- Now that you've configured your database settings, you can run the migrations to create the necessary tables in the MySQL database

```
php artisan migrate
```


3. Using PHP Development Server:
- Open a terminal/command prompt and navigate to the root directory of your Laravel project.
- Run the following command to start the PHP development server:

```
php artisan serve
```

- This command will start the development server, and you'll see output indicating that the server is running.
- By default, the server will run on http://localhost:8000. You can access your Laravel application by opening this URL in your web browser




4. Create a User:
- Now you can use the tinker artisan command to create a user. Open a terminal and run:

```
php artisan tinker
```

- Inside the tinker shell, you can create a user with the following commands:

```
use App\Models\User;

$user = new User;
$user->name = 'Your Name';
$user->email = 'your.email@example.com';
$user->password = bcrypt('your-password');
$user->save();
```

- Replace 'Your Name', 'your.email@example.com', and 'your-password' with the desired values for the user.
