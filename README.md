
## Como se abordo el problema

Analice la api que dieron de ejemplo para observar que hace en diferentes situaciones como no encontrar un rfc y ver el tiempo de respuesta en el primer llamado, investigue que tanto influye la velocidad de mi red y experimente usando datos de celular y diferentes redes locales y privadas.
Llegue a la conclusion de que aparte de tener una buena red tambien es necesario una buena logica para lograr reducir el teimpo de respuesta, revise el json de respuesta para entender las relaciones que exisen y las tablas de bd, entonces empece a maquetar la bd y agregar las relaciones.
una vez que arme las relaciones en la bd y subi la informacion me enfoque en el query, a medir el tiempo que tarda en la consulta y reducirlo mejorando el query, pase de 800ms a 20ms en promedio.