-- Users Table Seeder
INSERT INTO `users` (`username`, `email`, `password`, `dept`, `role`) VALUES('admin', 'admin@sfc.ac.in', '$2y$10$y6JTd9cve1T1f0MyLPQ9k.cxIhNRaJpK4MQpi0ipL8RBkMhOYH8BC', 'default', 'admin');
INSERT INTO `users` (`username`, `email`, `password`, `dept`, `role`) VALUES('moderator', 'moderator@sfc.ac.in', '$2y$10$Jy9vxki61nIrBVJRIsSI.eSY5GwUXWG17eBYtfhwlvXVZH1ZyxfT2', 'default', 'moderator');

-- Hall Bookings Seeder
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `user_id`) VALUES('auditorium', '2023/02/25', '8:00-8:50', 'Seminar', 1);
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `user_id`) VALUES('auditorium', '2023/02/25', '11:20-12:10', 'Seminar', 5);
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `user_id`) VALUES('capitanio', '2023/02/25', '11:20-12:10', 'Dance Practice', 10);

-- Announcements Seeder
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `user_id`) VALUES('Announcement Title', 'This is a sample message', '2023/02/25', '10:30', 1);
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `user_id`) VALUES('Announcement Title', 'This is a sample message2', '2023/02/25', '14:19', 3);
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `user_id`) VALUES('Announcement Title', 'This is a sample message3', '2023/02/15', '05:10', 1);

-- Chatbot Seeder
INSERT INTO `chatbot` (`queries`, `replies`) VALUES ('How to apply for St. Francis College?', 'https://www.sfc.ac.in/admissions.php\r\nclick on the link to view the admission form. The application fee is Rs.500/- for the candidates who are applying.'), 
('How can I get admitted into St. Francis College?', 'For UG Program all the students must appear for the entrance exam which is conducted every year.For PG program all students must attend an interview which is conducted every year.'),
('What is the dress code at St. Francis?', 'The dress code at St. Francis is full length kurtis. However , sleeveless tops , shorttops are not encouraged.'),
('Is hostel facility available in campus?', 'No, Hostel facility is not available in campus.'),
('Is St. Francis Autonomous?', 'The college remains affiliated to Osmania University ,it is autonomous at the UG and PG level.'),
('What are the placement opportunities at St. Francis?', 'The placement cell in the college ensures that most of the students get placed. About 90% of the students get placed every year. Many internship opportunities were provided in various sectors.'),
('What is the fee structure of St. Francis?', 'St.Francis is a multi-disciplinary institution, and as several programs with distinct fee structures. you can check out the fee structure for your desired program by visiting our fee structure page. Or contact us at +914023403200/23400470'),
('What is the eligibilty criteria for admissions?', 'https://www.sfc.ac.in/admissions.php Click on the link to view the eligibility criteria for various courses'),
('Is parking facility available in the campus?', 'Students are allowed to park only two wheeler inside the campus, while staff can park two and four wheeler inside campus'),
('What extracurricular opportunities are available?', 'The college provides various extracurricular oppurtunities such as NCC, NSS, sports from which it is mandatory for first year UG students to opt one of these. St.Francis also provides a broad assortment of other activities- artistic, musical,political and social.');
