CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8 ;
USE `inventario` ;

-- -----------------------------------------------------
-- Table `tb_Producto`
-- -----------------------------------------------------
CREATE TABLE `tb_Productos` (
  `idProductoPK` INT NOT NULL AUTO_INCREMENT,
  `nombreProducto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProductoPK`));

INSERT INTO `tb_productos` (`idProductoPK`, `nombreProducto`) VALUES
(NULL, 'Mora'),
(NULL, 'Banano'),
(NULL, 'Escoba'),
(NULL, 'Limpiador de Piso');


-- -----------------------------------------------------
-- Table `tb_inventario`
-- -----------------------------------------------------
CREATE TABLE `tb_Inventario` (
  `idInventario` INT NOT NULL AUTO_INCREMENT,
  `idProductoInventarioFK` INT NOT NULL,
  `cantidadInventario` INT NOT NULL,
  `precioUnitarioInventario` INT NOT NULL,
  `loteInventario` INT NOT NULL,
  `fechaVencimientoInventario` DATE NOT NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`idInventario`),
    FOREIGN KEY (`idProductoInventarioFK`)
    REFERENCES `tb_Productos` (`idProductoPK`));

ALTER TABLE `tb_inventario` ADD UNIQUE( `idProductoInventarioFK`);

INSERT INTO `tb_inventario` (`idInventario`, `idProductoInventarioFK`, `cantidadInventario`, `precioUnitarioInventario`, `loteInventario`, `fechaVencimientoInventario`, `estado`) VALUES (NULL, '1', '2000', '550', '4020', '2019-07-31', '1')
(NULL, '2', '190', '520', '20', '2019-07-31', '1'),
(NULL, '3', '440', '70', '4080', '2019-07-31', '1'),
(NULL, '4', '202', '89', '4040', '2019-07-31', '1');

-- -----------------------------------------------------
-- Table `tb_Venta`
-- -----------------------------------------------------
CREATE TABLE `tb_Ventas` (
  `idVentaPK` INT NOT NULL AUTO_INCREMENT,
  `idProductoVentaFK` INT NOT NULL,
  `precioProductoVenta` INT NOT NULL,
  `cantidadVenta` INT NOT NULL,
  `precioTotalVenta` INT NOT NULL,
  PRIMARY KEY (`idVentaPK`),
    FOREIGN KEY (`idProductoVentaFK`)
    REFERENCES `tb_Productos` (`idProductoPK`));
