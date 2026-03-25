CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registered_at DATETIME NOT NULL,
    account_status ENUM('active', 'blocked', 'deleted') NOT NULL DEFAULT 'active',
    last_login_at DATETIME
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(500),
    cover_image VARCHAR(255),
    created_at DATETIME NOT NULL,
    updated_at DATETIME,
    status ENUM('not started', 'in progress', 'done') NOT NULL DEFAULT 'not started',
    created_by INT NOT NULL,
    CONSTRAINT fk_course_creator FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(500),
    created_at DATETIME NOT NULL,
    updated_at DATETIME,
    course_id INT NOT NULL,
    CONSTRAINT fk_topic_course FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(500),
    created_at DATETIME NOT NULL,
    updated_at DATETIME,
    status ENUM('not started', 'in progress', 'completed') NOT NULL DEFAULT 'not started',
    topic_id INT NOT NULL,
    CONSTRAINT fk_task_topic FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE
);

CREATE TABLE course_subscribers (
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    subscribed_at DATETIME NOT NULL,
    subscription_status ENUM('active', 'paused', 'completed', 'dropped') NOT NULL DEFAULT 'active',
    PRIMARY KEY (user_id, course_id),
    CONSTRAINT fk_sub_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_sub_course FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);