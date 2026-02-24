# Borderless Patient Analytics Dashboard

A comprehensive patient management and analytics system with campaign-specific forms and real-time data visualization.

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- Laravel 12
- MySQL 5.7+
- Composer

### Setup Instructions

1. **Clone and Install Dependencies**
   ```bash
   composer install
   ```

2. **Environment Configuration**
   ```bash
   cp .env.example .env
   ```
   Update `.env` with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=borderless
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

4. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

5. **Seed Database with Sample Data**
   ```bash
   php artisan db:seed
   ```

6. **Start the Development Server**
   ```bash
   php artisan serve --port=8001
   ```

7. **Access the Application**
   - Dashboard: `http://localhost:8001/admin`
   - Analytics: `http://localhost:8001/admin/analytics`

## 📋 Default Credentials

```
Email:    admin@admin.com
Password: password
```

## 🗄️ Database Setup

### Migrations
All database tables are created automatically via migrations:
```bash
php artisan migrate
```

To rollback migrations:
```bash
php artisan migrate:rollback
```

### Seeders
Populate the database with sample data:
```bash
php artisan db:seed
```

Specific seeders can be run individually:
```bash
php artisan db:seed --class=PermissionSeeder
php artisan db:seed --class=CampaignTypeSeeder
php artisan db:seed --class=CampaignTypeSeeder
```

## 📊 Campaign Types

The system supports 4 campaign-specific forms:

1. **General Health Screening** - Comprehensive health checkup form
2. **Swatch Bharat** - Minimal form (name, age, location)
3. **Special HC. Beneficiary** - Clinical form (complaints, diagnosis, treatment)
4. **Awareness Camp** - Health metrics form (height, weight, BMI)

## 🔑 Key Features

- Campaign-specific patient forms
- Real-time analytics dashboard
- Role-based access control
- Patient import/export functionality
- Location management (Countries, States, Districts, Talukas, Villages)
- Responsive admin panel

## 📁 Project Structure

```
borderless/
├── app/
│   ├── Http/Controllers/Admin/     - Admin controllers
│   ├── Models/                     - Database models
│   ├── Services/                   - Business logic
│   └── Imports/Exports/            - Import/Export functionality
├── database/
│   ├── migrations/                 - Database migrations
│   └── seeders/                    - Database seeders
├── resources/views/
│   └── admin/                      - Admin panel views
├── routes/
│   └── web.php                     - Web routes
└── .env.example                    - Environment template
```

## 🔧 Configuration

### Add New Campaign Type

1. Create a new form partial in `resources/views/admin/patients/forms/`
2. Add campaign type to database via migration or seeder
3. Update JavaScript constants in `create.blade.php` and `edit.blade.php`

### Customize Admin Panel

- Modify views in `resources/views/admin/`
- Update routes in `routes/web.php`
- Extend controllers in `app/Http/Controllers/Admin/`

## 🐛 Troubleshooting

### 500 Internal Server Error
- Check `.env` configuration
- Verify database connection
- Review `storage/logs/laravel.log`

### Forms Not Displaying
- Ensure campaign type ID matches form div ID
- Check browser console for JavaScript errors
- Verify all migrations have run successfully

### Permission Denied Errors
- Check user role and permissions
- Run `php artisan db:seed --class=PermissionSeeder`

## 📚 Additional Notes

- All patient data is validated before saving
- Database uses timestamps for audit trails
- Soft deletes are implemented for data retention
- Patient imports support CSV and Excel formats

## 📝 License

This project is proprietary and confidential.

---

**Version**: 1.0
**Last Updated**: February 25, 2026
