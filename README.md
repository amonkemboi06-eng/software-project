 OERS — Online Examination Registration System

 About the Project

The **Online Examination Registration System (OERS)** is a web-based application developed to simplify and digitize the examination registration process for students.

The system provides students with an easy way to create an account, log in, view available examinations, register for examinations, and track their registration status. It also provides administrators with a dashboard where they can manage students, examinations, and examination registration requests.

The project was developed as an academic project at the **Technical University of Kenya (TUK)**.

---

 Features

 Student Features

* Student account registration
* Student login and authentication
* Student dashboard
* View available examinations
* Register for examinations
* View registered examinations
* Check registration status
* View approved and pending registrations
* Forgot password functionality
* Secure logout

 Admin Features

* Administrator login
* Admin dashboard
* View system statistics
* Manage student records
* Manage examinations
* View examination registrations
* Approve or reject registration requests
* Monitor pending and approved registrations
* View system logs
* Secure logout

---

 Technologies Used

The project was developed using the following technologies:

* **PHP** — Backend development and server-side logic
* **MySQL** — Database management
* **HTML5** — Structure of the web pages
* **CSS3** — Styling and responsive design
* **JavaScript** — Client-side functionality
* **Bootstrap** — Responsive user interface
* **XAMPP** — Local development environment
* **phpMyAdmin** — Database administration

---

 Database

The system uses a MySQL database named:

```text
oers_db
```

The main database tables include:

```text
admins
students
examinations
exams
exam_registrations
logs
```

These tables are used to store student information, administrator accounts, examination details, registration records, and system activity.

---

 How the System Works

### Student Process

```text
Register Account
       ↓
     Login
       ↓
Student Dashboard
       ↓
View Examinations
       ↓
Register for Examination
       ↓
Track Registration Status
```

A student can create an account and access the system after logging in. Available examinations can be viewed from the dashboard, and the student can submit an examination registration request. The registration can then be tracked as it moves through the approval process.

### Admin Process

```text
Admin Login
     ↓
Admin Dashboard
     ↓
Manage Students
     ↓
Manage Examinations
     ↓
View Registrations
     ↓
Approve / Reject Registration
```

Administrators have access to system management features and can review examination registration requests submitted by students.

---

 Project Structure

The project contains different PHP pages and folders responsible for handling authentication, dashboards, examination registration, database connections, styling, and other system functionality.

Example structure:

```text
student_system/
│
├── admin/
├── css/
├── js/
├── images/
├── config/
│
├── login.php
├── register.php
├── dashboard.php
├── register_exam.php
├── registrations.php
├── forgot_password.php
├── logout.php
│
└── README.md
```

---

 Installation

### 1. Install XAMPP

Install XAMPP and start the following services:

* Apache
* MySQL

### 2. Add the Project

Copy the project folder into the XAMPP `htdocs` directory:

```text
C:\xampp\htdocs\student_system
```

### 3. Create the Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
oers_db
```

Import the provided SQL file into the database.

### 4. Configure the Database

Make sure the database connection settings match your local XAMPP/MySQL configuration.

Typical settings are:

```text
Host: localhost
Username: root
Password: 
Database: oers_db
```

### 5. Run the Project

Open a web browser and visit:

```text
http://localhost/student_system/
```

The OERS system should now be available locally.

---

 Security

The system includes basic security features such as:

* User authentication
* Session management
* Input validation
* Protected admin pages
* Role-based access
* Logout functionality
* Database validation

Additional security measures can be implemented when deploying the system to a production server.

---

 Responsive Design

The system interface is designed to work on different screen sizes, including:

* Desktop computers
* Laptops
* Tablets
* Mobile phones

The responsive design allows students and administrators to access the system from different devices.

---

 Future Improvements

Future versions of OERS could include:

* Email notifications
* SMS notifications
* Online examination functionality
* PDF examination registration receipts
* Advanced reporting and analytics
* Student profile management
* Two-factor authentication
* Improved password recovery
* Cloud deployment
* Mobile application
* Automated examination scheduling

---

 Project Information

**Project:** Online Examination Registration System (OERS)

**Institution:** Technical University of Kenya

**Project Type:** Academic Project

**Backend:** PHP

**Database:** MySQL

**Development Environment:** XAMPP

---



 
