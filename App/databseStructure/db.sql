CREATE TABLE role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(200) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    prenome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL,
    validation ENUM('active', 'suspended', 'deleted') DEFAULT 'active',
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE course (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    archive enum("active" , "suspend", "deleted"),
    category_id INT NOT NULL,
    teacher_id int not null,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE ON UPDATE CASCADE
    FOREIGN KEY (teacher_id) REFERENCES teacher_id(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tagsAndCourse (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE enrollment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    student_id INT NOT NULL,
    date_registered DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);
