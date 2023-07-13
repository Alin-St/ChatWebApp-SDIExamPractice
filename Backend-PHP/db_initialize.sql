drop table Channels;
drop table Users;

create table Channels (
    guid char(36) primary key check (guid regexp '^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$'),
    name varchar(255) not null unique check (name <> '')
);

create table Users (
    nickname varchar(255) primary key check (nickname <> ''),
    channelGuid char(36) references Channels(guid) on delete cascade
);

INSERT INTO Channels (guid, name) VALUES ('b59ce9ea-5e5d-4b2b-9a6b-aae3c111e7bc', 'Channel 1');
INSERT INTO Channels (guid, name) VALUES ('7983e2af-8b9d-4c8a-af48-d8d38f0ab123', 'Channel 2');

INSERT INTO Users (nickname, channelGuid) VALUES
    ('User 1', 'b59ce9ea-5e5d-4b2b-9a6b-aae3c111e7bc'),
    ('User 2', 'b59ce9ea-5e5d-4b2b-9a6b-aae3c111e7bc'),
    ('User 3', 'b59ce9ea-5e5d-4b2b-9a6b-aae3c111e7bc'),
    ('User 4', '7983e2af-8b9d-4c8a-af48-d8d38f0ab123'),
    ('User 5', '7983e2af-8b9d-4c8a-af48-d8d38f0ab123');
