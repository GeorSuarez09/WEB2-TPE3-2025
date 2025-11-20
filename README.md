INTEGRANTES: *Suárez Georgina Naira / suarezgeoor@gmail.com *Ferreyra Zaira Melina / zairamferreyra@gmail.com

Descripcion del Proyecto Nuestro sitio Web esta diseñado para: 
📅 Gestionar reservas de viajes Uber en una interfaz amigable y dinámica.
📋Consultar información detallada de cada viaje 

La base de datos esta compuesta por: 
Viaje: Información detallada del viaje(ID_viaje, origen, destino, fecha, ID_conductor, ID_usuario)  
Usuario: Información para identificar el usuario a realizar el viaje de uber (ID_usuario, nombre, correo electrónico, contraseña)

Usuario: MelGeor  Contraseña: geomeltpe

ENDPOINS
GET /api/viajes — Listar Viajes
GET /api/viajes/:id — Ver un viaje
GET /api/viajes?campo=&valor= — Listar viajes ordenados por cualquier campo
GET /api/viajes?campo=&orden= — Listar viajes por cualquier campo por orden ascendente o descendente
GET /api/auth/login — Autorizacion 
POST /api/viajes — Insertar un viaje
PUT /api/viajes/:id — Actualizar/editar un viaje
DELETE /api/viajes/:id — Eliminar un viaje

EJEMPLOS:
*Listar viajes ordenados por cualquier campo:
    http://localhost/WEB2-TPE3REST/api/viajes?campo=origen&valor=Ameghino%20900  (para separar el valor uso %20)
*Listar viajes por cualquier campo por orden ASCENDENTE o DESCENDENTE:
    http://localhost/WEB2-TPE3REST/api/viajes?campo=destino&orden=DESC
*Insertar/Editar un viaje:
    Ponemos la url y enviamos por body este JSON:
     {
      
        "origen": "Ameghino 00",
        "destino": "Lisandro de la torre 4045",
        "fecha": "2025-09-10",
        "ID_usuario": 1,
        "ID_conductor": 4
      }

