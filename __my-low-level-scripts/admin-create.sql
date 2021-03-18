CREATE USER 'office_furniture_inventory_admin'@'localhost' IDENTIFIED BY 'office_furniture_inventory_admin_password';
GRANT ALL PRIVILEGES ON office_furniture_inventory.* TO 'office_furniture_inventory_admin'@'localhost';
FLUSH PRIVILEGES;
