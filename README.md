# ContentHub - Headless CMS

A modern, API-first headless CMS built with **PHP** and **Laravel**. ContentHub decouples content management from presentation, allowing you to deliver content across multiple channels (web, mobile, IoT) through a powerful REST API.

## 🎯 Features

- 📝 **Content Management** - Create, edit, and manage content easily
- 🔐 **User Authentication** - Secure user management and permissions
- 🎨 **Custom Content Types** - Define custom content schemas
- 📱 **Multi-channel Delivery** - API for web, mobile, and other platforms
- 🔍 **Content Search** - Full-text search capabilities
- 📊 **Content Versioning** - Track content history and revisions
- 🔄 **Workflow Management** - Draft, review, and publish workflows
- 📦 **Media Management** - Upload and manage media files

## 🛠 Tech Stack

- **PHP 8.1+** - Programming language
- **Laravel 10.x** - Web framework
- **Laravel API** - API development
- **MySQL 8.0+** - Relational database
- **Laravel Eloquent** - ORM
- **JWT Authentication** - Token-based auth
- **Laravel Sanctum** - API authentication
- **Spatie Permissions** - Role-based access

## 📋 Prerequisites

- **PHP 8.1+** installed
- **Composer** package manager
- **MySQL 8.0+** database
- **Git** for version control
- **Node.js & npm** (for frontend assets)

## 🚀 Quick Start

### Installation

```bash
# Clone the repository
git clone https://github.com/lethulukhele/contenthub.git
cd contenthub

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create database
mysql -u root -p
> CREATE DATABASE contenthub;

# Run migrations
php artisan migrate

# Run seeders (optional - creates sample data)
php artisan db:seed

# Build assets
npm run build

# Start development server
php artisan serve
```

Server runs on `http://localhost:8000`

## 📁 Project Structure

```
contenthub/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── ContentController.php
│   │   │   │   ├── MediaController.php
│   │   │   │   └── UserController.php
│   │   │   └── AuthController.php
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   │   ├── Content.php
│   │   ├── ContentType.php
│   │   ├── Media.php
│   │   └── User.php
│   └── Services/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── routes/
│   ├── api.php        # API routes
│   └── web.php        # Web routes
├── resources/
│   ├── js/
│   └── views/
├── config/
├── public/
├── storage/
├── tests/
├── composer.json
├── .env.example
└── README.md
```

## 🔑 API Endpoints

### Authentication
- `POST /api/auth/register` - Register new user
- `POST /api/auth/login` - Login user
- `POST /api/auth/logout` - Logout user
- `POST /api/auth/refresh` - Refresh token

### Content Types
- `GET /api/content-types` - List all content types
- `POST /api/content-types` - Create content type
- `GET /api/content-types/{id}` - Get content type details
- `PUT /api/content-types/{id}` - Update content type
- `DELETE /api/content-types/{id}` - Delete content type

### Content
- `GET /api/content` - List all content
- `POST /api/content` - Create content
- `GET /api/content/{id}` - Get content details
- `PUT /api/content/{id}` - Update content
- `DELETE /api/content/{id}` - Delete content
- `POST /api/content/{id}/publish` - Publish content
- `POST /api/content/{id}/unpublish` - Unpublish content

### Media
- `GET /api/media` - List all media
- `POST /api/media/upload` - Upload media
- `DELETE /api/media/{id}` - Delete media

### Users
- `GET /api/users` - List all users
- `POST /api/users` - Create user
- `GET /api/users/{id}` - Get user details
- `PUT /api/users/{id}` - Update user
- `DELETE /api/users/{id}` - Delete user

## 🔐 Authentication

ContentHub uses JWT (JSON Web Tokens) for API authentication:

```bash
# Login and get token
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","password":"password"}'

# Use token in requests
curl -X GET http://localhost:8000/api/content \
  -H "Authorization: Bearer YOUR_TOKEN"
```

## 📝 Creating Content

### 1. Define Content Type
```php
POST /api/content-types
{
  "name": "Blog Post",
  "slug": "blog-post",
  "fields": [
    {"name": "title", "type": "text"},
    {"name": "body", "type": "textarea"},
    {"name": "featured_image", "type": "media"}
  ]
}
```

### 2. Create Content
```php
POST /api/content
{
  "content_type_id": 1,
  "title": "My First Post",
  "body": "Content goes here...",
  "featured_image": 1,
  "status": "draft"
}
```

### 3. Publish Content
```php
POST /api/content/1/publish
```

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific test file
php artisan test tests/Feature/ContentControllerTest.php
```

## 🚀 Deployment

### Using Docker

```bash
# Build image
docker build -t contenthub .

# Run container
docker run -p 8000:8000 \
  -e DB_HOST=db \
  -e DB_DATABASE=contenthub \
  contenthub
```

### Manual Deployment

```bash
# Clone on server
git clone https://github.com/lethulukhele/contenthub.git

# Install dependencies
composer install --optimize-autoloader --no-dev

# Set production environment
cp .env.production .env

# Run migrations
php artisan migrate --force

# Build assets
npm run production
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👨‍💻 Author

**Lethulukhele** - Full-stack PHP Developer

## 📞 Support

For issues and questions, please open an issue on GitHub.

---

**Built with ❤️ by Lethulukhele**
