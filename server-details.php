<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($server['name']); ?> - Servidor de <?php echo htmlspecialchars($server['category_name']); ?> | ULORE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #05bbc9;
            --primary-dark: #049da9;
            --secondary: #121a2c;
            --accent: #ff7e33;
            --light-bg: #f5f8fa;
            --dark-text: #2d3748;
            --light-text: #718096;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-text);
            background-color: var(--light-bg);
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: var(--secondary);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            opacity: 0.9;
        }
        
        .btn-discord {
            background-color: #5865F2;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-discord:hover {
            opacity: 0.9;
        }
        
        .text-primary {
            color: var(--primary);
        }
        
        .bg-primary {
            background-color: var(--primary);
        }
        
        .border-primary {
            border-color: var(--primary);
        }
        
        .bg-secondary {
            background-color: var(--secondary);
        }
        
        .server-header {
            position: relative;
            background-size: cover;
            background-position: center;
        }
        
        .server-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        
        .server-header-content {
            position: relative;
            z-index: 2;
        }
        
        .server-logo img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 1rem;
            border: 4px solid white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .stars i {
            color: #ffd700;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .tab-content > .tab-pane {
            display: none;
        }
        
        .tab-content > .active {
            display: block;
        }
        
        .tab-links {
            border-bottom: 1px solid #e2e8f0;
        }
        
        .tab-links li a {
            position: relative;
        }
        
        .tab-links li a.active {
            color: var(--primary);
        }
        
        .tab-links li a.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -1px;
            width: 100%;
            height: 2px;
            background-color: var(--primary);
        }
        
        .server-description img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }
        
        .server-description iframe {
            max-width: 100%;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }
        
        .server-description h1, 
        .server-description h2, 
        .server-description h3, 
        .server-description h4, 
        .server-description h5, 
        .server-description h6 {
            margin: 1.5rem 0 1rem;
            color: var(--dark-text);
        }
        
        .server-description p {
            margin-bottom: 1rem;
        }
        
        .server-description ul, 
        .server-description ol {
            margin-bottom: 1rem;
            margin-left: 1.5rem;
        }
        
        .server-description ul li {
            list-style-type: disc;
        }
        
        .server-description ol li {
            list-style-type: decimal;
        }
        
        .server-images .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .server-images .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            aspect-ratio: 16/9;
        }
        
        .server-images .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .server-images .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        .server-videos .video-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            aspect-ratio: 16/9;
            margin-bottom: 1rem;
        }
        
        .server-videos .video-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .server-videos .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            transition: background-color 0.3s ease;
        }
        
        .server-videos .video-item:hover .play-button {
            background-color: var(--primary);
        }
        
        .progress {
            height: 8px;
            background-color: #e2e8f0;
            border-radius: 99px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background-color: var(--primary);
            border-radius: 99px;
        }
        
        .sidebar-widget {
            position: sticky;
            top: 100px;
        }
        
        .notification-bar {
            background-color: var(--accent);
        }
        
        .footer {
            background-color: var(--secondary);
        }
        
        /* Media popup */
        .media-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
        }
        
        .media-popup.active {
            display: flex;
        }
        
        .popup-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }
        
        .popup-close {
            position: absolute;
            top: -30px;
            right: -30px;
            color: white;
            font-size: 30px;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1001;
        }
        
        .media-container {
            position: relative;
        }
        
        .popup-image {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 5px;
        }
        
        .popup-video {
            width: 80vw;
            height: 45vw;
            max-width: 1280px;
            max-height: 720px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Notification Bar -->
    <div class="notification-bar text-white text-center py-2 relative">
        <div class="container mx-auto px-4">
            <p class="text-sm">¡NUEVA LICENCIA DE ROLEPLAY! Consigue tu licencia de buen roleplayer certificada por Ulore. <a href="#" class="font-bold underline">VER MÁS</a></p>
            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-lg" id="close-notification">&times;</button>
        </div>
    </div>

    <!-- Header -->
    <header class="navbar text-white sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="<?php echo SITE_URL; ?>/" class="flex items-center">
                    <img src="/api/placeholder/120/40" alt="ULORE" class="h-8">
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-6">
                    <a href="<?php echo SITE_URL; ?>/todos-los-anuncios/" class="hover:text-primary transition">Anuncios/Proyectos</a>
                    <a href="<?php echo SITE_URL; ?>/servidores/" class="text-primary transition">Servidores</a>
                    <a href="<?php echo SITE_URL; ?>/jugadores/" class="hover:text-primary transition">Jugadores</a>
                    <a href="<?php echo SITE_URL; ?>/blog/" class="hover:text-primary transition">Blog</a>
                    <a href="<?php echo SITE_URL; ?>/product/server-boost/" class="hover:text-primary transition">Destacar mi servidor</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="<?php echo SITE_URL; ?>/acceder/" class="btn-primary py-2 px-4 rounded-lg text-sm hidden md:block">Iniciar Sesión</a>
                    <!-- Mobile menu button -->
                    <button class="text-white md:hidden" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="pt-2 pb-4 space-y-3">
                    <a href="<?php echo SITE_URL; ?>/todos-los-anuncios/" class="block py-2 hover:text-primary transition">Anuncios/Proyectos</a>
                    <a href="<?php echo SITE_URL; ?>/servidores/" class="block py-2 text-primary transition">Servidores</a>
                    <a href="<?php echo SITE_URL; ?>/jugadores/" class="block py-2 hover:text-primary transition">Jugadores</a>
                    <a href="<?php echo SITE_URL; ?>/blog/" class="block py-2 hover:text-primary transition">Blog</a>
                    <a href="<?php echo SITE_URL; ?>/product/server-boost/" class="block py-2 hover:text-primary transition">Destacar mi servidor</a>
                    <a href="<?php echo SITE_URL; ?>/acceder/" class="block py-2 btn-primary px-4 rounded-lg text-center mt-4">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Server Header -->
    <div class="server-header py-10 text-white" style="background-image: url('<?php echo !empty($server['cover_image']) ? SITE_URL . '/uploads/server-covers/' . $server['cover_image'] : '/api/placeholder/1920/300'; ?>');">
        <div class="container mx-auto px-4">
            <div class="server-header-content">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                    <div class="server-logo">
                        <img src="<?php echo !empty($server['logo_image']) ? SITE_URL . '/uploads/server-logos/' . $server['logo_image'] : SITE_URL . '/assets/images/server-placeholder.png'; ?>" 
                             alt="<?php echo htmlspecialchars($server['name']); ?>">
                    </div>
                    
                    <div class="md:flex-1 text-center md:text-left">
                        <div class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded inline-block mb-2">
                            <a href="<?php echo SITE_URL; ?>/servidores/?category=<?php echo $server['category_slug']; ?>">
                                <?php echo htmlspecialchars($server['category_name']); ?>
                            </a>
                        </div>
                        
                        <h1 class="text-3xl md:text-4xl font-bold mb-2"><?php echo htmlspecialchars($server['name']); ?></h1>
                        
                        <div class="flex flex-wrap gap-4 justify-center md:justify-start mb-4">
                            <div class="stars flex items-center">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $avgRating) {
                                        echo '<i class="fas fa-star"></i>';
                                    } elseif ($i - 0.5 <= $avgRating) {
                                        echo '<i class="fas fa-star-half-alt"></i>';
                                    } else {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                }
                                ?>
                                <span class="ml-2"><?php echo $avgRating; ?> (<?php echo $reviewCount; ?> reseñas)</span>
                            </div>
                            
                            <div class="text-white">
                                <i class="fas fa-users mr-1"></i>
                                <span><?php echo $server['avg_players']; ?>/<?php echo $server['max_players']; ?> jugadores</span>
                            </div>
                            
                            <div class="text-white">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>Desde <?php echo date('d/m/Y', strtotime($server['created_at'])); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col md:flex-row gap-3 sm:justify-center md:justify-end">
                        <?php if (!empty($server['discord_link'])): ?>
                            <a href="<?php echo htmlspecialchars($server['discord_link']); ?>" class="btn-discord px-4 py-2 rounded-lg flex items-center justify-center" target="_blank">
                                <i class="fab fa-discord mr-2"></i> Unirse al Discord
                            </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($server['server_ip'])): ?>
                            <button id="copy-ip" data-ip="<?php echo htmlspecialchars($server['server_ip']); ?>" class="bg-white text-dark-text px-4 py-2 rounded-lg flex items-center justify-center hover:bg-gray-100 transition">
                                <i class="fas fa-copy mr-2"></i> Copiar IP
                            </button>
                        <?php endif; ?>
                        
                        <button onclick="openLoginPopup()" class="btn-primary px-4 py-2 rounded-lg flex items-center justify-center">
                            <i class="far fa-envelope mr-2"></i> Contactar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Server Content -->
    <div class="py-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col-reverse lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <!-- Server Tabs -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="tab-links flex border-b">
                            <ul class="flex">
                                <li class="mr-6">
                                    <a href="#description" data-tab="description" class="block py-4 px-2 active">Descripción</a>
                                </li>
                                <li class="mr-6">
                                    <a href="#media" data-tab="media" class="block py-4 px-2">Imágenes y Videos</a>
                                </li>
                                <li>
                                    <a href="#reviews" data-tab="reviews" class="block py-4 px-2">Reseñas</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="tab-content p-6">
                            <!-- Description Tab -->
                            <div id="description" class="tab-pane active">
                                <div class="server-description prose prose-lg max-w-none">
                                    <?php echo $server['description']; ?>