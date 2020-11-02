create table students
(
    id    int auto_increment
        primary key,
    name  varchar(255) not null,
    email varchar(255) not null,
    constraint students_id_fk
        foreign key (id) references classes (id)
);

