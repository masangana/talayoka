CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) UNIQUE NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

CREATE TABLE `user_profiles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `username` varchar(255) UNIQUE NOT NULL,
  `profile_image_url` text
);

CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` text
);

CREATE TABLE `series` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` text,
  `category_id` int
);

CREATE TABLE `episodes_series` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `serie_id` int,
  `video_link` text NOT NULL,
  `description` text
);

CREATE TABLE `video_infos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `trailer_link` text,
  `prod_date` date,
  `director` varchar(255),
  `artwork_id` int
);

CREATE TABLE `movies` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` text,
  `category_id` int
);

CREATE TABLE `movie_videos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `movie_id` int,
  `video_link` text NOT NULL,
  `description` text
);

CREATE TABLE `musics` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `video_link` text,
  `audio_link` text,
  `album_id` int
);

CREATE TABLE `albums` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` text,
  `category_id` int
);

CREATE TABLE `artists` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `picture` text,
  `birthday` date
);

CREATE TABLE `artist_artwok` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `artist_id` int,
  `artwok_id` int
);

CREATE TABLE `likes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `artwok_id` int
);

CREATE TABLE `abonnements` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `subscription_id` int
);

CREATE TABLE `subscriptions` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `price` int,
  `description` text
);

ALTER TABLE `user_profiles` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `series` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `movies` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `movie_videos` ADD FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

ALTER TABLE `musics` ADD FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`);

ALTER TABLE `albums` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `artist_artwok` ADD FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `abonnements` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `abonnements` ADD FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`);

ALTER TABLE `episodes_series` ADD FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);

ALTER TABLE `video_infos` ADD FOREIGN KEY (`artwork_id`) REFERENCES `series` (`id`);

ALTER TABLE `video_infos` ADD FOREIGN KEY (`artwork_id`) REFERENCES `movies` (`id`);

ALTER TABLE `video_infos` ADD FOREIGN KEY (`artwork_id`) REFERENCES `albums` (`id`);

ALTER TABLE `artist_artwok` ADD FOREIGN KEY (`artwok_id`) REFERENCES `albums` (`id`);

ALTER TABLE `artist_artwok` ADD FOREIGN KEY (`artwok_id`) REFERENCES `movies` (`id`);

ALTER TABLE `artist_artwok` ADD FOREIGN KEY (`artwok_id`) REFERENCES `series` (`id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`artwok_id`) REFERENCES `series` (`id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`artwok_id`) REFERENCES `movies` (`id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`artwok_id`) REFERENCES `albums` (`id`);
