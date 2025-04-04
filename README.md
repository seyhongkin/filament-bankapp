# Telegram Bot Payment System

A Laravel-based payment system integrated with Telegram Bot API.

## 🚀 Getting Started

### Prerequisites
- PHP 8.0+
- Composer
- Node.js 14+
- npm
- MySQL 5.7+
- Ngrok (for local development)

## 🔧 Installation

### Clone the repository
```bash
git clone https://github.com/seyhongkin/filament-bankapp.git
cd filament-bankapp
```

### Install PHP dependencies
```bash
composer install
```

### Install JavaScript dependencies
```bash
npm i
```

### Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

### .env
```bash
DB_CONNECTION=mysql
DB_HOST=your_db_host
DB_PORT=your_db_port
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

TELEGRAM_BOT_TOKEN=7819975411:AAGJs_gjnOUbQ4058cYDS1DVCa-ZOlDSTXM
TELEGRAM_API_ENDPOINT=https://api.telegram.org
```

### Run migrations
```bash
php artisan migrate
```

### Create admin user
```bash
php artisan make:filament-user
```

### Seed sample data
```bash
php artisan db:seed
```

### Install Ngrok
https://ngrok.com/

### Start Server
```bash
# Laravel development server
php artisan serve

# In another terminal
ngrok http 8000
```

### Set webhook (replace with your Ngrok URL):
```bash
https://api.telegram.org/bot7819975411:AAGJs_gjnOUbQ4058cYDS1DVCa-ZOlDSTXM/setWebhook?url=https://your-ngrok-url.ngrok-free.app/api/telegram/webhook/inbound
```

### Test Payment
```bash
php artisan tinker

# Less than 200$
> app('card_service')->transfer(20);

# Exceeds 200$
> app('card_service')->transfer(402.12);
```