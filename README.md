# Community-Platform
Community Platform

A web-based community platform with user authentication, member management, and community engagement features.

 1.Features

a. User Authentication
- Secure login system for existing users
- New user registration with email verification
- Password hashing and security measures
- Session management
- Password reset functionality

b.Community Dashboard
- Centralized hub for community activities
- Real-time community updates
- Key metrics visualization
- Activity feed
- Announcement board

c.Member Directory
- Searchable member database
- Detailed member profiles
- Profile image upload capability
- Member filtering and sorting options
- Member connection features

2.Project Structure

/community-platform
├── config/         Configuration files
├── includes/           
│   ├── navbar.php     //Navigation bar component
│   └── sidebar.php      //Sidebar component
├── js/                	// JavaScript files
├── images/             //Static images
├── uploads/            //User uploaded content (profile pictures)
├── index.php         // Landing page
├── login.php           //User login
├── register.php        //New user registration
├── dashboard.php      //Community dashboard
├── members.php         //Member directory
├── profile.php              //User profiles
└── logout.php               //Session termination


3.Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- PHP Extensions:
  - PDO
  - MySQLi
  - GD (for image processing)

4.Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/community-platform.git
   ```

2. Create a MySQL database and import the provided SQL schema:
   ```bash
   mysql -u your_username -p your_database_name < database/schema.sql
   ```

3. Configure your database connection:
   - Navigate to `config/`
   - Copy `config.example.php` to `config.php`
   - Update the database credentials in `config.php`

4. Set up the uploads directory:
   ```bash
   chmod 755 uploads/
   ```

5. Configure your web server:
   - Point your web server's document root to the project directory
   - Ensure .htaccess file is properly configured (for Apache)

a.Configuration

Apache Virtual Host Configuration
```apache
<VirtualHost *:80>
    ServerName yourdomainname.com
    DocumentRoot /path/to/community-platform
    
    <Directory /path/to/community-platform>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

b. Environment Variables
Create a `.env` file in the root directory with the following variables:
```
DB_HOST=localhost
DB_NAME=your_database_name
DB_USER=your_database_user
DB_PASS=your_database_password
SMTP_HOST=your_smtp_host
SMTP_USER=your_smtp_user
SMTP_PASS=your_smtp_password
```

c. Security Considerations

- All user passwords are hashed using PHP's password_hash() function
- Input validation and sanitization implemented
- CSRF protection enabled
- XSS prevention measures in place
- Prepared statements used for all database queries
- File upload validation and sanitization

d.Contributing

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/new-feature`
3. Commit your changes: `git commit -m 'Add new feature'`
4. Push to the branch: `git push origin feature/new-feature`
5. Submit a pull request
