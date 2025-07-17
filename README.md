# 📇 Contact Management

A Laravel web application to manage contacts. It allows authenticated users to create, edit, view, and soft-delete contacts, while the contact list remains publicly accessible.

---

## 🚀 Features

- Contact list (publicly accessible)
- Contact detail page
- Create a new contact (authentication required)
- Edit contact (authentication required)
- Delete contact with **Soft Deletes** (authentication required)
- Field validations:
  - Name: minimum 5 characters
  - Contact: exactly 9 digits, unique
  - Email: valid format, unique
- User authentication using **Laravel Breeze**
- Admin dashboard with:
  - Bar chart (contacts per month)
  - Pie chart (email domain distribution)
  - Total contacts count
  - Most recently created contact

---

## 🛠️ Tech Stack

- Laravel 10.48.3
- PHP 8.1.0
- Laravel Breeze (authentication scaffolding)
- Blade templates
- Tailwind CSS
- Chart.js
- MySQL / MariaDB

---

## ⚙️ Requirements

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or compatible DB

---

## 💾 Installation

```bash
git clone https://github.com/alessandrogama/contact-management.git
cd contact-management

# Install PHP dependencies
composer install

# Install JS dependencies
npm install && npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Run database migrations and seed initial user
php artisan migrate --seed
