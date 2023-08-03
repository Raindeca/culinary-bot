# Culinary Bot - Telegram Bot for Restaurant Recommendations

Culinary Bot is a Telegram bot designed to provide restaurant recommendations based on user input. The bot uses the Yelp Fusion API to search for nearby restaurants or food based on location or keywords provided by the user.

## Table of Contents

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Configuration](#configuration)
- [Usage](#usage)
- [Bot Commands](#bot-commands)
- [API Reference](#api-reference)
- [Contributing](#contributing)
- [License](#license)

## Getting Started

These instructions will help you set up and run the Culinary Bot project on your local machine.

### Prerequisites

- PHP 7.2 or higher
- Composer
- PostgreSQL database
- Telegram Bot Token (obtained from BotFather on Telegram)
- Yelp Fusion API Key (obtained from [Yelp Developer](https://www.yelp.com/developers/documentation/v3/authentication))

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/culinary-bot.git
   cd culinary-bot
   ```

2. Install the project dependencies using Composer:

   ```bash
   composer install
   ```

3. Set up the PostgreSQL database and update the database configuration in `.env`:

   ```
   DB_CONNECTION=pgsql
   DB_HOST=your_db_host
   DB_PORT=your_db_port
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password
   ```

4. Set up your Telegram Bot Token and Yelp Fusion API Key in `.env`:

   ```
   TELEGRAM_BOT_TOKEN=your_telegram_bot_token
   YELP_API_KEY=your_yelp_api_key
   ```

5. Run the database migrations:

   ```bash
   php artisan migrate
   ```

6. Start the development server:

   ```bash
   php artisan serve
   ```

### Configuration

- **Webhook**: To set up the webhook for your Telegram bot, run the following command:

  ```bash
  php artisan setWebhook
  ```

  This will set the Telegram webhook URL to the one specified in the `TELEGRAM_WEBHOOK_URL` environment variable.

- **Ngrok**: To set up local HTTP Server:

  ```bash
  ngrok http 8000
  ```

  This will set the Telegram webhook URL to the one specified in the `TELEGRAM_WEBHOOK_URL` environment variable.

## Usage

1. Start a conversation with the bot on Telegram.
2. Use the `/search {location_name}` command to begin searching for nearby restaurants or food on that location.
3. The bot will respond with the top restaurant recommendations.

## Bot Commands

The following command is supported by the Culinary Bot:

- `/search {location_name}`: Initiate a search for nearby restaurants or food.

## API Reference

- **Yelp Fusion API**: The bot uses the Yelp Fusion API to search for nearby restaurants or food. Refer to the [Yelp Fusion API Documentation](https://www.yelp.com/developers/documentation/v3) for details on the available endpoints and query parameters.

## Contributing

We welcome contributions to improve Culinary Bot. If you find any issues or want to suggest enhancements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE). Feel free to use, modify, and distribute the code as per the terms of the license.