// 多対多
create table 社員(
    id int primary key,
    word varchar(255)
);

create table サークル(
    id int primary key,
    word varchar(255)
)

create table 社員_サークル(
    id int primary key,
    社員_id int not null,
    サークル_id int not null
)