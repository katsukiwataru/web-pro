create database webpro_books default charset utf8;

// ユーザがまだ作られていない場合は grant 文を実行する
grant all privileges on *.* to myuser@'%' identified by 'password' with grant option;

create table category(
  id int not null auto_increment primary key,
  name varchar(255) not null
);

create table author(
  id int not null auto_increment primary key,
  name varchar(255) not null
);

create table book(
  id int not null auto_increment primary key,
  category_id int not null,
  author_id int not null,
  isbn varchar(255) not null,
  title varchar(255) not null,
  price int not null,
  foreign key(category_id) references category(id),
  foreign key(author_id) references author(id)
);

create table tag(
  id int not null auto_increment primary key,
  name varchar(255) not null
);

create table book_tag(
  id int not null auto_increment primary key,
  book_id int not null,
  tag_id int not null,
  foreign key(book_id) references book(id),
  foreign key(tag_id) references tag(id)
);
