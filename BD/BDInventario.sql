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
  `loteInventario` INT NOT NULL,
  `fechaVencimientoInventario` DATE NOT NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`idInventario`),
    FOREIGN KEY (`idProductoInventarioFK`)
    REFERENCES `tb_Productos` (`idProductoPK`));


-- -----------------------------------------------------
-- Table `tb_Venta`
-- -----------------------------------------------------
CREATE TABLE `tb_Ventas` (
  `idVentaPK` INT NOT NULL AUTO_INCREMENT,
  `idProductoVentaFK` INT NOT NULL,
  `cantidadVenta` INT NOT NULL,
  `precioTotalVenta` INT NOT NULL,
  PRIMARY KEY (`idVentaPK`),
    FOREIGN KEY (`idProductoVentaFK`)
    REFERENCES `tb_Productos` (`idProductoPK`));
