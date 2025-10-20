# WebixApp - PHP + Webix Authentication System

A modern, responsive web application built with PHP, Webix UI framework, and CSS3. Features user authentication, form validation, and a dynamic dashboard with sidebar navigation.

## 🚀 Features

- **User Authentication**: Secure signup and login with session management
- **Form Validation**: Comprehensive client-side and server-side validation
- **Responsive Design**: Mobile-first approach with animated UI components
- **Dashboard**: Interactive home page with toggleable sidebar navigation
- **User Management**: Complete user profile display and management
- **Security**: Password hashing, SQL injection protection, and prepared statements
- **Modern UI**: Webix components with custom dark theme and animations

## 🛠️ Technologies Used

- **Backend**: PHP 8+ with strict types and modern features
- **Frontend**: Webix UI Framework with custom CSS3
- **Database**: MySQL with prepared statements
- **Security**: Password hashing, session management, input validation
- **Styling**: Responsive CSS3 with animations and dark theme

## 📋 Prerequisites

- XAMPP (Apache + MySQL + PHP)
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Modern web browser with JavaScript enabled

## 🔧 Installation & Setup

### 1. Clone/Download the Project

```bash
# If using Git
git clone <repository-url>
cd webixapp

# Or download and extract to your XAMPP htdocs folder
```

### 2. XAMPP Setup

1. **Start XAMPP Services**:
   - Open XAMPP Control Panel
   - Start Apache and MySQL services
   - Ensure both services are running (green status)

2. **Database Configuration**:
   - The application will automatically create the database and tables on first run
   - Database name: `webixapp`
   - Default MySQL credentials (root with no password) are used

### 3. File Permissions

Ensure the web server has read access to all files:
```bash
# On Linux/Mac
chmod -R 755 /Applications/XAMPP/xamppfiles/htdocs/webixapp
```

### 4. Access the Application

Open your web browser and navigate to:
```
http://localhost/webixapp/pages/signup.php
```

## 🗄️ Database Schema

The application automatically creates the following table structure:

```sql
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    mobile VARCHAR(30) NOT NULL,
    dob DATE NOT NULL,
    age INT NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    graduation VARCHAR(100) NOT NULL,
    masters_done TINYINT(1) NOT NULL DEFAULT 0,
    masters_degree VARCHAR(100) NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## 📁 Project Structure

```
webixapp/
├── auth/                    # Authentication handlers
│   ├── login.php           # Login processing
│   ├── logout.php          # Logout handler
│   └── signup.php          # User registration
├── assets/                 # Static assets
│   ├── css/
│   │   └── styles.css      # Main stylesheet
│   ├── js/
│   │   ├── webix-config.js # Webix configuration
│   │   └── validation.js   # Client-side validation
│   └── img/                # Images
├── includes/               # PHP includes
│   ├── auth_check.php      # Authentication utilities
│   └── db.php              # Database connection
├── pages/                  # Main application pages
│   ├── home.php            # Dashboard home
│   ├── login.php           # Login page
│   ├── signup.php          # Registration page
│   ├── about.php           # About page
│   ├── contact.php         # Contact form
│   └── user_details.php    # User profile
├── database/
│   └── schema.sql          # Database schema export
├── README.md               # This file
└── TEST_CASES.md           # Testing documentation
```

## 🎯 Usage

### User Registration

1. Navigate to the signup page
2. Fill in all required fields:
   - Full Name (2-50 characters, letters and spaces only)
   - Username (3-20 characters, letters, numbers, underscore)
   - Mobile Number (exactly 10 digits)
   - Date of Birth (cannot be in the future)
   - Email (valid email format)
   - Password (8+ chars with uppercase, lowercase, number, special char)
   - Graduation Qualification (select from dropdown)
   - Masters Degree (conditional field if "Yes" selected)

3. Click "Submit" to create your account

### User Login

1. Navigate to the login page
2. Enter your username and password
3. Click "Login" to access the dashboard

### Dashboard Navigation

- **Home**: Welcome page with user stats and recent activity
- **About**: Information about the application and technologies used
- **User Details**: Complete profile information display
- **Contact**: Contact form and company information

### Sidebar Toggle

- Click the hamburger menu (☰) in the top-left to toggle the sidebar
- On mobile devices, the sidebar automatically collapses

## 🔒 Security Features

- **Password Security**: All passwords are hashed using PHP's `password_hash()`
- **SQL Injection Protection**: All database queries use prepared statements
- **Input Validation**: Both client-side and server-side validation
- **Session Management**: Secure session handling with proper cleanup
- **XSS Protection**: All user input is properly escaped when displayed

## 🧪 Testing

See `TEST_CASES.md` for comprehensive testing scenarios including:

- Form validation testing
- Authentication flow testing
- Session management testing
- Responsive design testing
- Security testing

## 🚀 Deployment

### Local Development (XAMPP)

1. Follow the installation steps above
2. Access via `http://localhost/webixapp/`

### Production Deployment

1. **Web Server Setup**:
   - Upload files to your web server
   - Ensure PHP 8+ and MySQL are available
   - Configure Apache/Nginx virtual host

2. **Database Setup**:
   - Create MySQL database
   - Update database credentials in `includes/db.php`
   - Import schema from `database/schema.sql`

3. **Environment Configuration**:
   - Set appropriate file permissions
   - Configure PHP settings for production
   - Enable HTTPS for security

### GitHub to Cursor Deployment

1. **Clone Repository**:
   ```bash
   git clone <repository-url>
   cd webixapp
   ```

2. **Setup Local Environment**:
   - Install XAMPP or similar local server
   - Follow installation steps above

3. **Cursor Integration**:
   - Open project in Cursor
   - Use built-in terminal for PHP/MySQL commands
   - Leverage Cursor's AI features for development

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**:
   - Ensure MySQL is running in XAMPP
   - Check database credentials in `includes/db.php`
   - Verify database exists

2. **Session Issues**:
   - Check PHP session configuration
   - Ensure proper file permissions
   - Clear browser cookies/cache

3. **Webix Not Loading**:
   - Check internet connection (CDN dependency)
   - Verify JavaScript is enabled
   - Check browser console for errors

4. **Form Validation Not Working**:
   - Ensure JavaScript is enabled
   - Check browser console for errors
   - Verify validation.js is loaded

### Debug Mode

Enable PHP error reporting by adding to the top of PHP files:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

## 📝 License

This project is open source and available under the MIT License.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📞 Support

For support and questions:
- Create an issue in the repository
- Contact via the application's contact form
- Email: contact@webixapp.com

---

**Built with ❤️ using PHP, Webix, and modern CSS**



