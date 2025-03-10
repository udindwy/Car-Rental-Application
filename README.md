# Car Rental Application

The Car Rental Application is a web-based system developed using Laravel 11 and Livewire. This application enables users to manage car rentals with comprehensive features.

## Features
- **User Management:** Registration, login, and user data management.
- **Car Management:** Add, edit, delete, and view available cars.
- **Car Rentals:** Users can rent cars with recorded transactions.
- **Transaction Reports:** Export transaction reports in PDF format.
- **Dynamic Interface:** Uses Livewire for a more responsive interaction.

## Technologies Used
- **Frontend:** Livewire
- **Backend:** PHP (Laravel 11)
- **Database:** SQLite

## How to Run the Application
1. Download the repository or run the command `git clone link_project` via CMD or Terminal.
2. Navigate to the downloaded project folder.
3. Run the command `composer install` to install dependencies.
4. Rename the `.env.example` file to `.env`.
5. Ensure the database configuration in the `.env` file is set to SQLite, then run the command:
   ```bash
   php artisan migrate --seed
   ```
6. Run the following commands to ensure the system functions properly:
   ```bash
   php artisan storage:link
   php artisan key:generate
   ```
7. Start the application with the command:
   ```bash
   php artisan serve
   ```
8. Open the provided link in the terminal using your preferred browser.

## Contribution
If you wish to contribute to this project, please submit a pull request. We welcome suggestions and improvements from the community.

