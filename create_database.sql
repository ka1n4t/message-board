create database db_guestbook;

use db_guestbook;

create table tb_user(
	id int(4) not null primary key auto_increment,
	usernc varchar(50) not null,
	userpwd varchar(50) not null,
	truename varchar(50) not null,
	email varchar(50) not null,
	qq varchar(20) not null,
	tel varchar(20) not null,
	ip varchar(2) not null,
	address varchar(250) not null,
	face varchar(50) not null,
	regtime datetime,
	sex varchar(2) not null,
	usertype int(2) not null
);

create table tb_leaveword(
	id int(8) not null primary key auto_increment,
	userid int(8) not null,
	createtime datetime not null,
	title varchar(250) not null,
	content text not null
);

create table tb_replyword(
	id int(4) not null primary key auto_increment,
	userid int(4) not null,
	createtime datetime not null,
	title varchar(250) not null,
	content text not null,
	leave_id int(4) not null
);

create table tb_admin(
	id int(5) not null primary key auto_increment,
	userword varchar(20) not null,
	password varchar(20) not null,
	email varchar(30) not null,
	ip varchar(10) not null
);

grant select,delete,insert,update
on db_guestbook.*
to guestbook@localhost identified by 'password';