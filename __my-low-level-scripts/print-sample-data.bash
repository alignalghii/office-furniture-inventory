#!/bin/bash

mysql -t -u office_furniture_inventory_admin -poffice_furniture_inventory_admin_password office_furniture_inventory < print-sample-data.sql;
