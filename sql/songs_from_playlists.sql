use yasl;
create table songs_from_playlists(
id int unsigned not null auto_increment primary key,
list_id int unsigned not null,
artist_id int unsigned not null,
album_id int unsigned not null,
track_id int unsigned not null);
