-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2026 a las 23:25:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `umami_db2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_items`
--

CREATE TABLE `carrito_items` (
  `carrito_item_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `precio_unitario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Hamburguesas', 'Elaboradas a base de hongos frescos y pan artesanal. Son el corazón de UMAMI: sabrosas, nutritivas y 100% plant-based.', '2026-03-02 08:06:14', '2026-03-02 08:06:14'),
(2, 'Wraps', 'Alternativas livianas y frescas, rellenas de hongos y vegetales sazonados con especias naturales. Perfectas para una comida rápida y saludable.', '2026-03-02 08:06:14', '2026-03-02 08:06:14'),
(3, 'Acompañamientos', 'Papas rústicas, bastones de shiitake crocantes y otras guarniciones diseñadas para acompañar cada combo sin perder el toque gourmet.', '2026-03-02 08:06:14', '2026-03-02 08:06:14'),
(4, 'Condimentos', 'Salsas y sales de hongos que potencian el sabor natural de cada plato. Pequeños detalles que hacen la diferencia.', '2026-03-02 08:06:14', '2026-03-02 08:06:14'),
(5, 'Bebidas', 'Desde aguas funcionales con hongos medicinales (Reishi, Maitake) hasta limonadas y kombuchas naturales. Refrescantes, equilibradas y únicas.', '2026-03-02 08:06:14', '2026-03-02 08:06:14'),
(6, 'Postres', 'Opciones dulces inspiradas en la fusión de lo natural y lo artesanal. Sabores suaves que cierran la   experiencia UMAMI con estilo.', '2026-03-02 08:06:14', '2026-03-02 08:06:14'),
(7, 'Combos', 'Combinaciones pensadas para compartir o disfrutar solo, con precios accesibles y equilibrio perfecto entre sabor, nutrición y presentación.', '2026-03-02 08:06:14', '2026-03-02 08:06:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_usuarios_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_03_071230_create_categorias_table', 1),
(5, '2025_11_03_071230_create_productos_table', 1),
(6, '2025_11_08_174743_create_carrito_items_table', 1),
(7, '2025_11_09_000001_add_perfil_fields_to_usuarios_table', 1),
(8, '2025_11_13_034500_add_last_login_at_to_usuarios_table', 1),
(9, '2025_11_30_225440_create_pedidos_table', 1),
(10, '2025_11_30_225449_create_pedido_items_table', 1),
(11, '2026_02_22_025934_add_mercadopago_fields_to_pedidos_table', 1),
(12, '2026_02_28_000001_add_detalle_productos_to_pedidos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `detalle_productos` text DEFAULT NULL,
  `preference_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'completado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `id`, `fecha`, `total`, `detalle_productos`, `preference_id`, `payment_id`, `status`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, '2026-03-02 05:09:43', 14000, 'Clásica Umami x2 ($7.000)', NULL, NULL, NULL, 'pendiente', '2026-03-02 08:09:43', '2026-03-02 08:09:43'),
(2, 2, '2026-03-02 05:21:09', 7000, 'Clásica Umami x1 ($7.000)', '3211944523-c537bbdc-660d-4732-aad1-476d028f1a5e', '148456839818', 'approved', 'completado', '2026-03-02 08:21:09', '2026-03-02 08:23:04'),
(3, 2, '2026-03-02 06:22:48', 9800, 'Trufa & Shiitake x1 ($9.800)', '3211944523-61c26008-56d5-45ab-8868-b7c0060aafbd', '147749679001', 'pending', 'cancelado', '2026-03-02 09:22:48', '2026-03-02 09:25:30'),
(4, 2, '2026-03-02 06:32:12', 9200, 'Mediterránea x1 ($9.200)', '3211944523-d944efb8-1dd5-41f7-a8de-d640fce58293', '148461615278', 'approved', 'completado', '2026-03-02 09:32:12', '2026-03-02 09:33:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_items`
--

CREATE TABLE `pedido_items` (
  `pedido_item_id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_items`
--

INSERT INTO `pedido_items` (`pedido_item_id`, `pedido_id`, `producto_id`, `nombre_producto`, `cantidad`, `precio_unitario`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Clásica Umami', 2, 7000, '2026-03-02 08:09:43', '2026-03-02 08:09:43'),
(2, 2, 1, 'Clásica Umami', 1, 7000, '2026-03-02 08:21:09', '2026-03-02 08:21:09'),
(3, 3, 5, 'Trufa & Shiitake', 1, 9800, '2026-03-02 09:22:48', '2026-03-02 09:22:48'),
(4, 4, 2, 'Mediterránea', 1, 9200, '2026-03-02 09:32:12', '2026-03-02 09:32:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion_corta` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `etiqueta` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `descripcion_corta`, `descripcion`, `precio`, `stock`, `categoria_id`, `imagen`, `etiqueta`, `created_at`, `updated_at`) VALUES
(1, 'Clásica Umami', 'Medallón de gírgolas frescas, queso cheddar vegano, lechuga, tomate, cebolla morada y salsa especial Umami, en pan artesanal de papa.', 'Preparada con gírgolas frescas, pan artesanal y condimentos naturales. La versión más equilibrada y sabrosa de una burger plant-based.', 7000, 25, 1, 'productos/hamburguesa-clasica-umami-productos.webp', 'Clásico', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(2, 'Mediterránea', 'Hongos de estación con tomates secos, espinaca fresca y aderezo de ajo confitado.', 'Inspirada en sabores del Mediterráneo, con tomate seco, aceitunas y especias naturales. Fresca, aromática y ligera.', 9200, 20, 1, 'productos/mediterranea-umami-productos.webp', 'Mediterránea', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(3, 'Fungi BBQ', 'Hamburguesa de portobellos grillados con salsa barbacoa casera, cebolla caramelizada y rúcula fresca.', 'Hongos a la parrilla con salsa barbacoa artesanal. Textura jugosa y sabor ahumado que conquista.', 9000, 18, 1, 'productos/fungi-BBQ-umami-productos.webp', 'BBQ', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(4, 'Spicy Gírgola', 'Gírgolas crocantes con salsa picante de chipotle, jalapeños en rodajas y cebolla crispy.', 'Gírgolas marinadas en especias picantes y toque ahumado. Energética, audaz y sabrosa.', 9500, 22, 1, 'productos/spicy-girgola-umami-productos.webp', 'Picante', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(5, 'Trufa & Shiitake', 'Medallón de shiitake y gírgolas con crema suave de trufa, rúcula fresca y queso vegano fundido.', 'Shiitakes salteados y aceite de trufa negra. Una experiencia gourmet intensa y sofisticada.', 9800, 15, 1, 'productos/hamburguesa-trufa-shiitake-umami-productos.webp', 'Gourmet', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(6, 'Umami Oriental', 'Hongos shiitake y portobellos, acompañada de pepino encurtido, salsa de soja dulce, jengibre fresco y mayonesa de wasabi suave en pan artesanal de sésamo.', 'Gírgolas salteadas con salsa miso y jengibre, cebolla caramelizada, pickles de pepino y una mayonesa umami con toque de sésamo; textura jugosa y perfil claramente oriental pero 100% plant-based.', 9800, 20, 1, 'productos/hamburguesa-umami-oriental-umami-productos.webp', 'Oriental', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(7, 'Andina Gluten Free', 'Medallón de hongos y lentejas, pan de quinoa sin gluten, palta fresca y brotes.', 'Medallón de hongos y lentejas, pan de quinoa sin gluten, palta fresca y brotes. Una opción nutritiva y libre de gluten.', 8500, 50, 1, 'productos/andina-gluten-free-umami-productos.webp', 'Gluten Free', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(8, 'Tex Mex Veggie', 'Portobello especiado, guacamole, maíz asado, pico de gallo y nachos crocantes.', 'Portobello especiado, guacamole, maíz asado, pico de gallo y nachos crocantes. Sabores intensos y vibrantes.', 9200, 60, 1, 'productos/tex-mex-veggie-umami-productos.webp', 'Tex Mex', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(9, 'Wrap de Hongos', 'Gírgolas salteadas al wok, vegetales de estación y nuestra salsa especial de hongos que realza cada bocado.', 'Mix de hongos, vegetales y aderezo de limón y sésamo envueltos en pan integral. Ligero y nutritivo.', 6500, 25, 2, 'productos/wrap-de-hongos-umami-productos.webp', 'Saludable', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(10, 'Combo Papas + Salsa Especial', 'Papas clásicas con salsa Umami de hongos y hierbas frescas.', 'Porción grande de papas rústicas cortadas a mano servidas con nuestra Salsa Especial UMAMI (base cremosa, ajo rostizado, reducción de miso y toque cítrico). Perfecto para compartir o como acompañamiento premium.', 4200, 100, 3, 'productos/combo-papas-salsaUmami-umami-productos.webp', 'Combo', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(11, 'Papas Rústicas', 'Papas cortadas a mano, condimentadas con sal ahumada y romero.', 'Cortadas a mano, cocidas al horno y sazonadas con sal UMAMI. Crocantes por fuera, suaves por dentro.', 3500, 40, 3, 'productos/papas-rusticas-umami-productos.webp', 'Clásico', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(12, 'Bastones de Shiitake Crocantes', 'Bastones de hongos shiitake apanados con mix de semillas, acompañados con alioli de ajo asado.', 'Shiitakes empanizados y crocantes. Perfectos para acompañar o picar solo.', 4500, 30, 3, 'productos/bastones-shiitake-crocantes-umami-productos.webp', 'Crocante', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(13, 'Sal umami', 'Sal marina infusionada con hongos deshidratados, diseñada para potenciar el sabor natural de cada plato con un toque único y sofisticado.', 'Mezcla artesanal de sales marinas y hongos deshidratados. Potencia cualquier plato naturalmente.', 2500, 50, 4, 'productos/sal-umami-productos.webp', 'Natural', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(14, 'Limonada umami', 'Limonada fresca con un toque de jengibre y albahaca.', 'Refrescante, casera y herbal. Ideal para equilibrar sabores intensos.', 4800, 45, 5, 'productos/limonada-umami-umami-productos.webp', 'Natural', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(15, 'Agua Reishi', 'Infusión refrescante de hongos reishi con toques cítricos, energizante y natural.', 'Agua funcional con extracto de Reishi, antioxidante y relajante.', 5000, 40, 5, 'productos/agua-de-reishi-refrescante-umami-productos.webp', 'Funcional', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(16, 'Agua Maitake', 'Agua saborizada con extracto de maitake, con notas herbales y revitalizantes.', 'Bebida infusionada con Maitake, ideal para fortalecer el sistema inmune.', 5000, 40, 5, 'productos/agua-de-maitake-umami-productos.webp', 'Funcional', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(17, 'Cerveza Artesanal Umami', 'Golden ale infusionada con hongos portobello, suave y equilibrada.', 'Cerveza ligera y fresca que complementa perfectamente los sabores de hongos.', 6800, 25, 5, 'productos/cerveza-umami-artesanal-umami-productos.webp', 'Artesanal', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(18, 'Brownie shiitake', 'Brownie húmedo con extracto de shiitake, chocolate amargo 70% y nueces.', 'Delicioso brownie vegano con polvo de hongos adaptógenos. Dulce, saludable y nutritivo.', 4500, 30, 6, 'productos/brownie-shiitake-umami-productos.webp', 'vegano', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(19, 'Cheesecake de anacardos y reishi', 'Cheesecake cremoso con base de galletas integrales y un toque de hongo reishi.', 'Postre cremoso y sin lácteos, infusionado con Reishi. Sabor suave y textura aterciopelada.', 5200, 20, 6, 'productos/cheesecake-reishi-umami-productos.webp', 'sin-lacteos', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(20, 'Combo Clásico umami', 'Hamburguesa Clásica + Papas Rústicas + Limonada Umami.', 'Hamburguesa Clásica + Papas Rústicas + Limonada UMAMI. La experiencia base de UMAMI.', 11500, 25, 7, 'productos/combo-clasico-umami-productos.webp', 'Clásico', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(21, 'Combo Mediterráneo', 'Hamburguesa Mediterránea + Papas especiadas + Agua Reishi.', 'Hamburguesa Mediterránea + Papas especiadas + Agua Reishi. Ligero y fresco.', 12800, 20, 7, 'productos/combo-mediterraneo-umami-productos.webp', 'Mediterráneo', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(22, 'Combo Fungi BBQ', 'Hamburguesa Fungi BBQ + Papas & Salsas + Agua Reishi.', 'Hamburguesa Fungi BBQ + Papas & Salsas + Agua Reishi. Intenso y ahumado.', 12600, 22, 7, 'productos/combo-fungi-bbq-umami-productos.webp', 'BBQ', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(23, 'Combo Trufa & Shiitake', 'Hamburguesa Trufa & Shiitake + Bastones de shiitake crocantes + Agua Maitake.', 'Hamburguesa Trufa & Shiitake + Bastones Crocantes + Agua Maitake. Gourmet y sofisticado.', 13900, 18, 7, 'productos/combo-trufa-shiitake-umami-productos.webp', 'Gourmet', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(24, 'Combo Spicy Gírgola', 'Hamburguesa Spicy Gírgola + Bastones de shiitake crocantes + Limonada umami.', 'Hamburguesa Spicy Gírgola + Bastones Crocantes + Limonada UMAMI. Picante y energético.', 12300, 20, 7, 'productos/combo-spicy-girgola-umami-productos.webp', 'Picante', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(25, 'Combo Wrap Saludable', 'Wrap de Hongos + Papas Rústicas + Agua Mineral.', 'Wrap de Hongos + Papas Rústicas + Agua Mineral. Liviano y fresco.', 10900, 28, 7, 'productos/combo-wrap-saludable-umami-productos.webp', 'Saludable', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(26, 'Combo Nuggets Fan', 'Nuggets de Hongos + Papas & Salsas + Limonada umami.', 'Nuggets de Hongos + Papas & Salsas + Limonada UMAMI. Divertido y crocante.', 9800, 30, 7, 'productos/combo-nuggets-fan-umami-productos.webp', 'Familiar', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(27, 'Combo Dúo', '2 Hamburguesas a elección + Papas XL con dips + 2 Bebidas.', '2 Hamburguesas a elección + Papas XL + 2 bebidas. Ideal para compartir.', 22500, 15, 7, 'productos/combo-duo-umami-productos.webp', 'Compartir', '2026-03-02 08:06:15', '2026-03-02 08:06:15'),
(28, 'Combo Wrap y Sal', 'Wrap de hongos deliciosos, condimentados con sal umami y una cerveza para acompañar. Luego de eso un brownie umami de postre.', 'Wrap de Hongos + Sal UMAMI + Cerveza + Brownie. Completo y equilibrado.', 13500, 18, 7, 'productos/combo-sobres-cerveza-postre-umami-productos.webp', 'Completo', '2026-03-02 08:06:15', '2026-03-02 08:06:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2T51OYaut3GAIBOpfWQt6xZX3Yo0pUSQoOA1p6H8', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiekk0cXFCdHo2aks3Vnc3SktzUzZtV2JBMFlsUXo4Z2laTHI4N1NQViI7czo4OiJmZWVkYmFjayI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzQ6Imh0dHA6Ly96YWluLW5vbmZ1bmN0aW9uYWwtbm9uaW50ZXJwcmV0YXRpdmVseS5uZ3Jvay1mcmVlLmRldi9jYXJyaXRvL2NvdW50IjtzOjU6InJvdXRlIjtzOjEzOiJjYXJyaXRvLmNvdW50Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1772443553),
('36TLfQ0koEqzHiYAC2fpdJcJiNTU9rothY4eVS4p', NULL, '127.0.0.1', 'MercadoPago WebHook v1.0 payment', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidDQxdlZ4WVkxTVpBZENEdjBZUDlYTmxCNG5FMVV1RWNUdDN0Y1lCVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772443460),
('7h1hDbtbzCB2yOpKLpFeFqQox7JgJzj6EYlY5P4D', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia2hFUHpYWEM5RFVsMndPampoQXVVZHBQOHhXdzdjeENISWU2R2l1ViI7czo4OiJmZWVkYmFjayI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzU6Imh0dHA6Ly96YWluLW5vbmZ1bmN0aW9uYWwtbm9uaW50ZXJwcmV0YXRpdmVseS5uZ3Jvay1mcmVlLmRldi9hZG1pbi91c3VhcmlvcyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4udXN1YXJpb3MuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1772444308),
('8gVgGA8syPMXrFVi1eaOJRXo1KnT3Oas5BKI5H2Z', NULL, '127.0.0.1', 'MercadoPago WebHook v1.0 payment', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiclMyYmVpUmRRR09qYXprMlBwYnUxZDU4ZXdlb0xGQlBaZ1pLNUJrcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772443987),
('DGIQDbTYscsOHPncSUoXxxKbTLR3G5dJk34UhywG', NULL, '127.0.0.1', 'MercadoPago WebHook v1.0 payment', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoielBlUmVYWHRmVElyN0hNN0dEc3pGcFhacnFiY3owU00yaVZYTGs0QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772439779),
('hQpGexjEbkwFBCSluSZHPUBJX071LIcEnTrUoUWd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRElXZ3dmWDJOV2Nld280R3lCREtXeU1xMVNjTWp2RXVHQjUzQ1dveSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly96YWluLW5vbmZ1bmN0aW9uYWwtbm9uaW50ZXJwcmV0YXRpdmVseS5uZ3Jvay1mcmVlLmRldiI7czo1OiJyb3V0ZSI7czo1OiJpbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772442107),
('i10Xf32swNr8dDDyv39YBalFpqyxgMYCG4vLQFdl', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSmI0clB3cVcycklkMEpYcnhtZmVxeGRWM2xPNkYxR2s1enhwOTRCYyI7czo4OiJmZWVkYmFjayI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo1OiJpbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1772439502),
('pd61Q7c2fGrR6neRaBoBoUxzqNFCQ44qeWeXkqvg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0hzV21acG1kTVJZd3A0Z1RsN09HSG1WUlRWQm94N05yYmg2YTB0SSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo1OiJpbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772487994),
('unJK5SD7Kho8ADdtMW50lHKkV4MAunhNopTSEFpg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2xLV0tMZEFHVGJ0dVpjUkh0ODd3QjZ4MXB2VklpaUl5WDZhTEwyZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly96YWluLW5vbmZ1bmN0aW9uYWwtbm9uaW50ZXJwcmV0YXRpdmVseS5uZ3Jvay1mcmVlLmRldiI7czo1OiJyb3V0ZSI7czo1OiJpbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772489828);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'usuario',
  `ubicacion` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `email_verified_at`, `password`, `rol`, `ubicacion`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin Umami', 'admin@umami.com', NULL, '$2y$12$yNVtIrxbpNE9fopctKtBjO/UhYGg5TtcuW0azHg4cziaithVUjyZW', 'admin', 'Sede Central', NULL, '2026-03-02 09:34:13', '2026-03-02 08:06:15', '2026-03-02 09:34:13'),
(2, 'Luciano Neiman', 'luciano.neiman@davinci.edu.ar', NULL, '$2y$12$2TqBhz0Fgi/OLNivZ7TZveX06mFIT/OTnRMzaxNJaLps8R3jZSqTK', 'usuario', 'Angel Gallardo 97, CABA', NULL, '2026-03-02 09:31:48', '2026-03-02 08:06:15', '2026-03-02 09:31:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  ADD PRIMARY KEY (`carrito_item_id`),
  ADD UNIQUE KEY `carrito_items_usuario_id_producto_id_unique` (`usuario_id`,`producto_id`),
  ADD KEY `carrito_items_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `pedidos_id_foreign` (`id`);

--
-- Indices de la tabla `pedido_items`
--
ALTER TABLE `pedido_items`
  ADD PRIMARY KEY (`pedido_item_id`),
  ADD KEY `pedido_items_pedido_id_foreign` (`pedido_id`),
  ADD KEY `pedido_items_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  MODIFY `carrito_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedido_items`
--
ALTER TABLE `pedido_items`
  MODIFY `pedido_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  ADD CONSTRAINT `carrito_items_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_items_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_foreign` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido_items`
--
ALTER TABLE `pedido_items`
  ADD CONSTRAINT `pedido_items_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_items_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
