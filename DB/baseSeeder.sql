-- Users Table Seeder
-- Admin Password: admin@sfc
-- Dummy User Password: dummyuser@sfc
INSERT INTO `users` (`username`, `email`, `password`, `dept`, `role`) VALUES('admin', 'admin@sfc.ac.in', '$2y$10$y6JTd9cve1T1f0MyLPQ9k.cxIhNRaJpK4MQpi0ipL8RBkMhOYH8BC', 'default', 'admin');
INSERT INTO `users` (`username`, `email`, `password`, `dept`, `role`) VALUES('dummyuser', 'dummyuser@sfc.ac.in', '$2y$10$tmVdfRuDnb3B5G4V/NmLzOaS7uCXdcfp6OlmStQjGGP.jrXrXzuvS', 'default', 'user');

-- Hall Bookings Seeder
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `booking_id`,`user_id`) VALUES('auditorium', '2023/03/25', '8:00-8:50', 'Seminar', '5ab2bd9a-805c-4dba-b083-8f71e0eb70a9', 1);
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `booking_id`, `user_id`) VALUES('auditorium', '2023/01/25', '11:20-12:10', 'Seminar', '8591d62b-4bdf-46ca-ac3e-dff89b6433d3', 2);
INSERT INTO `hall_bookings` (`hall_name`, `hall_booking_date`, `hall_booking_time`, `hall_booking_purpose`, `booking_id`, `user_id`) VALUES('capitanio', '2023/04/25', '11:20-12:10', 'Dance Practice', 'c9501617-e25b-4109-8b6a-6efb4bcdb203', 2);

-- Announcements Seeder
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `announcement_id`, `user_id`) VALUES('Announcement Title', 'This is a sample message', '2023/03/25', '10:30', 'ebeef8bc-ba89-49ac-8cf2-6e5ba204e682', 1);
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `announcement_id`, `user_id`) VALUES('Announcement Title', 'This is a sample message2', '2023/04/25', '14:19', '880862b0-390f-4712-b8d0-aa9ebc3b13da', 2);
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `announcement_id`, `user_id`) VALUES('Announcement Title', 'This is a sample message3', '2023/01/15', '05:10', 'dd5c411d-ec69-488b-b213-f8e949a87a62', 1);
INSERT INTO `announcements` (`announcement_title`, `announcement_message`, `announcement_date`, `announcement_time`, `announcement_id`, `user_id`) VALUES('Announcement Title Three', 'This is a sample message3', '2023/02/10', '14:19', '880862b0-390f-4712-b8d0-aa9ebc3b13da', 2);

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
('What extracurricular opportunities are available?', 'The college provides various extracurricular oppurtunities such as NCC, NSS, sports from which it is mandatory for first year UG students to opt one of these. St.Francis also provides a broad assortment of other activities- artistic, musical,political and social.'),
('What is the ranking of St. Francis in Hyderabad?', 'In 2019, the college was ranked one among top 100 colleges in India by NIRF, MHRD Government of India.'),
('Is it possible to join St.Francis mid-way through a course?', 'The job-oriented curriculum does not provide the flexibility to accomodate students mid-way through a course. Please contact our admission branch for further details.'),
('Can students from different states apply?', 'St. Francis welcomes students from all states. We are a much sought-after destination for students outside India.'),
('When does the admission process begin in St. Francis?', 'Admission Notifications are generally posted during the month of May every year for both UG and PG.');