<?php

return [
    'table_name' => 'educations',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `educations`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `educations` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `start_year` year NOT NULL,
        `end_year` year DEFAULT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `info` TEXT,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;",

    'relations' => [
        'ALTER TABLE `educations` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `educations` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `educations` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `educations` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => array([
            'name'          => 'HAVO',
            'start_year'    => '1990',
            'end_year'      => '1995',
            'info'          => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, ea qui sit hic doloribus magnam velit nostrum repellat blanditiis aliquam quas sed enim nam ad maxime, temporibus doloremque architecto. Magni.",
            'user_id'       => 2,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 2,
        ],
            
        [
            'name'          => 'CodeGorilla Bootcamp',
            'start_year'    => '2020',
            'end_year'      => '2021',
            'info'          => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, ea qui sit hic doloribus magnam velit nostrum repellat blanditiis aliquam quas sed enim nam ad maxime, temporibus doloremque architecto. Magni.",
            'user_id'       => 2,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 2,
        ]),
    ],
];