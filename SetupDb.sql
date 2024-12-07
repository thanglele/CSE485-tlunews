create database tintuc;
use tintuc;
create table users (
	id int primary key auto_increment,
    username varchar(255),
    password varchar(255),
    role int
);

create table categories (
	id int primary key auto_increment,
    name varchar(255)
);

create table news(
	id int primary key auto_increment,
    title varchar(255),
    content TEXT,
    image varchar(255),
    created_at datetime,
    category_id int,
    foreign key (category_id) references categories(id)
);

