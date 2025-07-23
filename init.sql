CREATE TABLE schools (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','coordinator','superintendent') NOT NULL,
    school_id INT,
    FOREIGN KEY (school_id) REFERENCES schools(id)
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coordinator_id INT NOT NULL,
    school_id INT NOT NULL,
    report_date DATE NOT NULL,
    report_type VARCHAR(255),
    teacher_name VARCHAR(255) NOT NULL,
    notes TEXT,
    file_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (coordinator_id) REFERENCES users(id),
    FOREIGN KEY (school_id) REFERENCES schools(id)
);
