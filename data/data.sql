# Dont panic, this is just a dummy data. Copy it and paste it in your phpmyadmin.
# Note: you have to create a database name apitest before it can work.

USE apitest;

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`, `modified_at`, `active_status`) VALUES
  (1, '3', '2', '2015-10-27 01:44:06', '2015-10-27 01:44:06', 1),
  (2, 'mesh', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 01:45:47', '2015-10-27 01:45:47', 1),
  (3, 'meshboy', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 01:49:14', '2015-10-27 01:49:14', 1),
  (4, 'meshboy', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 01:49:47', '2015-10-27 01:49:47', 1),
  (5, 'meshboy', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 08:51:27', '2015-10-27 08:51:27', 1),
  (6, 'meshboy', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 08:52:07', '2015-10-27 08:52:07', 1),
  (7, 'meshboy', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 08:52:27', '2015-10-27 08:52:27', 1),
  (8, 'meshboy', '52da7846e396ff38cd6729bec21b6f9159f9bd1c', '2015-10-27 09:02:26', '2015-10-27 09:02:26', 1);


INSERT INTO houses (`user_id`, `house_name`, `house_location`, `house_color`, `created_at`,
                    `modified_at`) VALUES (1,  'house 1', 'location 1', 'color 1', NOW(), NOW()),
                                          (1,  'house 2', 'location 2', 'color 2', NOW(), NOW()),
                                          (3,  'house 3', 'location 3', 'color 3', NOW(), NOW()),
                                          (3,  'house 4', 'location 4', 'color 4', NOW(), NOW()),
                                          (5,  'house 5', 'location 5', 'color 5', NOW(), NOW()),
                                          (5,  'house 6', 'location 6', 'color 6', NOW(), NOW()),
                                          (7,  'house 7', 'location 7', 'color 7', NOW(), NOW())
