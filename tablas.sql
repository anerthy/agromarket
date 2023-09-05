--=========================================================
-- PRODUCTORES
--=========================================================
SELECT  COD_PRODUCTOR,      -- ID
        CED_PRODUCTOR,      -- CEDULA DEL PRODUCTOR
        NOM_PRODUCTOR,      -- NOMBRE DEL PRODUCTOR
        PRI_APELLIDO,       -- PRIMER APELLIDO
        SEG_APELLIDO,       -- SEGUNDO APELLIDO
        DIR_PRODUCTOR,      -- DIRECCION EXACTA DEL PRODUCTOR
        TEL_PRODUCTOR,      -- NUMERO DE TELEFONO
        UBI_PRODUCTOR,      -- UBICACION DEL PRODUCTOR (Nicoya, Santa Cruz...)
        IMG_PRODUCTOR,      -- NOMBRE DE LA IMAGEN DEL PRODUCTOR
        COD_USUARIO,        -- USUARIO DUEÑO DEL PERFIL DE PRODUCTOR 
        IND_ESTADO,         -- ESTADO DEL REGISTRO: (ACTIVO INACTIVO ELIMINADO...)
        FEC_CREACION,       -- FECHA EN LA QUE SE CREA EL REGISTRO
        FEC_MODIFICACION    -- ULTIMA VEZ QUE SE MODIFICÓ EL REGISTRO
FROM PRODUCTORES;
--=========================================================
-- PRODUCTOS
--=========================================================
SELECT  COD_PRODUCTO,
        NOM_PRODUCTO,
        DES_PRODUCTO,
        PRO_CATEGORIA, -- / TIP_PRODUCTO (VERDURITA O FRUTITA)
        PRO_PRECIO,
        COD_PRODUCTOR,
        IMG_PRODUCTO,
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM PRODUCTOS;
--=========================================================
-- ACTIVIDADES
--=========================================================
SELECT  COD_ACTIVIDAD,
        NOM_ACTIVIDAD,
        DES_ACTIVIDAD,
        FEC_ACTIVIDAD, -- (DD/MM/YYYY HH:MM:SS)
        ACT_LUGAR,
        ACT_CATEGORIA,
        IMG_ACTIVIDAD,
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM ACTIVIDADES;
--=========================================================
-- USUARIOS
--=========================================================
SELECT  COD_USUARIO,
        USR_EMAIL,
        NOM_USUARIO,
        USR_CONTRASENA, -- CONTRASEÑA ENCRIPTADA
        USR_TOKEN,      -- TOKEN PARA REESTABLECER LA CONTRASEÑA 
        COD_ROL,
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM USUARIOS;
--=========================================================
-- ROLES
--=========================================================
SELECT  COD_ROL,
        NOM_ROL,
        DES_ROL,
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM ROLES;
--=========================================================
-- PERMISOS : que puede hacer un rol dentro de cada pagina 
--=========================================================
SELECT  COD_PERMISO,    -- ID
        COD_ROL,        -- ID del rol
        COD_PAGINA,     -- ID de la pagina de Productos
        PER_VER,        -- S-i / N-o
        PER_AGREGAR,    -- S-i / N-o
        PER_ACTUALIZAR, -- S-i / N-o
        PER_ELIMINAR    -- S-i / N-o
FROM PERMISOS;
--=========================================================
-- PÁGINAS (modulo en paraiso_azul)
--=========================================================
SELECT  COD_PAGINA,
        NOM_PAGINA,
        DES_PAGINA, -- Pagina de los productos agricolas que ofrecen los productores...
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM PAGINAS;
--=========================================================
-- MÉTODOS_PAGO : metodos de pago que maneja la plataforma
--=========================================================
SELECT  COD_METODO, -- SINPE / CUENTA / TARJETA / PAYPAL...
        NOM_METODO, -- SINPE MOVIL
FROM METODOS_PAGO;
--=========================================================
-- MÉTODOS_PAGO_PRODUCTORES : Que metodos de pago acepta el productor
--=========================================================
SELECT  COD_PRODUCTOR,
        COD_METODO,
        DES_METODO, -- SINPE MOVIL : Andrés Mejías
        INF_METODO  -- 8729-3508
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM METODOS_PAGO_PRODUCTORES;
--=========================================================
-- DONACIONES : para mostrar la info en la parte informativa
--=========================================================
SELECT  COD_DONACION,
        DES_DONACION,
        MED_DONACION, -- SINPE / CUENTA BANCARIA
        INF_DONACION, -- ####-#### / CRC##########...
        IND_ESTADO
FROM DONACIONES;
--=========================================================
-- AFILIADOS : productores que pagan la membresia
--=========================================================
SELECT  COD_PRODUCTOR,
        COD_USUARIO,
        IND_ESTADO,
        FEC_AFILIACION,
        FEC_VENCIMIENTO, -- POSIBLEMENTE SEA OTRA TABLA PARA VER SI YA PAGO EL MES...
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM AFILIADOS;
--=========================================================
-- PUBLICIDAD / ANUNCIOS
--=========================================================
SELECT  COD_ANUNCIO,
        DES_ANUNCIO,
        IMG_ANUNCIO,
        IND_ESTADO,
        FEC_VENCIMIENTO, -- Hasta que fecha se muestra el anuncio¿
        FEC_CREACION,
        FEC_MODIFICACION
FROM ANUNCIOS;