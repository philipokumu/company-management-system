## Setup

### Clone the project from Git and cd into your preferred PHP environment.

<p>git clone https://github.com/philipokumu/company-management-system.git</p>
<p> cd company-management-system</p>

### Install backend dependencies

composer install

### Install frontend dependencies

npm install

npm run dev

### Create a database in your php localhost

### Clone .env file and set your database details in the environment variables

cp .env.example .env

### Also add in your mail trap credentials on:

<p>MAIL_MAILER=smtp</p>
<p>MAIL_HOST=smtp.mailtrap.io</p>
<p>MAIL_PORT=2525</p>
<p>MAIL_USERNAME='Your smtp username'</p>
<p>MAIL_PASSWORD='Your smtp password'</p>

### Migrate the database

php artisan migrate:fresh --seed

### Start your server and access the project from the link provided

php artisan serve
