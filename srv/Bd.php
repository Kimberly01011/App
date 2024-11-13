<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS JOYA (
    JOYA_ID INTEGER,
    JOYA_NOMBRE TEXT NOT NULL,
    JOYA_COLOR TEXT NOT NULL,
    JOYA_MATERIAL TEXT NOT NULL,
    CONSTRAINT JOYA_PK PRIMARY KEY(JOYA_ID),
    CONSTRAINT JOYA_NOMBRE_UNQ UNIQUE(JOYA_NOMBRE, JOYA_COLOR),
    CONSTRAINT JOYA_MATERIAL_NV CHECK(LENGTH(JOYA_MATERIAL) > 0)

     )"
   );
  }

  return self::$pdo;
 }
}
