# sam-store

This repository contains the codebase for the sam-store project. While a detailed description isn't currently provided, this README outlines the project's technical details, setup, and contribution guidelines.

## Key Features & Benefits

*   **Built with Modern Technologies:** Utilizes JavaScript, PHP, Bootstrap, Node.js, and Tailwind CSS for a responsive and dynamic user experience.
*   **Cart Management System:** Implements a robust cart system with services and providers.
*   **Authentication:** Secure user authentication with Laravel's built-in features.

## Prerequisites & Dependencies

Before you begin, ensure you have the following installed:

*   **PHP:** Version 8.0 or higher
*   **Composer:**  PHP dependency manager
*   **Node.js:** Version 16 or higher
*   **npm:** Node Package Manager (usually included with Node.js)
*   **MySQL or other relational database**
*   **Git:**  For version control

## Installation & Setup Instructions

Follow these steps to install and set up the project:

1.  **Clone the repository:**

    ```bash
    git clone git@github.com:arsham-sh/sam-store.git
    cd sam-store
    ```

2.  **Install PHP dependencies:**

    ```bash
    composer install
    ```

3.  **Install Node.js dependencies:**

    ```bash
    npm install
    ```

4.  **Configure Environment Variables:**

    *   Copy the `.env.example` file to `.env`:

        ```bash
        cp .env.example .env
        ```

    *   Edit the `.env` file and configure the following settings:

        *   `APP_NAME`:  Your application name (e.g., "Sam Store")
        *   `APP_URL`: Your application URL (e.g., "http://localhost")
        *   `DB_CONNECTION`: Database connection type (e.g., "mysql")
        *   `DB_HOST`: Database host (e.g., "127.0.0.1")
        *   `DB_PORT`: Database port (e.g., "3306")
        *   `DB_DATABASE`: Database name (e.g., "sam_store")
        *   `DB_USERNAME`: Database username
        *   `DB_PASSWORD`: Database password

5.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

6.  **Run Database Migrations:**

    ```bash
    php artisan migrate
    ```

7.  **Link Storage Directory:**

    ```bash
    php artisan storage:link
    ```

8.  **Compile Assets:**

    ```bash
    npm run build
    ```

9.  **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    Or, if you prefer using `npm`:

    ```bash
    npm run dev
    ```

10. **Access the Application:**

    Open your web browser and navigate to the `APP_URL` you configured in the `.env` file (e.g., `http://localhost`).

## Project Structure

```
├── .editorconfig
├── .env.example
├── .gitattributes
├── .gitignore
├── README.md
└── app/
└── Helpers/
└── Cart/
├── Cart.php
├── CartService.php
├── CartServiceProvider.php
└── Http/
└── Controllers/
└── Auth/
├── ConfirmPasswordController.php
├── ForgotPasswordController.php
├── LoginController.php
├── RegisterController.php
├── ResetPasswordController.php
├── VerificationController.php
```

## Configuration Options

The project's behavior can be customized through the `.env` file. Key configuration options include database connection settings, application URL, and debugging settings. Consult the `.env.example` file for a comprehensive list of available options.

## Contributing Guidelines

We welcome contributions from the community! To contribute to this project, please follow these steps:

1.  **Fork the repository.**
2.  **Create a new branch for your feature or bug fix.**
3.  **Implement your changes and ensure they are well-tested.**
4.  **Submit a pull request with a clear description of your changes.**

## License Information

The licensing information for this project has not been specified.  Please contact the owner of the repository, arsham-sh, to confirm the license.

## Acknowledgments

*   Bootstrap - For providing a robust and responsive front-end framework.
*   Tailwind CSS - For enabling rapid UI development with utility-first styling.
*   Font Awesome -  For providing a comprehensive icon library.
