ALTER TABLE `user` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `cedulas` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `cedula_deceval` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `cupos_linea` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `gestores` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `inactivos` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `lineas_credito` ADD `empresa_id` VARCHAR(11) NULL;
ALTER TABLE `solicitudes` ADD `empresa_id` VARCHAR(11) NULL;
