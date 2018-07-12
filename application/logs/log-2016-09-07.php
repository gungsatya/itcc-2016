<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-09-07 13:37:53 --> Query error: Disk full (/tmp/#sql_9d6_3.MAI); waiting for someone to free some space... (errno: 28 "No space left on device") - Invalid query: SELECT `group_id`, `groupname`, `institution`, max(request_at) as `request_at`, `note`, `filename`
FROM `verified_req`
LEFT JOIN `group` ON `group`.`id` = `verified_req`.`group_id`
WHERE `category` = 'IDEA'
AND `verified_status` = 'N'
GROUP BY `group`.`id`
ORDER BY `request_at` DESC
ERROR - 2016-09-07 13:38:04 --> Query error: Disk full (/tmp/#sql_9d6_3.MAI); waiting for someone to free some space... (errno: 28 "No space left on device") - Invalid query: SELECT `group_id`, `groupname`, `institution`, max(request_at) as `request_at`, `note`, `filename`
FROM `verified_req`
LEFT JOIN `group` ON `group`.`id` = `verified_req`.`group_id`
WHERE `category` = 'IDEA'
AND `verified_status` = 'N'
GROUP BY `group`.`id`
ORDER BY `request_at` DESC
ERROR - 2016-09-07 05:39:49 --> Unable to connect to the database
ERROR - 2016-09-07 13:39:49 --> Unable to connect to the database
ERROR - 2016-09-07 05:39:52 --> Unable to connect to the database
ERROR - 2016-09-07 13:39:52 --> Unable to connect to the database
