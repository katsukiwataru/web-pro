create table book(
    id int primary key,
    isbn int not null,
    title varchar(255) not null,
    price int(255) not null
);

create table tag(
    id int primary key,
    name varchar(255) not null
);

create table book_tag(
    id int primary key,
    book_id int not null,
    tag_id int not null
);

// 1対1

create table 日本語(
    id int primary key,
    word varchar(255)
);

create table 中国語(
    id int primary key,
    日本語_id int not null unique,
    word varchar(255),
    foreign key (日本語_id)
        references 日本語(id)
);

create table 日本語(
    id int primary key,
    word varchar(255)
);

create table 中国語(
    id int primary key,
    word varchar(255)
);

create table 日本語_中国語(
    id int primary key,
    日本語_id int not null unique,
    中国語_id int not null unique
);

// 外部キーを使う例

// 学部
create table faculty(
    id int auto_increment not null primary key,
    name varchar(255) not null);

// 学生
create table students
    (id int auto_increment not null primary key,
        faculty_id int not null,
        code char(8) not null,
        name varchar(255) not null,
        grade int not null,
        foreign key (faculty_id)
        references faculty(id)
    );


insert into faculty(name) values('経済学部');
insert into faculty(name) values('理工学部');

// 1対多
// 親子関係

create table メーカー(
    id int primary  key,
    name varchar(255)
);

create table 商品(
    id int primary key,
    name varchar(255),
    メーカー_id int not null,
    foreign key (メーカー_id)
        references メーカー(id)
);
