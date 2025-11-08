-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2025 a las 17:32:19
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
-- Base de datos: `umami_db`
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
(1, 'Hamburguesas', 'Elaboradas a base de hongos frescos y pan artesanal. Son el corazón de UMAMI: sabrosas, nutritivas y 100% plant-based.', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(2, 'Wraps', 'Alternativas livianas y frescas, rellenas de hongos y vegetales sazonados con especias naturales. Perfectas para una comida rápida y saludable.', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(3, 'Acompañamientos', 'Papas rústicas, bastones de shiitake crocantes y otras guarniciones diseñadas para acompañar cada combo sin perder el toque gourmet.', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(4, 'Condimentos', 'Salsas y sales de hongos que potencian el sabor natural de cada plato. Pequeños detalles que hacen la diferencia.', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(5, 'Bebidas', 'Desde aguas funcionales con hongos medicinales (Reishi, Maitake) hasta limonadas y kombuchas naturales. Refrescantes, equilibradas y únicas.', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(6, 'Postres', 'Opciones dulces inspiradas en la fusión de lo natural y lo artesanal. Sabores suaves que cierran la   experiencia UMAMI con estilo.', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(7, 'Combos', 'Combinaciones pensadas para compartir o disfrutar solo, con precios accesibles y equilibrio perfecto entre sabor, nutrición y presentación.', '2025-11-08 05:06:53', '2025-11-08 05:06:53');

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
  `name` varchar(255) NOT NULL,
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
(5, '2025_11_03_071230_create_productos_table', 1);

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
(1, 'Clásica Umami', 'Medallón de gírgolas frescas, queso cheddar vegano, lechuga, tomate, cebolla morada y salsa especial Umami, en pan artesanal de papa.', 'Preparada con gírgolas frescas, pan artesanal y condimentos naturales. La versión más equilibrada y sabrosa de una burger plant-based.', 7000, 25, 1, 'hamburguesa-clasica-umami-productos.webp', 'Clásico', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(2, 'Mediterránea', 'Hongos de estación con tomates secos, espinaca fresca y aderezo de ajo confitado.', 'Inspirada en sabores del Mediterráneo, con tomate seco, aceitunas y especias naturales. Fresca, aromática y ligera.', 9200, 20, 1, 'hamburguesa-mediterranea-umami-productos.webp', 'Mediterránea', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(3, 'Fungi BBQ', 'Hamburguesa de portobellos grillados con salsa barbacoa casera, cebolla caramelizada y rúcula fresca.', 'Hongos a la parrilla con salsa barbacoa artesanal. Textura jugosa y sabor ahumado que conquista.', 9000, 18, 1, 'hamburguesa-fungi-bbq-umami-productos.webp', 'BBQ', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(4, 'Spicy Gírgola', 'Gírgolas crocantes con salsa picante de chipotle, jalapeños en rodajas y cebolla crispy.', 'Gírgolas marinadas en especias picantes y toque ahumado. Energética, audaz y sabrosa.', 9500, 22, 1, 'spicy-girgola-umami-productos.webp', 'Picante', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(5, 'Trufa & Shiitake', 'Medallón de shiitake y gírgolas con crema suave de trufa, rúcula fresca y queso vegano fundido.', 'Shiitakes salteados y aceite de trufa negra. Una experiencia gourmet intensa y sofisticada.', 10, 15, 1, 'hamburguesa-trufa-shiitake-umami-productos.webp', 'Gourmet', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(6, 'Umami Oriental', 'Hongos shiitake y portobellos, acompañada de pepino encurtido, salsa de soja dulce, jengibre fresco y mayonesa de wasabi suave en pan artesanal de sésamo.', 'Gírgolas salteadas con salsa miso y jengibre, cebolla caramelizada, pickles de pepino y una mayonesa umami con toque de sésamo; textura jugosa y perfil claramente oriental pero 100% plant-based.', 9800, 20, 1, 'hamburguesa-umami-oriental-umami-productos.webp', 'Oriental', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(7, 'Andina Gluten Free', 'Medallón de hongos y lentejas, pan de quinoa sin gluten, palta fresca y brotes.', 'Medallón de hongos y lentejas, pan de quinoa sin gluten, palta fresca y brotes. Una opción nutritiva y libre de gluten.', 8500, 50, 1, 'andina-gluten-free-umami-productos.webp', 'Gluten Free', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(8, 'Tex Mex Veggie', 'Portobello especiado, guacamole, maíz asado, pico de gallo y nachos crocantes.', 'Portobello especiado, guacamole, maíz asado, pico de gallo y nachos crocantes. Sabores intensos y vibrantes.', 9200, 60, 1, 'tex-mex-veggie-umami-productos.webp', 'Tex Mex', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(9, 'Wrap de Hongos', 'Gírgolas salteadas al wok, vegetales de estación y nuestra salsa especial de hongos que realza cada bocado.', 'Mix de hongos, vegetales y aderezo de limón y sésamo envueltos en pan integral. Ligero y nutritivo.', 6500, 25, 2, 'wrap-de-hongos-umami-productos.webp', 'Saludable', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(10, 'Combo Papas + Salsa Especial', 'Papas clásicas con salsa Umami de hongos y hierbas frescas.', 'Porción grande de papas rústicas cortadas a mano servidas con nuestra Salsa Especial UMAMI (base cremosa, ajo rostizado, reducción de miso y toque cítrico). Perfecto para compartir o como acompañamiento premium.', 4200, 100, 3, 'combo-papas-salsaUmami-umami-productos.webp', 'Combo', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(11, 'Papas Rústicas', 'Papas cortadas a mano, condimentadas con sal ahumada y romero.', 'Cortadas a mano, cocidas al horno y sazonadas con sal UMAMI. Crocantes por fuera, suaves por dentro.', 3500, 40, 3, 'papas-rusticas-umami-productos.webp', 'Clásico', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(12, 'Bastones de Shiitake Crocantes', 'Bastones de hongos shiitake apanados con mix de semillas, acompañados con alioli de ajo asado.', 'Shiitakes empanizados y crocantes. Perfectos para acompañar o picar solo.', 4500, 30, 3, 'bastones-shiitake-umami-productos.webp', 'Crocante', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(13, 'Sal umami', 'Sal marina infusionada con hongos deshidratados, diseñada para potenciar el sabor natural de cada plato con un toque único y sofisticado.', 'Mezcla artesanal de sales marinas y hongos deshidratados. Potencia cualquier plato naturalmente.', 2500, 50, 4, 'sal-umami-productos.webp', 'Natural', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(14, 'Limonada umami', 'Limonada fresca con un toque de jengibre y albahaca.', 'Refrescante, casera y herbal. Ideal para equilibrar sabores intensos.', 4800, 45, 5, 'limonada-umami-productos.webp', 'Natural', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(15, 'Agua Reishi', 'Infusión refrescante de hongos reishi con toques cítricos, energizante y natural.', 'Agua funcional con extracto de Reishi, antioxidante y relajante.', 5000, 40, 5, 'agua-reishi-umami-productos.webp', 'Funcional', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(16, 'Agua Maitake', 'Agua saborizada con extracto de maitake, con notas herbales y revitalizantes.', 'Bebida infusionada con Maitake, ideal para fortalecer el sistema inmune.', 5000, 40, 5, 'agua-maitake-umami-productos.webp', 'Funcional', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(17, 'Cerveza Artesanal Umami', 'Golden ale infusionada con hongos portobello, suave y equilibrada.', 'Cerveza ligera y fresca que complementa perfectamente los sabores de hongos.', 6800, 25, 5, 'cerveza-umami-productos.webp', 'Artesanal', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(18, 'Brownie shiitake', 'Brownie húmedo con extracto de shiitake, chocolate amargo 70% y nueces.', 'Delicioso brownie vegano con polvo de hongos adaptógenos. Dulce, saludable y nutritivo.', 4500, 30, 6, 'brownie-de-hongos-umami-productos.webp', 'vegano', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(19, 'Cheesecake de anacardos y reishi', 'Cheesecake cremoso con base de galletas integrales y un toque de hongo reishi.', 'Postre cremoso y sin lácteos, infusionado con Reishi. Sabor suave y textura aterciopelada.', 5200, 20, 6, 'cheesecake-de-anacardos-y-reishi-umami-productos.webp', 'sin-lacteos', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(20, 'Combo Clásico umami', 'Hamburguesa Clásica + Papas Rústicas + Limonada Umami.', 'Hamburguesa Clásica + Papas Rústicas + Limonada UMAMI. La experiencia base de UMAMI.', 11500, 25, 7, 'combo-clasico-umami-productos.webp', 'Clásico', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(21, 'Combo Mediterráneo', 'Hamburguesa Mediterránea + Papas especiadas + Agua Reishi.', 'Hamburguesa Mediterránea + Papas especiadas + Agua Reishi. Ligero y fresco.', 12800, 20, 7, 'combo-mediterraneo-umami-productos.webp', 'Mediterráneo', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(22, 'Combo Fungi BBQ', 'Hamburguesa Fungi BBQ + Papas & Salsas + Bebida línea Coca-Cola.', 'Hamburguesa Fungi BBQ + Papas & Salsas + Bebida línea Coca-Cola. Intenso y ahumado.', 12600, 22, 7, 'combo-fungi-bbq-umami-productos.webp', 'BBQ', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(23, 'Combo Trufa & Shiitake', 'Hamburguesa Trufa & Shiitake + Bastones de shiitake crocantes + Agua Maitake.', 'Hamburguesa Trufa & Shiitake + Bastones Crocantes + Agua Maitake. Gourmet y sofisticado.', 13900, 18, 7, 'combo-trufa-shiitake-umami-productos.webp', 'Gourmet', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(24, 'Combo Spicy Gírgola', 'Hamburguesa Spicy Gírgola + Bastones de shiitake crocantes + Limonada umami.', 'Hamburguesa Spicy Gírgola + Bastones Crocantes + Limonada UMAMI. Picante y energético.', 12300, 20, 7, 'combo-spicy-girgola-umami-productos.webp', 'Picante', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(25, 'Combo Wrap Saludable', 'Wrap de Hongos + Papas Rústicas + Agua Mineral.', 'Wrap de Hongos + Papas Rústicas + Agua Mineral. Liviano y fresco.', 10900, 28, 7, 'combo-wrap-saludable-umami-productos.webp', 'Saludable', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(26, 'Combo Nuggets Fan', 'Nuggets de Hongos + Papas & Salsas + Limonada umami.', 'Nuggets de Hongos + Papas & Salsas + Limonada UMAMI. Divertido y crocante.', 9800, 30, 7, 'combo-nuggets-fan-umami-productos.webp', 'Familiar', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(27, 'Combo Dúo', '2 Hamburguesas a elección + Papas XL con dips + 2 Bebidas.', '2 Hamburguesas a elección + Papas XL + 2 bebidas. Ideal para compartir.', 22500, 15, 7, 'combo-duo-umami-productos.webp', 'Compartir', '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(28, 'Combo Wrap y Sal', 'Wrap de hongos deliciosos, condimentados con sal umami y una cerveza para acompañar. Luego de eso un brownie umami de postre.', 'Wrap de Hongos + Sal UMAMI + Cerveza + Brownie. Completo y equilibrado.', 13500, 18, 7, 'combo-sobres-cerveza-postre-umami-productos.webp', 'Completo', '2025-11-08 05:06:53', '2025-11-08 05:06:53');

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
('fyiB1g1lwuIvQXeRADrM2gIAL9DDIZuDrXgIk1fc', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidlZJd3diUXh1MUl0cTVpR2xhUHZ0RWZ5aXZHd2RadHZSdENScEpwWiI7czo4OiJmZWVkYmFjayI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo1OiJpbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1762568298);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'usuario',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Umami', 'admin@umami.com', NULL, '$2y$12$MAKsD8B71mDK1EorydimYO8RQdvjnvwiFbVK5HGKI0KoVgtZmQ5cW', 'admin', NULL, '2025-11-08 05:06:53', '2025-11-08 05:06:53'),
(2, 'Luciano Neiman', 'luciano.neiman@davinci.edu.ar', NULL, '$2y$12$pkf18ij1QTIyPAAsL/XMBe9aDwLlacm2Rlb8aIeRrMNNXpFDG8hHe', 'usuario', NULL, '2025-11-08 05:06:54', '2025-11-08 05:06:54'),
(3, 'Lucianito Neiman', 'neimanlucho@gmail.com', NULL, '$2y$12$c2sMxxcDyZoVgXjP3s9BVuSVraS/QwBZq3M1ZDObx5RNr/yJAyUze', 'usuario', NULL, '2025-11-08 05:18:17', '2025-11-08 05:18:17');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
