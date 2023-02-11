-- Users Table Seeder
INSERT INTO `users` (`username`, `email`, `password`, `dept`, `role`) VALUES('admin', 'admin@sfc.ac.in', '$2y$10$y6JTd9cve1T1f0MyLPQ9k.cxIhNRaJpK4MQpi0ipL8RBkMhOYH8BC', 'default', 'admin');
INSERT INTO `users` (`username`, `email`, `password`, `dept`, `role`) VALUES('moderator', 'moderator@sfc.ac.in', '$2y$10$Jy9vxki61nIrBVJRIsSI.eSY5GwUXWG17eBYtfhwlvXVZH1ZyxfT2', 'default', 'moderator');

-- Hall Bookings Seeder
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `booking_user_id`) VALUES('auditorium', '2023/02/20', '8:00-8:50', 'Seminar', 1);
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `booking_user_id`) VALUES('auditorium', '2023/02/25', '11:20-12:10', 'Seminar', 5);
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `booking_user_id`) VALUES('capitanio', '2023/02/25', '11:20-12:10', 'Dance Practice', 10);