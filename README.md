# Online Exam Registration System (OERS)

## 1. Project Overview

The **Online Exam Registration System (OERS)** is a web-based system developed to simplify and digitize the examination registration process for students and administrators.

The system replaces a largely manual examination registration process with an online platform where students can create accounts, log in, view available examinations, submit examination registration requests, and monitor the status of their registrations.

Administrators can log in to an administrative dashboard, manage examinations, view registered students, monitor registration requests, and approve or reject student registrations.

The system was developed as part of the **Industry-Based Learning (IBL) / Software Development Life Cycle (SDLC)** module.

---

## 2. Main Objectives

The main objectives of OERS are to:

* Provide students with an online examination registration platform.
* Reduce manual paperwork and physical registration processes.
* Allow students to view available examinations.
* Allow students to submit examination registration requests.
* Allow students to track their registration status.
* Allow administrators to manage examinations.
* Allow administrators to manage and monitor student registrations.
* Improve the accuracy and organization of examination registration records.
* Provide a centralized database for storing examination registration information.

---

## 3. Main Users

### Students

Students are the primary users of the system. They can:

* Create an account.
* Log in to the system.
* Access their student dashboard.
* View available examinations.
* Register for examinations.
* View their registered examinations.
* Check whether their registration is pending or approved.
* Manage their account information.

### Administrators

Administrators are responsible for managing the system. They can:

* Log in to the administrator dashboard.
* View system statistics.
* Manage examinations.
* View students.
* View examination registrations.
* Approve or reject registration requests.
* Monitor the overall registration process.

---

## 4. Technologies Used

The system was developed using the following technologies:

| Technology | Purpose                       |
| ---------- | ----------------------------- |
| PHP        | Server-side programming       |
| MySQL      | Database management           |
| HTML       | Web page structure            |
| CSS        | Styling and responsive design |
| JavaScript | Client-side functionality     |
| XAMPP      | Local development server      |
| phpMyAdmin | Database management           |
| Git        | Version control               |
| GitHub     | Source code repository        |

---

# 5. System Requirements

Before installing the project, make sure the computer has the following:

* Windows, Linux, or macOS
* XAMPP
* PHP
* MySQL
* Apache
* A modern web browser such as Chrome, Edge, or Firefox
* Git (optional, but recommended)
* A code editor such as Visual Studio Code

### Recommended XAMPP Components

The following XAMPP services are required:

* Apache
* MySQL

---

# 6. Installation

## Step 1: Install XAMPP

Download and install XAMPP on your computer.

After installation, open the **XAMPP Control Panel** and start:

```text
Apache
MySQL
```

Both services should show that they are running.

---

## Step 2: Clone the Repository

Open Git Bash or a terminal and navigate to the XAMPP `htdocs` directory.

For example:

```bash
cd C:/xampp/htdocs
```

Clone the repository:

```bash
git clone <YOUR-GITHUB-REPOSITORY-URL>
```

Alternatively, download the repository as a ZIP file from GitHub and extract it into:

```text
C:\xampp\htdocs\
```

The project folder should be located inside `htdocs`.

For example:

```text
C:\xampp\htdocs\student_system
```

---

# 7. Database Configuration

The system uses **MySQL** as its database management system.

## Step 1: Open phpMyAdmin

Open your browser and go to:

```text
http://localhost/phpmyadmin
```

---

## Step 2: Create the Database

Create a new database named:

```text
oers_db
```

The database name should match the name used in the PHP database connection.

---

## Step 3: Import the Database

If the project contains an SQL database file, for example:

```text
oers_db.sql
```

open phpMyAdmin and:

1. Select `oers_db`.
2. Click **Import**.
3. Select the SQL file.
4. Click **Import** or **Go**.
5. Wait for the tables to be created.

The database contains tables used to store information such as:

* Students
* Administrators
* Examinations
* Examination registrations
* Logs

---

# 8. Database Connection Configuration

The PHP database connection should contain the correct MySQL credentials.

A typical local XAMPP configuration is:

```php
<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "oers_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
```

If the database connection file already exists in the project, update its values if your MySQL configuration is different.

For a standard XAMPP installation:

```text
Host: localhost
Username: root
Password: empty
Database: oers_db
```

---

# 9. Running the System Locally

After starting Apache and MySQL, open a web browser.

If the project folder is called:

```text
student_system
```

open:

```text
http://localhost/student_system/
```

The system's homepage/login page should appear.

---

# 10. How the System Works

The system follows a simple workflow involving students and administrators.

```text
                 ONLINE EXAM REGISTRATION SYSTEM
                              |
              +---------------+---------------+
              |                               |
           STUDENT                        ADMINISTRATOR
              |                               |
           Register                         Login
              |                               |
            Login                     Admin Dashboard
              |                               |
      Student Dashboard             Manage Examinations
              |                               |
      View Examinations              View Registrations
              |                               |
       Register for Exam             Approve / Reject
              |                               |
      Registration Pending                   |
              |                               |
      Check Registration Status              |
              |                               |
       Registration Approved                 |
```

---

# 11. Student Workflow

## Step 1: Student Registration

A new student creates an account by providing the required information through the registration page.

The student's information is stored in the database.

---

## Step 2: Student Login

The student enters their registered credentials on the login page.

The system verifies the credentials against the database.

If the credentials are correct, the student is redirected to the student dashboard.

---

## Step 3: Student Dashboard

The student dashboard provides an overview of the student's examination registration activities.

The dashboard can display information such as:

* Registered examinations
* Pending registrations
* Approved registrations

---

## Step 4: View Available Examinations

The student can view examinations available for registration.

The system retrieves examination information from the database.

