use yasl;
create table favorites_songs(
id int unsigned not null auto_increment primary key,
user_id int unsigned not null,
artist_id int unsigned not null,
album_id int unsigned not null,
song_id int unsigned not null);
