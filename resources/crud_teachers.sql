create table teachers
(
    id    int auto_increment
        primary key,
    name  varchar(255) not null,
    email varchar(255) not null,
    constraint techers_id_fk
        foreign key (id) references classes (id)
);

