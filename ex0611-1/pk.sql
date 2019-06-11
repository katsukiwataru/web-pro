// primary key をサロゲートキー(代替キー)で
// 作る例
create table students
    (id int auto_increment not null primary key,
        code char(8) not null,
        name varchar(255) not null,
        grade int not null);

insert into students (code, name, grade)
    values ('A18DC001', 'Syougo Hamada', 3);

select * from students;
