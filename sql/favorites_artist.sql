use yasl;
create table favorites_artist(
id int unsigned not null auto_increment primary key,
user_id int unsigned not null,
artist_id int unsigned not null);
