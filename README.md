# 🌐 News & Articles Frontend (Laravel 12 + Alpine.js)

This is the frontend consumer application built with **Laravel 12** and **Alpine.js**. It serves as the user-facing interface, fetching content (Articles, Categories, and Pages) via **JSON APIs** from the main administrative dashboard.



## ⚡ Tech Stack
* **Framework:** Laravel 12
* **Frontend Logic:** Alpine.js (for reactive UI components)
* **Styling:** Tailwind CSS
* **Data Source:** JSON API via Laravel HTTP Client (Guzzle)

---

## 🛠 Prerequisites
* **PHP:** >= 8.2
* **Composer**
* **Node.js & NPM**
* **Backend API:** Ensure the [Backend Project] is running and accessible.

---

## 📥 Installation Steps

### 1. Clone the Project
```bash
git clone (https://github.com/Hassan-laravel/News.git)
cd frontend-ui-repo

2. Install Dependencies
# Install Laravel packages
composer install

# Install and compile frontend assets
npm install
npm run build

3. Environment Setup
Copy the example environment file and generate your application key:
cp .env.example .env
php artisan key:generate
4. API Configuration
In your .env file, you must point to the backend project's URL to fetch the JSON data:
BACKEND_API_URL=(https://dashbord-main-oubfum.laravel.cloud)


🛰 How it Works (Data Flow)
The application doesn't have a local database for content. Instead, it uses Laravel's Http client to fetch data from the JSON links provided by the Backend:

Categories: Fetched from ${BACKEND_API_URL}/api/categories to build the navigation.

Articles: Fetched from ${BACKEND_API_URL}/api/posts to populate the news feed.

Pages: Fetched from ${BACKEND_API_URL}/api/pages for static content.

UI Components (Alpine.js)
This project uses Alpine.js for:

Mobile menu toggles.

Dynamic filtering of articles without page reloads.

Search functionality over the JSON data.
