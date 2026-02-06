# News-cms Frontend

A modern, multilingual News Frontend built with **Laravel 12**, **Tailwind CSS 4**, and **Livewire/Volt**. This project serves as a headless consumer for a separate News CMS Backend, providing a fast and SEO-friendly user experience.

## 🚀 Features

- **Multilingual Support**: Fully localized content (Arabic, English, Dutch) with RTL support.
- **Headless Architecture**: Consumes data via a RESTful API from a central dashboard.
- **Modern UI**: Styled with **Tailwind CSS 4** and **DaisyUI 5** for a premium look and feel.
- **Real-time Interactions**: Powered by **Livewire** and **Volt** for dynamic components.
- **SEO Optimized**: Dynamic meta tags, localized slugs, and semantic HTML.

## 📚 Understanding Libraries & Dependencies

### What is a Library?

In programming, a **library** is a collection of pre-written code that developers use to solve common problems (like connecting to a database, styling a button, or making an API request). Instead of writing everything from scratch, we "import" these libraries to make the development faster and more reliable.

### Key Libraries in This Project

#### 🐘 PHP Libraries (Managed by Composer)

These handle the server-side logic and core functionality:

- **`laravel/framework`**: The "engine" of the project. It provides the structure for routes, controllers, and security.
- **`livewire/livewire` & `volt`**: These allow us to create interactive UI components (like search bars or forms) that feel like they are built with React or Vue, but using simple PHP.
- **`astrotomic/laravel-translatable`**: Used to manage database content in multiple languages easily.

#### 📦 JavaScript Libraries (Managed by NPM)

These handle the visual presentation and browser-side interactions:

- **`tailwindcss` (v4)**: A "utility-first" CSS framework used to build the design directly in the HTML.
- **`daisyui` (v5)**: A plugin for Tailwind that provides ready-made components like buttons, modals, and cards with a premium look.
- **`axios`**: A small library used to send request to the external API to fetch the news data.
- **`concurrently`**: A utility that allows us to run multiple terminal commands at once (like starting the PHP server and the CSS compiler together).

### 🖥️ Installation Commands

To install these libraries on your local machine, you must run these two commands in your terminal:

1. **To install PHP libraries**:

    ```bash
    composer install
    ```

    _This reads the `composer.json` file and downloads all required PHP packages into the `vendor/` folder._

2. **To install JavaScript libraries**:
    ```bash
    npm install
    ```
    _This reads the `package.json` file and downloads all required JS packages into the `node_modules/` folder._

## 🌐 API Integration

This project is a **Frontend Consumer**. It does not store news content locally; instead, it fetches it from a remote API.

- **Base URL**: Configurable via `BACKEND_URL` in `.env`.
- **Default/Fallback**: `https://dashbord-main-oubfum.laravel.cloud`

### Consumed Endpoints:

| Endpoint            | Method | Description                                               |
| :------------------ | :----- | :-------------------------------------------------------- |
| `/api/categories/`  | `GET`  | Fetches navigation and category listings.                 |
| `/api/posts/`       | `GET`  | Fetches post listings (supports `category_id` filtering). |
| `/api/posts/{slug}` | `GET`  | Fetches detailed content for a single article.            |
| `/api/pages/{slug}` | `GET`  | Fetches content for static pages (About, Privacy, etc.).  |
| `/api/contact/send` | `POST` | Submits contact form data to the backend.                 |

## 🗄️ Database Tables

The project uses a local database for core Laravel functionality. The primary content tables reside in the backend API.

- `users`: Standard Laravel user management.
- `cache`: Database-backed cache storage.
- `jobs`: For handling asynchronous background tasks.

## ⚙️ Installation & Setup

Follow these steps to run the project on your local server:

1. **Clone the project**:

    ```bash
    git clone <repository-url>
    cd News-cms
    ```

2. **Install Dependencies**:

    ```bash
    composer install
    npm install
    ```

3. **Environment Configuration**:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Set the Backend URL**:
   Open `.env` and configure the link to your News CMS Backend:

    ```env
    BACKEND_URL=https://your-api-domain.com
    ```

5. **Database Setup**:
   The project is configured to use SQLite by default for easy setup.

    ```bash
    # Create the sqlite database file
    touch database/database.sqlite
    # Run migrations
    php artisan migrate
    ```

6. **Build Assets**:

    ```bash
    npm run build
    ```

7. **Run the Development Server**:
    ```bash
    npm run dev
    ```
    _Note: This command runs the PHP server, Vite, and workers concurrently._

## 📂 Project Structure Highlights

- `app/Http/Controllers`: Logic for fetching data from the API and rendering views.
- `app/Services/CategoryService.php`: Centralized service for category-related API calls.
- `resources/views`: Blade templates styled with Tailwind 4.
- `config/language.php`: Configuration for supported languages and RTL settings.
- `routes/web.php`: Frontend routing logic.

---

Built with ❤️ using Laravel.
