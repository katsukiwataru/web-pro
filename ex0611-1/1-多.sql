// 1対多
// 親子関係

create table メーカー(
    id int primary  key,
    name varchar(255)
)

create table 商品(
    id int primary key,
    name varchar(255),
    メーカー_id int not null,
    foreign key (メーカー_id)
        references メーカー(id)
)

