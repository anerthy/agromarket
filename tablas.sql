--=========================================================
-- PRODUCTORES
--=========================================================
SELECT  COD_PRODUCTOR,
        CED_PRODUCTOR,
        NOM_PRODUCTOR,
        PRI_APELLIDO,
        SEG_APELLIDO,
        DIR_PRODUCTOR,
        TEL_PRODUCTOR,
        UBI_PRODUCTOR,
        IMG_PRODUCTOR,
        IND_ESTADO,
        COD_USUARIO,
        FEC_CREACION,
        FEC_MODIFICACION
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
        USR_CONTRASEÑA,
        USR_TOKEN,
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
-- MÉTODOS_PAGO
--=========================================================
SELECT  COD_METODO,
        NOM_METODO,
        DES_METODO,
        INF_METODO
FROM METODOS_PAGO;
--=========================================================
-- MÉTODOS_PAGO_PRODUCTORES
--=========================================================
SELECT  COD_PRODUCTOR,
        COD_METODO,
        IND_ESTADO,
        FEC_CREACION,
        FEC_MODIFICACION
FROM METODOS_PAGO_PRODUCTORES;
--=========================================================
-- DONACIONES
--=========================================================
SELECT  COD_DONACION,
        DES_DONACION,
        MED_DONACION, -- SINPE / CUENTA BANCARIA
        INF_DONACION
FROM DONACIONES;
--=========================================================
-- AFILIADOS : productores que pagan la membresia
--=========================================================
SELECT  COD_PRODUCTOR,
        COD_USUARIO,
        IND_ESTADO,
        FEC_AFILIACION,
        FEC_VENCIMIENTO, -- POSIBLEMENTE SEA OTRA TABLA PARA VER SI YA PAGO EL MES...
        FEC_CREACION,
        FEC_MODIFICACION
FROM AFILIADOS;