---

## Step 5: Register for an Examination

The student selects an examination and submits a registration request.

The registration is stored in the `exam_registrations` table.

The initial registration status is:

```text
Pending
```

---

## Step 6: Check Registration Status

Students can view their submitted registrations and see whether they are:

```text
Pending
Approved
Rejected
```

This allows students to monitor the progress of their registration without having to physically visit an office.

---

# 12. Administrator Workflow

## Step 1: Administrator Login

The administrator logs into the system using administrator credentials.

After successful authentication, the administrator is redirected to the administrator dashboard.

---

## Step 2: Administrator Dashboard

The administrator dashboard provides an overview of the system.

It can display statistics such as:

* Total Students
* Total Examinations
* Total Registrations
* Pending Registrations
* Approved Registrations

---

## Step 3: Manage Examinations

Administrators can manage examination information.

This includes adding and maintaining examination records that students can later view and register for.

---

## Step 4: View Registrations

Administrators can view examination registration requests submitted by students.

The administrator can see information such as:

* Student
* Examination
* Registration information
* Registration status

---

## Step 5: Approve or Reject Registration

The administrator reviews a student's registration request.

The registration status can then be updated from:

```text
Pending
```

to:

```text
Approved
```

or:

```text
Rejected
```

The updated status is stored in the database and can subsequently be viewed by the student.

---

# 13. Database Structure

The system uses a relational MySQL database.

The main tables include:

```text
admins
   |
   |
   +---- manages ---- examinations
                         |
                         |
students ---- exam_registrations ---- examinations
    |
    |
    +---- registration records

logs
```

### Main Tables

#### `admins`

Stores administrator account information.

#### `students`

Stores student account and personal information.

#### `examinations`

Stores information about examinations available for registration.

#### `exam_registrations`

Stores examination registration requests submitted by students.

#### `logs`

Stores relevant system activities for monitoring and record keeping.

---

# 14. Project Structure

The project is organized into different PHP files responsible for different parts of the system.

A simplified structure is:

```text
student_system/
│
├── index.php
├── login.php
├── register.php
├── logout.php
│
├── student/
│   ├── dashboard.php
│   ├── register_exam.php
│   └── registrations.php
│
├── admin/
│   ├── dashboard.php
│   ├── examinations.php
│   └── registrations.php
│
├── config/
│   └── database.php
│
├── css/
│   └── style.css
│
└── README.md
```

> The exact folder structure may differ depending on the final version of the project.

---

# 15. Security Features

The system includes basic security measures such as:

* Login authentication.
* Separate student and administrator interfaces.
* Session-based access control.
* Database validation.
* Input validation.
* Logout functionality.
* Restricted access to administrative functionality.

For a production deployment, additional security features such as stronger password hashing, HTTPS, multi-factor authentication, advanced authorization, and additional input sanitization should be implemented.

---

# 16. Testing

The system was tested during development to ensure that its main functions work correctly.

Testing included:

* Student account registration.
* Student login.
* Administrator login.
* Viewing examinations.
* Examination registration.
* Viewing registration records.
* Approval and rejection of registrations.
* Dashboard statistics.
* Logout functionality.
* Database connectivity.
* Form validation.
* Navigation between system pages.

The system was also tested using different user actions to identify and correct PHP, SQL, and database relationship errors.

---

# 17. Common Problems and Solutions

### Apache is not starting

Check whether another application is using port `80` or `443`.

You can also change the Apache port through the XAMPP configuration.

---

### MySQL is not starting

Check whether another MySQL service is already running.

Restart XAMPP or change the MySQL port if necessary.

---

### Database connection failed

Check:

```text
Database name
Username
Password
MySQL status
```

For a default XAMPP installation, the configuration is usually:

```text
Host: localhost
Username: root
Password:
Database: oers_db
```

---

### Page not found

Make sure the project is located inside:

```text
C:\xampp\htdocs\
```

Then verify the URL, for example:

```text
http://localhost/student_system/
```

---

### Unknown database error

Make sure the database:

```text
oers_db
```

has been created and the SQL file has been imported successfully.

---

# 18. Future Improvements

The system can be enhanced in the future by adding:

* Email notifications.
* SMS notifications.
* Password reset through email.
* Two-factor authentication.
* Advanced role-based access control.
* Student examination eligibility verification.
* Automated examination scheduling.
* Online payment integration where required.
* More detailed administrative reports.
* Exporting reports to PDF or Excel.
* Improved mobile responsiveness.
* Cloud deployment.
* Integration with an existing university student information system.
* More advanced audit logging.

---

# 19. Development Methodology

The project followed the **Software Development Life Cycle (SDLC)**.

The major stages included:

```text
Requirements Analysis
        ↓
System Design
        ↓
Database Design
        ↓
Implementation
        ↓
Testing
        ↓
Deployment
        ↓
Maintenance / Future Enhancement
```

Each stage contributed to the development of the final system.

---

# 20. Conclusion

The Online Exam Registration System provides a practical solution for managing examination registration electronically. It allows students to register for examinations and monitor their registration status while providing administrators with tools for managing examinations and processing registration requests.

The project provided practical experience in requirements analysis, database design, PHP development, MySQL, frontend development, debugging, testing, Git, and GitHub. It also demonstrated how the Software Development Life Cycle can be applied to develop a functional system that addresses a real-world institutional problem.

---

## 21. Author

**Developed by:** Amon Kipkemboi
**Institution:** Technical University of Kenya
**Course:** Bachelor of Information Technology
**Project:** Online Exam Registration System (OERS)

---

## 22. License

This project was developed for educational and academic purposes as part of the Industry-Based Learning module.




 
