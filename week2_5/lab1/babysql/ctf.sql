CREATE DATABASE IF NOT EXISTS news;
USE news;
create table if not exists admin
(
	id int auto_increment
		primary key,
	username varchar(128) not null,
	password varchar(128) not null
)
;

create table if not exists contents
(
	id int auto_increment
		primary key,
	title varchar(1000) not null,
	content varchar(10000) not null
)
;

INSERT INTO admin(username, password) VALUES('admin', MD5(RAND()));

INSERT INTO contents(title, content) values
('你在想什么呢', '别乱动！！'),
('这里没有flag', '别看了！！！'),
('你要flag那就给你', 'flag'),
('hint', 'login to get flag');