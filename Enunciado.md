# EXAMEN DE RECUPERACIÓN – PHP BÁSICO / PHP EMBEBIDO
**Módulos:** Desarrollo de Aplicaciones Web en Entorno Servidor  
**Tema:** Sesiones, formularios, BBDD y seguridad básica

## Enunciado
Desarrolla una aplicación web sobre una **librería online** cuyos datos iniciales se cargarán desde un fichero SQL o TXT proporcionado por el profesor.

La aplicación debe permitir:

1.  **Autenticación previa obligatoria.**
    * Antes de poder usar cualquier funcionalidad, el usuario deberá iniciar sesión.
    * Si entra en `index.php` sin haber iniciado sesión, será redirigido automáticamente a `login.php`.
2.  **Acceso según rol.**
    * Tras iniciar sesión, el usuario verá opciones distintas según sea:
        * Administrador
        * Usuario normal
3.  **Funciones exclusivas del administrador:**
    * Registrar nuevos usuarios, indicando nombre de usuario, contraseña y rol.
    * Modificar el precio de un libro indicando su **ISBN** o **título exacto**.
    * Ver un listado de todos los libros de la base de datos.
4.  **Funciones comunes para cualquier usuario autenticado:**
    * Buscar libros por **género obligatorio**.
    * Permitir además filtrar por **precio máximo opcional**.
    * Mostrar un mensaje claro si no se encuentran resultados.
5.  **Cerrar sesión correctamente.**

### Requisitos de seguridad:
* No guardar contraseñas en texto plano.
* Usar `password_hash()` para almacenar contraseñas.
* Usar `password_verify()` en el login.
* Evitar inyección SQL mediante consultas preparadas.
* Validar correctamente los campos de los formularios.

### Auditoría:
* Cada vez que un administrador modifique el precio de un libro, debe registrarse en un archivo de texto tipo `logs/auditoria.log`.
* El log debe guardar al menos: fecha y hora, usuario que hizo el cambio, libro modificado, precio anterior y precio nuevo.

### Mensajes de error y confirmación:
* Si el login falla, debe avisarse.
* Si se intenta modificar un libro que no existe, debe mostrarse un error.
* Si la búsqueda no devuelve resultados, debe informarse al usuario.
* Si el registro de usuario ya existe, debe avisarse.

## Estructura mínima sugerida
Tu proyecto deberá incluir, al menos:
* `index.php`
* `login.php`
* `logout.php`
* `conexion.php`
* `registro_usuario.php`
* `buscar_libros.php`
* `modificar_precio.php`
* `funciones.php`
* carpeta `logs/`
* archivo `.sql` con el esquema y datos iniciales

## Condiciones de funcionamiento
* Toda la aplicación debe funcionar con **sesiones**.
* El acceso directo a páginas restringidas sin sesión no estará permitido.
* El administrador debe poder entrar primero con un usuario creado previamente en la base de datos.
* La aplicación debe estar pensada para trabajar con **PHP embebido en HTML** o un estilo muy básico de PHP procedural, sin frameworks.

## Lo que te pediría el profesor
Para validarlo, el profesor comprobará:
* que el login funciona,
* que hay control de sesión,
* que los roles restringen opciones,
* que la búsqueda funciona con género obligatorio y precio opcional,
* que la modificación de precio solo la puede hacer admin,
* que el log se escribe correctamente,
* que las contraseñas están hasheadas,
* y que los errores se muestran bien.

## Versión un poco más difícil
Si quieres un examen “igual o mejor”, añade estas dos mejoras:
1.  **Alta de libros por el administrador.**
2.  **Borrado de libros con confirmación.**

Eso obliga a trabajar más el control de formularios, validación, consultas SQL y sesiones, y te deja mejor preparado.

## Reparto orientativo de puntos
* **Login con sesiones:** 2 puntos.
* **Control de roles:** 1 punto.
* **Registro de usuarios por admin:** 1 punto.
* **Búsqueda de libros con filtros:** 2 puntos.
* **Modificación de precio:** 2 puntos.
* **Hash de contraseñas y seguridad:** 1 punto.
* **Log de auditoría:** 1 punto.
* **Mensajes de error/éxito:** 1 punto.