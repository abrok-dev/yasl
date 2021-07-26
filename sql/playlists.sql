use yasl;
create table playlists(
id int unsigned not null auto_increment primary key,
user_id int unsigned not null,
list_id int unsigned not null,
name_of_list varchar(100) not null);
