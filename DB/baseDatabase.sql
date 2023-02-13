CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `dept` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `hall_bookings` (
  `id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_booking_date` date NOT NULL,
  `hall_booking_time` varchar(255) NOT NULL,
  `hall_booking_purpose` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
);

ALTER TABLE `hall_bookings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `hall_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement_message` varchar(255) NOT NULL,
  `announcement_time` time NOT NULL,
  `user_id` varchar(255) NOT NULL
);

ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;