drop table Channels;

create table Channels (
                          guid char(36) primary key,
                          name varchar(255) not null unique
);

INSERT INTO Channels (guid, name) VALUES ('b59ce9ea-5e5d-4b2b-9a6b-aae3c111e7bc', 'Channel 1');
INSERT INTO Channels (guid, name) VALUES ('7983e2af-8b9d-4c8a-af48-d8d38f0ab123', 'Channel 2');
