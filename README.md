INTEGRANTES:
• Suárez Georgina Naira — suarezgeoor@gmail.com

• Ferreyra Zaira Melina — zairamferreyra@gmail.com

Descripción del Proyecto

Nuestro sitio web está diseñado para:
📅 Gestionar reservas de viajes Uber en una interfaz amigable y dinámica.
📋 Consultar información detallada de cada viaje.

Base de Datos

Viaje:
Información detallada del viaje
(ID_viaje, origen, destino, fecha, ID_conductor, ID_usuario)

Usuario:
Información del usuario que realiza el viaje de Uber
(ID_usuario, nombre, correo electrónico, contraseña)

Credenciales de Usuario

Usuario: MelGeor
Contraseña: geomeltpe

Endpoints

GET /api/viajes — Listar viajes
GET /api/viajes/:id — Ver un viaje
GET /api/viajes?campo=&valor= — Listar viajes filtrados por cualquier campo
GET /api/viajes?campo=&orden= — Listar viajes ordenados ASC o DESC
GET /api/auth/login — Autorización

POST /api/viajes — Insertar un viaje
PUT /api/viajes/:id — Actualizar/editar un viaje
DELETE /api/viajes/:id — Eliminar un viaje

Ejemplos

• Listar viajes ordenados por cualquier campo:
http://localhost/WEB2-TPE3REST/api/viajes?campo=origen&valor=Ameghino%20900

(Para separar espacios se usa %20)

• Listar viajes por orden ASC o DESC:
http://localhost/WEB2-TPE3REST/api/viajes?campo=destino&orden=DESC

• Insertar / Editar un viaje:
Enviar por body este JSON:
{
  "origen": "Ameghino 00",
  "destino": "Lisandro de la torre 4045",
  "fecha": "2025-09-10",
  "ID_usuario": 1,
  "ID_conductor": 4
}
