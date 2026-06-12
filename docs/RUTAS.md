# Documentacion de rutas

Las rutas web del sistema se encuentran en `routes/web.php`.

## Rutas publicas

### GET /login

Controlador: `AuthController`

Metodo: `showLogin()`

Funcion: mostrar el formulario de ingreso.

Vista: `auth/login.blade.php`

Acceso: usuarios no autenticados.

### POST /login

Controlador: `AuthController`

Metodo: `login()`

Funcion: validar credenciales e iniciar sesion.

Acceso: usuarios no autenticados.

## Rutas autenticadas

### GET /

Controlador: `HomeController`

Metodo: `index()`

Funcion: mostrar la pantalla principal.

Vista: `home.blade.php`

Acceso: `admin`, `carga`, `consulta`.

### POST /logout

Controlador: `AuthController`

Metodo: `logout()`

Funcion: cerrar la sesion activa.

Acceso: usuarios autenticados.

## Mediciones

### GET /mediciones

Controlador: `MedicionController`

Metodo: `index()`

Funcion: listar mediciones cargadas.

Vista: `mediciones/index.blade.php`

Acceso: `admin`, `carga`, `consulta`.

### GET /mediciones/create

Controlador: `MedicionController`

Metodo: `create()`

Funcion: mostrar formulario de nueva medicion.

Vista: `mediciones/create.blade.php`

Acceso: `admin`, `carga`.

### POST /mediciones

Controlador: `MedicionController`

Metodo: `store()`

Funcion: validar y guardar una medicion.

Acceso: `admin`, `carga`.

## Inspecciones

### GET /inspecciones

Controlador: `InspeccionController`

Metodo: `index()`

Funcion: listar inspecciones cargadas.

Vista: `inspecciones/index.blade.php`

Acceso: `admin`, `carga`, `consulta`.

### GET /inspecciones/create

Controlador: `InspeccionController`

Metodo: `create()`

Funcion: mostrar formulario de nueva inspeccion.

Vista: `inspecciones/create.blade.php`

Acceso: `admin`, `carga`.

### POST /inspecciones

Controlador: `InspeccionController`

Metodo: `store()`

Funcion: validar y guardar una inspeccion.

Acceso: `admin`, `carga`.
