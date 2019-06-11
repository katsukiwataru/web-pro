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
)

