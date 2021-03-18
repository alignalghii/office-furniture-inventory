SELECT '* User *' AS '********';
SELECT * FROM `iuser`;

SELECT '* Model *' AS '*********';;
SELECT * FROM `model`;

SELECT '* Furniture *' AS '*************';;
SELECT `f`.`id`, `m`.`mtype` AS `__model_dependence`, `f`.`inventory_number`, `f`.`price`, `f`.`quantity`
FROM `furniture` AS `f`
    JOIN `model` AS `m` ON `m`.`id` = `f`.`model_id`;
