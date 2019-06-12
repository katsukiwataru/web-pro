create table tag(
    id int primary key,
    name varchar(255) not null
);

create table book_tag(
    id int primary key,
    book_id int not null,
    tag_id int not null
);

create table category(
    id int primary  key,
    name varchar(255)
);

create table author(
    id int primary  key,
    name varchar(255)
);

create table book(
    id int primary key,
    isbn int not null,
    title varchar(255) not null,
    price int(255) not null,
    category_id int not null,
    foreign key (category_id)
        references category(id)
    author_id int not null
    foreign key (author_id)
        references author(id)
);
