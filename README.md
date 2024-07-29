
# PointPro

PointPro is an application designed to enable businesses to offer lending solutions to their customers or allow customers to save for purchasing commodities.

## Table of Contents
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [Usage](#usage)
- [License](#license)

## Prerequisites

Before installing PointPro, ensure you have the following:

- **Google Credentials**: For Socialite login integration.
- **Intasend Credentials**: For payment processing.
- **Server Virtualization**: Tools like Ngrok if you cannot host your server directly.

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/your-username/pointpro.git
   cd pointpro
   ```

2. **Install Dependencies**

   Make sure you have [Composer](https://getcomposer.org/) installed, then run:

   ```bash
   composer install
   ```

3. **Environment Setup**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**

   Run the following command to generate an application key:

   ```bash
   php artisan key:generate
   ```

5. **Set Up Environment Variables**

   Edit the `.env` file to include your credentials and configuration:

   - **Google Credentials**:
     - `GOOGLE_CLIENT_ID`
     - `GOOGLE_CLIENT_SECRET`
   
   - **Intasend Credentials**:
     - `INTASEND_API_KEY`
     - `INTASEND_SECRET_KEY`
   
   - **Server Virtualization (Ngrok)**:
     - If using Ngrok, set the `APP_URL` to your Ngrok URL (e.g., `https://your-ngrok-url.ngrok.io`).

6. **Database Setup**

   Configure your database settings in the `.env` file and then run:

   ```bash
   php artisan migrate
   ```

## Configuration

- **Socialite Login**: Follow [Laravel Socialite documentation](https://laravel.com/docs/10.x/socialite) to set up Google login.
- **Payment Integration**: Refer to [Intasend documentation](https://docs.intasend.com/) for integrating payment solutions.

## Running the Application

Start the development server with:

```bash
php artisan serve
```

If using Ngrok, run:

```bash
ngrok http 8000
```

Access the application at the Ngrok URL or localhost URL provided.

## Usage

Once set up, you can access PointPro via the provided URL. You will be able to:
- Enable businesses to lend to their customers.
- Allow customers to save for purchasing commodities.

## License

This project is licensed under the [MIT License](LICENSE).

---

For any issues or contributions, please open an issue or a pull request on [GitHub](https://github.com/your-username/pointpro).
```

Feel free to replace placeholders like `https://github.com/your-username/pointpro` with your actual repository URL.