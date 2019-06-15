CREATE USER user IDENTIFIED BY 'pass';
CREATE USER myuser IDENTIFIED BY 'myuser';
GRANT ALL ON *.* TO myuser@'%' IDENTIFIED BY 'myuser' WITH GRANT OPTION;
GRANT ALL ON *.* TO user@'%' IDENTIFIED BY 'pass';

create database booklist default charset utf8;
use bookdb;

create table tag(
    id int auto_increment primary key,
    name varchar(255) not null
);

create table book_tag(
    id int auto_increment primary key,
    book_id int not null,
    tag_id int not null
);

create table category(
    id int auto_increment  primary key,
    name varchar(255)
);

create table author(
    id int auto_increment primary key,
    name varchar(255)
);

create table book(
    id int auto_increment primary key,
    isbn int not null,
    title varchar(255) not null,
    price int(255) not null,
    category_id int not null,
    foreign key (category_id)
        references category(id),
    author_id int not null,
    foreign key (author_id)
        references author(id)
);

insert into category (name) values ("プログラミング"), ("デザイン");
insert into author (name) values ("コーリー・アルソフ"), ("Mana");
insert into tag (name) values ("面白い"), ("python"), ("独学シリーズ"), ("わかりやすい"), ("必須");
