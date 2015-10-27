CREATE DATABASE IF NOT EXISTS apitest;

USE apitest;

CREATE TABLE IF NOT EXISTS users(

  user_id INT UNSIGNED AUTO_INCREMENT NOT NULL ,
  username VARCHAR (40) NOT NULL ,
  password VARCHAR (100) NOT NULL ,
  created_at DATETIME NOT NULL,
  modified_at DATETIME NOT NULL ,
  active_status BOOLEAN DEFAULT 1,
  PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS houses(

  house_id INT UNSIGNED AUTO_INCREMENT NOT NULL ,
  user_id INT UNSIGNED NOT NULL ,
  house_name VARCHAR (40) NOT NULL ,
  house_location VARCHAR (40) NOT NULL ,
  house_color VARCHAR (40) NOT NULL ,
  created_at DATETIME NOT NULL,
  modified_at DATETIME NOT NULL ,
  active_status BOOLEAN DEFAULT 1,
  PRIMARY KEY (house_id),
  CONSTRAINT fk_houses_user_id FOREIGN KEY (user_id) REFERENCES users (user_id)
);