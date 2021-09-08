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

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME='Your smtp username'
MAIL_PASSWORD='Your smtp password'

### Migrate the database

php artisan migrate:fresh --seed
