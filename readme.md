# WordPress Project Setup using WP-CLI

This guide will help you set up a WordPress project using WP-CLI.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP (version 7.4 or higher)
- MySQL or MariaDB
- Web server (Apache or Nginx)
- Composer (optional, for managing PHP dependencies)

## Installation Steps

### 1. Install WP-CLI

WP-CLI is a command-line interface for WordPress. You can install it by following these steps:

1. Download the WP-CLI Phar file:

    ```sh
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    ```

2. Verify the Phar file is working:

    ```sh
    php wp-cli.phar --info
    ```

3. Make the Phar file executable and move it to a directory in your PATH:

    ```sh
    chmod +x wp-cli.phar
    sudo mv wp-cli.phar /usr/local/bin/wp
    ```

4. Verify WP-CLI is installed correctly:

    ```sh
    wp --info
    ```

### 2. Set Up WordPress

1. Create a new directory for your WordPress project and navigate into it:

    ```sh
    mkdir my-wordpress-site
    cd my-wordpress-site
    ```

2. Download the latest version of WordPress:

    ```sh
    wp core download
    ```

3. Create a `wp-config.php` file:

    ```sh
    wp config create --dbname=your_db_name --dbuser=your_db_user --dbpass=your_db_password --dbhost=localhost
    ```

4. Create the database:

    ```sh
    wp db create
    ```

5. Install WordPress:

    ```sh
    wp core install --url="http://your-site-url.com" --title="Your Site Title" --admin_user="admin" --admin_password="admin_password" --admin_email="your-email@example.com"
    ```

## Troubleshooting

If you encounter any issues during the installation, here are some common solutions:

- **Permission Issues**: Ensure you have the necessary permissions to execute commands and write to directories.
- **PHP Errors**: Make sure your PHP version meets the minimum requirements and all necessary PHP extensions are installed.
- **Database Connection Errors**: Verify your database credentials and ensure the database server is running.

For more detailed information, refer to the [WP-CLI documentation](https://wp-cli.org/).
