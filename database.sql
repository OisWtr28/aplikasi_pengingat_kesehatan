CREATE DATABASE aplikasi_kesehatan;
USE aplikasi_kesehatan;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(100)
);

CREATE TABLE reminders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    judul VARCHAR(255),
    deskripsi TEXT,
    waktu DATETIME,
    gambar VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
