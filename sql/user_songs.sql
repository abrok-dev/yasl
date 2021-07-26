use yasl
create table users_songs(
id  int unsigned not null primary key auto_increment ,
user_id  int unsigned not null,
artist_id  int unsigned not null,
album_id  int unsigned not null,
song_id  int unsigned not null,
var1 text,
var2 text);

