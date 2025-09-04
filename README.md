# Online Exam Portal

## Overview

This project is an **Online Exam Portal** built using **Laravel** and **MongoDB**.  
The portal allows students to register, log in, select an exam, attempt questions, and view their scorecard after submission.

---

## Tech Stack

-   **Backend:** Laravel (latest version)
-   **Database:** MongoDB
-   **Authentication:** Laravel’s built-in authentication

---

## Features

### 1. Authentication

-   Students can **register** and **log in**.
-   Only **logged-in students** can access exams.

### 2. Exam Management

-   **Collections / Migrations** created for:

    -   `Exams` (exam name, description)
    -   `Questions` (question text, options, correct answer, exam_id)
    -   `Answers` (student_id, exam_id, question_id, selected_option)

-   **Seeders** are used to insert dummy data:
    -   At least **2 exams**
    -   Each exam has **at least 5 questions**

### 3. Taking Exam

-   Logged-in students can **select an exam** from a list.
-   Start exam → Show **one question at a time** (or all questions).
-   Students can **select answers** and submit them.

### 4. Scorecard

-   After submission, the system calculates:

    -   **Total questions**
    -   **Correct answers**
    -   **Wrong answers**
    -   **Final score**

-   Scorecard is displayed to the student.

---

## Technical Requirements

1. **Migrations** for MongoDB collections
2. **Seeders** to pre-populate exams and questions
3. **Models** for:
    - `User`
    - `Exam`
    - `Question`
    - `Answer`
    - `Student` (User model)
4. **Controllers** to manage the exam flow

5. **Routes** for:
    - Authentication (login/register)
    - Exam listing
    - Starting exam
    - Submitting answers
    - Viewing scorecard
6. **Prevent multiple submissions** for the same exam by the same student.

---

## Installation & Setup

1. Clone the repository:

```bash
git clone <repository-url>
cd online-exam-portal

Install dependencies:
composer install
npm install
npm run dev


Configure .env:
.env.example copay and past rename .env


Configure .env:

# set const variable value databse
DB_DATABASE=exam_portal
DB_USERNAME=<username>
DB_PASSWORD=<password>

# Generate application key: CLI
php artisan key:generate

# Run Migrations & Seeders:
php artisan migrate
php artisan db:seed

# Start Laravel development server:
php artisan serve
```

# Usage

Visit /register to create a new student account.
Log in at /login.
Go to /exams to see the list of available exams.
Start an exam, select answers, and submit.
View your scorecard after submission.
To view all past exam scores, visit /exams/scores.

<!-- Database Structure -->

Collections:
Exams
_id
name
description
created_at
updated_at

Questions
_id
exam_id
question_text
options (array)
correct_answer
created_at
updated_at

Answers
\_id
student_id
exam_id
question_id
selected_option
created_at
updated_at

<!-- Evaluation Criteria --> SiteMap

Clean and structured code quality
Proper use of Laravel + MongoDB
Working exam flow: login → exam → scorecard
Use of migrations and seeders
Prevention of multiple submissions for the same exam

<!-- Notes -->

This project uses the jenssegers/laravel-mongodb package for MongoDB support.

Frontend is built using Laravel Blade and Bootstrap.

You can customize the exam questions by updating the ExamSeeder.

online-exam-portal/
│
├─ app/
│ ├─ AuthAuthentication/ #laravelBreez use
│ ├─ Models/
│ │ ├─ Exam.php
│ │ ├─ Question.php
│ │ └─ Answer.php
│ └─ Http/Controllers/
│ └─ ExamController.php
│
├─ database/
│ ├─ seeders/
│ │ └─ ExamSeeder.php
│ └─ migrations/ (optional for MongoDB)
│
├─ resources/views/
│ ├─ exams/
│ │ ├─ index.blade.php
│ │ ├─ start.blade.php
│ │ └─ scorecard.blade.php
| | |_scorecard.blade.php
│ └─ dashboard.blade
│ └─ welcome.blade
│ └─ layouts/
│ └─ app.blade.php
│
├─ routes/
│ └─ web.php
│
├─ .env.example
└─ composer.json

<!-- Note: -->
    I used the authentication package as it is, without making any changes to its template design.
    For all other Blade views, I used Bootstrap for styling.

Frontend and Design
|____Authentication
|        The authentication (login, register, password reset) uses Laravel’s built-in authentication scaffolding.
|        No changes were made to the default authentication template; it remains as provided by the package. 
|____Exam Views
|    |    All other pages, such as exam listing, exam start, and scorecard, are built using Laravel Blade templates.
|    |____Bootstrap is used for styling these pages, including:
|            Responsive layouts
|            Forms for selecting answers
|            Buttons and lists for exams and questions
|            Tables and cards for displaying the scorecard
|____Consistency
|        The frontend design ensures a clean and simple interface.
|        Students can easily navigate between exam listing → exam → submission → scorecard.
|____Responsiveness
|        Pages are designed to be mobile-friendly using Bootstrap’s grid system.
|        Buttons, forms, and lists adjust automatically on smaller screens.
|____Customizations
        While the authentication templates remain default, all other pages are fully customized with Bootstrap, ensuring a consistent and user-friendly design across the portal.
