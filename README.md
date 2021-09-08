## Setup

### Clone the project from Git and cd into the project directory.

<p>git clone https://github.com/philipokumu/company-management-system.git</p>
<p> cd company-management-system</p>

### Install backend dependencies

composer install

### Install frontend dependencies

npm install

npm run dev

### Create a database and set the environment variables in .env file.

### Also add your mail trap credentials on

<p>MAIL_MAILER=smtp</p>
<p>MAIL_HOST=smtp.mailtrap.io</p>
<p>MAIL_PORT=2525</p>
<p>MAIL_USERNAME='Your smtp username'</p>
<p>MAIL_PASSWORD='Your smtp password'</p>

### Migrate the database

php artisan migrate:fresh --seed
