drop if exists schema crud_db;
create schema crud_db;
use crud_db;
SET time_zone = "+01:00";

create table reservation (
    id serial primary key autoincrement,
    name varchar(255) not null,
    phone varchar(255) not null,
    date date not null,
    time time not null,
    people int not null
    table_id int not null
);