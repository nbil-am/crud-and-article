# CRUD and Article

Project ini adalah aplikasi sederhana untuk melakukan operasi **CRUD (Create, Read, Update, Delete)** pada artikel dengan sistem autentikasi user.  
Dibuat menggunakan **PHP Native** dan **MySQL**.

---

## Database Structure

### Users Table

| Field    | Type         | Null | Key | Default | Extra |
|----------|--------------|------|-----|---------|-------|
| uuid     | varchar(50)  | NO   | PRI | uuid()  |       |
| username | varchar(100) | NO   | UNI | NULL    |       |
| email    | varchar(100) | NO   | UNI | NULL    |       |
| password | varchar(225) | NO   |     | NULL    |       |

### Article Table

| Field       | Type        | Null | Key | Default | Extra |
|-------------|-------------|------|-----|---------|-------|
| id          | char(36)    | NO   | PRI | uuid()  |       |
| user_id     | char(36)    | NO   | MUL | NULL    |       |
| title       | varchar(50) | NO   |     | NULL    |       |
| description | text        | YES  |     | NULL    |       |

---

## Installation

1. Clone repository ini:
   ```bash
   git clone https://github.com/username/crud-and-article.git
   cd crud-and-article