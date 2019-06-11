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
