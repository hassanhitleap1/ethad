
ALTER TABLE `user` ADD `by_user` INT NOT NULL DEFAULT '1' AFTER `note`;
ALTER TABLE `user` ADD `type` SMALLINT NOT NULL DEFAULT '2' AFTER `by_user`;
ALTER TABLE `user` DROP INDEX `fk-area-area_id`;
ALTER TABLE `user` DROP INDEX `fk-sender-sender_id`;
ALTER TABLE `user` DROP INDEX `fk-sender-subscrip_id`;
INSERT INTO `user` (`id`, `username`, `name_en`, `name_ar`, `date_of_birth`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `agree`, `phone`, `other_phone`, `area_id`, `address`, `street`, `subscrip_id`, `price_subscrip`, `sender_id`, `status_id`, `start_date`, `note`, `created_at`, `updated_at`, `by_user`, `type`) VALUES (NULL, 'admin', 'admin', 'admin', '2021-06-14 17:00:49.000000', NULL, '$2y$10$fTFZL3QpiUMbn3ZswEKJlOqxmnYrljUarwRi6VffFR3d2xum.r3Za', NULL, 'admin@admin.com', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2021-06-14 17:00:49.000000', NULL, '2021-06-14 17:00:49.000000', '2021-06-14 17:00:49.000000', '1', '1');