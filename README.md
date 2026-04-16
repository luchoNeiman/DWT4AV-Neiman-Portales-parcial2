# UMAMI E-Commerce 🛍️

Un e-commerce completamente funcional desarrollado con **Laravel 12** y **Vite**, integrado con **Mercado Pago** para procesamiento de pagos.

## Notas sobre Funcionalidades Particulares

### Sistema de Pagos con Mercado Pago
El proyecto incluye la integración completa de **Mercado Pago SDK v2**. El flujo de compra funciona perfectamente:
- El usuario realiza el pago de prueba
- Se redirige automáticamente a la vista de éxito
- El pedido pasa automáticamente a estado "completado"

**Nota sobre Webhooks:** Para desarrollo local con webhooks, se utilizó **Ngrok** para crear túneles. En producción, los webhooks funcionarán directamente con la API de Mercado Pago.

---

## 🚀 Guía de Instalación Local

Sigue estos pasos para ejecutar el proyecto en tu máquina local.

### Requisitos Previos
- **PHP 8.2+** instalado
- **Composer** instalado ([descargar](https://getcomposer.org/))
- **Node.js 18+** con npm ([descargar](https://nodejs.org/))
- **Git** instalado

### Pasos de Instalación

#### 1. Clonar el Repositorio
```bash
git clone https://github.com/tu-usuario/umami-ecommerce.git
cd umami-ecommerce
```

#### 2. Instalar Dependencias de PHP
```bash
composer install
```

#### 3. Crear el Archivo de Configuración `.env`
```bash
cp .env.example .env
```

#### 4. Generar la Clave de la Aplicación
```bash
php artisan key:generate
```

#### 5. Instalar Dependencias de Node.js
```bash
npm install
```

#### 6. Crear la Base de Datos
```bash
# La base de datos se crea automáticamente con MySQL en XAMPP
# Asegúrate de:
# 1. Tener MySQL iniciado en XAMPP
# 2. Ejecutar las migraciones (paso 7)
```

#### 7. Ejecutar las Migraciones
```bash
php artisan migrate
```

#### 8. Cargar Datos de Prueba (Seeders)
```bash
php artisan db:seed
```

El seeder incluye:
- 3 categorías de productos
- 10 productos de ejemplo
- Usuarios de prueba

### Credenciales de Prueba
Después de ejecutar los seeders, puedes iniciar sesión con:
- **Email:** `usuario@example.com`
- **Contraseña:** `password`

---

## 🖥️ Ejecutar el Proyecto

### Primer Paso: Iniciar MySQL en XAMPP
1. Abre el **XAMPP Control Panel** (`C:\xampp\xampp-control.exe`)
2. Haz clic en **Start** en la fila de **MySQL**
3. Espera a que diga "Running"

### Opción 1: Comando Automático (Recomendado)
```bash
composer run setup
```
Este comando ejecuta automáticamente:
- `composer install`
- Crea `.env` si no existe
- `php artisan key:generate`
- `php artisan migrate`

### Opción 2: Manualmente en dos terminales

**Terminal 1 - Servidor PHP:**
```bash
php artisan serve
```
El servidor estará disponible en: `http://localhost:8000`

**Terminal 2 - Compilación de Assets (CSS/JS):**
```bash
npm run dev
```

> **Importante:** Asegúrate de que MySQL está corriendo en XAMPP antes de ejecutar `php artisan serve`

---

## 📦 Estructura del Proyecto

```
app/
├── Models/              # Modelos Eloquent
├── Http/
│   ├── Controllers/     # Controladores de rutas
│   └── Middleware/      # Middleware personalizado
database/
├── migrations/          # Migraciones de base de datos
└── seeders/             # Datos de prueba
resources/
├── views/               # Plantillas Blade PHP
├── css/                 # Estilos del proyecto
└── js/                  # JavaScript del proyecto
routes/
└── web.php              # Definición de rutas
```

---

## 🔧 Configuración de Mercado Pago

Para usar Mercado Pago en producción, necesitas:

1. Crear una cuenta en [Mercado Pago](https://www.mercadopago.com/)
2. Obtener tus credenciales (Access Token, Public Key, etc.)
3. Actualizar en el archivo `.env`:
```env
MERCADOPAGO_ACCESS_TOKEN=tu_access_token
MERCADOPAGO_PUBLIC_KEY=tu_public_key
```

---

## 🌐 Deployment en Vercel

### 1. Preparar Base de Datos en Aiven

1. En Aiven, entra a tu servicio MySQL y copia estos datos:
	- Service URI
	- Host
	- Port
	- Database name (normalmente `defaultdb`)
	- User
	- Password
2. En "Allowed inbound IP addresses", agrega temporalmente `0.0.0.0/0` para pruebas.
3. Importa tu dump de base de datos (`umami_db2.sql`) a Aiven.

Ejemplo por consola (reemplaza valores):

```bash
mysql -h <AIVEN_HOST> -P <AIVEN_PORT> -u <AIVEN_USER> -p <AIVEN_DATABASE> < umami_db2.sql
```

### 2. Configurar Proyecto en Vercel

1. Sube este proyecto a GitHub (si aun no esta).
2. En Vercel: "Add New Project" -> importa tu repositorio.
3. Vercel detectara Laravel con `vercel.json`.

### 3. Variables de Entorno en Vercel

En Vercel -> Project Settings -> Environment Variables, agrega:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-proyecto.vercel.app
APP_KEY=base64:TU_APP_KEY_GENERADA

DB_CONNECTION=mysql
DB_HOST=tu-host-aiven
DB_PORT=tu-puerto-aiven
DB_DATABASE=defaultdb
DB_USERNAME=tu-usuario-aiven
DB_PASSWORD=tu-password-aiven

# Si Aiven requiere SSL con CA, agrega ruta del certificado:
# MYSQL_ATTR_SSL_CA=/var/task/certs/ca.pem

MERCADO_PAGO_PUBLIC_KEY=tu_public_key
MERCADO_PAGO_ACCESS_TOKEN=tu_access_token
```

Notas:
1. Si usas `DB_URL` de Aiven, puedes cargar una sola variable en lugar de host/port/user/password.
2. `APP_KEY` debe ser una key valida de Laravel (`base64:...`).

### 4. Build y Deploy

En Vercel, configura estos comandos:

1. Install Command:

```bash
composer install --no-dev --optimize-autoloader ; npm install
```

2. Build Command:

```bash
npm run build
```

3. Output Directory: dejar vacio (usa `vercel.json`).

### 5. Migraciones en Produccion

Luego del primer deploy, ejecuta migraciones contra Aiven.

Opciones:
1. Desde tu PC apuntando al mismo Aiven con `.env` de produccion y correr `php artisan migrate --force`.
2. O temporalmente con un job/script de deploy.

### 6. Mercado Pago sin Ngrok (Produccion)

Cuando el sitio este en Vercel, ya no necesitas ngrok.

Configura en Mercado Pago:
1. Webhook URL: `https://tu-proyecto.vercel.app/webhook/mercadopago`
2. Back URLs:
	- `https://tu-proyecto.vercel.app/pago/exitoso`
	- `https://tu-proyecto.vercel.app/pago/fallido`
	- `https://tu-proyecto.vercel.app/pago/pendiente`

---

## 📁 Archivos Importantes

- `routes/web.php` - Definición de todas las rutas
- `database/migrations/` - Estructura de la base de datos
- `database/seeders/` - Datos de inicialización
- `resources/views/` - Plantillas HTML/Blade
- `.env.example` - Variables de entorno de ejemplo

---

## 🛠️ Comandos Útiles

| Comando | Descripción |
|---------|-------------|
| `php artisan serve` | Inicia el servidor de desarrollo |
| `php artisan migrate` | Ejecuta las migraciones |
| `php artisan db:seed` | Carga datos de prueba |
| `php artisan tinker` | Consola interactiva PHP |
| `npm run dev` | Compila assets en desarrollo |
| `npm run build` | Compila assets para producción |

---

## ✅ Verificar Que Todo Funcione

1. Servidor corriendo: `http://localhost:8000`
2. Deberías ver la página de inicio
3. Navega a la sección de catálogo para ver productos
4. Intenta agregar productos al carrito
5. Prueba el flujo de pago con Mercado Pago (usa tarjeta de prueba)

---

## 📝 Notas de Desarrollo

- El proyecto usa **MySQL/MariaDB** en XAMPP para desarrollo local
- Para producción, se recomienda usar **MySQL en Aiven** (servicio en nube)
- Los archivos estáticos se sirven desde `public/`
- Las sesiones se guardan en la base de datos
- Asegúrate de tener MySQL iniciado antes de ejecutar el servidor

---

## 🐛 Solución de Problemas

### "Error: MySQL shutdown unexpectedly"
Si MySQL no inicia en XAMPP:
1. Abre `C:\xampp\mysql\data` y verifica los logs en `mysql_error.log`
2. Limpia los archivos corruptos: `ib_logfile0`, `ib_logfile1`, `ibdata1`
3. Reinicia XAMPP

### "SQLSTATE[HY000] [2002] No se puede conectar"
```bash
# Verifica que MySQL esté corriendo
mysql -u root -e "SELECT 1"

# Si no funciona, inicia MySQL desde XAMPP Control Panel
```

### "Archivo .env no encontrado"
```bash
cp .env.example .env
php artisan key:generate
```

### "Puertos ocupados"
Si el puerto 8000 está ocupado:
```bash
php artisan serve --port=8001
```

### "Módulo OpenSSL duplicado"
Es una advertencia de PHP que no afecta el funcionamiento. Puedes ignorarla.

### MySQL no inicia (InnoDB corrupted)
Esta es una situación rara pero si ocurre:
```bash
# Detén MySQL
# Vacía la carpeta C:\xampp\mysql\data
# Ejecuta C:\xampp\mysql\bin\mysql_install_db.exe
# Reinicia MySQL desde XAMPP
```

---

## 📞 Contacto y Soporte

Para reportar problemas o sugerencias, abre un issue en el repositorio.

---

## 📄 Licencia

MIT - Ver archivo LICENSE para más detalles.

---

**Última actualización:** Abril 2026
