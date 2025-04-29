<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ULORE - Conecta con servidores y jugadores de videojuegos</title>
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
        
        .btn-accent {
            background-color: var(--accent);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-accent:hover {
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
        
        .featured-badge {
            background-color: var(--accent);
            color: white;
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .navbar {
            background-color: var(--secondary);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .hero-section {
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://picsum.photos/1920/1080');
            background-size: cover;
            background-position: center;
            height: 500px;
        }
        
        .server-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .server-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .server-logo img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .server-images img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        
        .server-images img:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .stars i {
            color: #ffd700;
        }
        
        .notification-bar {
            background-color: var(--accent);
        }
        
        .footer {
            background-color: var(--secondary);
        }
        
        @media (max-width: 768px) {
            .hero-section {
                height: 400px;
            }
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
                <a href="#" class="flex items-center">
                    <img src="/api/placeholder/120/40" alt="ULORE" class="h-8">
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-primary transition">Anuncios/Proyectos</a>
                    <a href="#" class="hover:text-primary transition">Servidores</a>
                    <a href="#" class="hover:text-primary transition">Jugadores</a>
                    <a href="#" class="hover:text-primary transition">Blog</a>
                    <a href="#" class="hover:text-primary transition">Destacar mi servidor</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="#" class="btn-primary py-2 px-4 rounded-lg text-sm hidden md:block">Iniciar Sesión</a>
                    <!-- Mobile menu button -->
                    <button class="text-white md:hidden" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="pt-2 pb-4 space-y-3">
                    <a href="#" class="block py-2 hover:text-primary transition">Anuncios/Proyectos</a>
                    <a href="#" class="block py-2 hover:text-primary transition">Servidores</a>
                    <a href="#" class="block py-2 hover:text-primary transition">Jugadores</a>
                    <a href="#" class="block py-2 hover:text-primary transition">Blog</a>
                    <a href="#" class="block py-2 hover:text-primary transition">Destacar mi servidor</a>
                    <a href="#" class="block py-2 btn-primary px-4 rounded-lg text-center mt-4">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section flex items-center justify-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Punto de encuentro</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-8">Para servidores, jugadores, proyectos, roleplay, survival, zombies, freeroam, GTA V, RDR2, Roblox, Minecraft...</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#" class="btn-primary py-3 px-8 rounded-lg font-semibold">Servidores</a>
                <a href="#" class="btn-primary py-3 px-8 rounded-lg font-semibold">Anuncios</a>
                <a href="#" class="btn-primary py-3 px-8 rounded-lg font-semibold">Jugadores</a>
            </div>
        </div>
    </section>

    <!-- Featured Servers Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Servidores Destacados</h2>
                <p class="text-light-text max-w-2xl mx-auto">Descubre los mejores servidores de juegos promocionados en nuestra plataforma</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Get featured servers
                $featuredServers = fetchAll("
                    SELECT s.id, s.name, s.description, s.logo_image, s.slug, s.featured, s.avg_players, s.max_players,
                           c.name AS category_name, c.slug AS category_slug,
                           u.username AS owner_username, u.avatar AS owner_avatar
                    FROM servers s
                    LEFT JOIN categories c ON s.category_id = c.id
                    LEFT JOIN users u ON s.owner_id = u.id
                    WHERE s.featured = 1 AND s.status = 'active'
                    ORDER BY s.featured_order ASC
                    LIMIT 6
                ");

                if (!empty($featuredServers)):
                    foreach ($featuredServers as $server):
                        // Get server rating
                        $rating = fetchOne("
                            SELECT ROUND(AVG(rating), 1) AS avg_rating,
                                   COUNT(*) AS review_count
                            FROM server_reviews
                            WHERE server_id = ? AND status = 'approved'
                        ", [$server['id']]);
                        
                        $avgRating = $rating['avg_rating'] ?? 0;
                        $reviewCount = $rating['review_count'] ?? 0;

                        // Get server tags
                        $serverTags = fetchAll("
                            SELECT t.name, t.slug
                            FROM server_tags st
                            JOIN tags t ON st.tag_id = t.id
                            WHERE st.server_id = ?
                            LIMIT 5
                        ", [$server['id']]);
                ?>
                <!-- Server Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md server-card relative">
                    <span class="featured-badge">Destacado</span>
                    <div class="p-6">
                        <div class="flex items-start mb-4">
                            <div class="server-logo mr-4">
                                <img src="<?php echo !empty($server['logo_image']) ? SITE_URL . '/uploads/server-logos/' . $server['logo_image'] : SITE_URL . '/assets/images/server-placeholder.png'; ?>" 
                                     alt="<?php echo htmlspecialchars($server['name']); ?>">
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-1"><?php echo htmlspecialchars($server['name']); ?></h3>
                                <div class="flex items-center mb-1">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded"><?php echo htmlspecialchars($server['category_name']); ?></span>
                                </div>
                                <div class="stars flex items-center">
                                    <?php
                                    // Display stars based on rating
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
                                    <span class="text-sm text-light-text ml-2"><?php echo $avgRating; ?> (<?php echo $reviewCount; ?>)</span>
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-light-text text-sm mb-4">
                            <?php 
                            $description = strip_tags($server['description']);
                            echo substr($description, 0, 150) . (strlen($description) > 150 ? '...' : ''); 
                            ?>
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach ($serverTags as $tag): ?>
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded"><?php echo htmlspecialchars($tag['name']); ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center">
                                <img src="<?php echo !empty($server['owner_avatar']) ? SITE_URL . '/uploads/avatars/' . $server['owner_avatar'] : SITE_URL . '/assets/images/default-avatar.png'; ?>" 
                                     alt="<?php echo htmlspecialchars($server['owner_username']); ?>" class="avatar mr-2">
                                <span class="text-sm"><?php echo htmlspecialchars($server['owner_username']); ?></span>
                            </div>
                            <div class="flex items-center text-sm text-light-text">
                                <i class="fas fa-users mr-1"></i>
                                <span><?php echo $server['avg_players']; ?>/<?php echo $server['max_players']; ?></span>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo SITE_URL; ?>/servidores/<?php echo $server['slug']; ?>/" class="block bg-primary text-white text-center py-3 font-semibold hover:bg-primary-dark transition">Ver servidor</a>
                </div>
                <?php 
                    endforeach;
                else:
                ?>
                <div class="col-span-3 bg-white rounded-xl p-8 text-center">
                    <p class="text-light-text mb-4">No hay servidores destacados en este momento.</p>
                    <a href="<?php echo SITE_URL; ?>/product/server-boost/" class="btn-primary py-2 px-6 rounded-lg inline-block">Destaca tu servidor</a>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($featuredServers)): ?>
            <div class="text-center mt-10">
                <a href="<?php echo SITE_URL; ?>/servidores/" class="btn-primary py-3 px-8 rounded-lg font-semibold inline-block">Ver todos los servidores</a>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Latest Server Images Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Últimas Imágenes de Servidores</h2>
                <p class="text-light-text max-w-2xl mx-auto">Explora capturas de los mejores momentos en nuestros servidores</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <?php
                // Get latest server images
                $serverImages = fetchAll("
                    SELECT i.id, i.filename, i.title, s.name AS server_name, s.slug AS server_slug
                    FROM server_images i
                    JOIN servers s ON i.server_id = s.id
                    WHERE i.status = 'active'
                    ORDER BY i.created_at DESC
                    LIMIT 10
                ");

                if (!empty($serverImages)):
                    foreach ($serverImages as $image):
                ?>
                <div class="server-images">
                    <img src="<?php echo SITE_URL; ?>/uploads/server-images/<?php echo htmlspecialchars($image['filename']); ?>"
                         alt="<?php echo htmlspecialchars($image['title'] ?: $image['server_name']); ?>"
                         onclick="openImagePopup('<?php echo SITE_URL; ?>/uploads/server-images/<?php echo htmlspecialchars($image['filename']); ?>')">
                    <div class="mt-2">
                        <a href="<?php echo SITE_URL; ?>/servidores/<?php echo htmlspecialchars($image['server_slug']); ?>/" class="text-sm text-primary hover:underline">
                            <?php echo htmlspecialchars($image['server_name']); ?>
                        </a>
                    </div>
                </div>
                <?php
                    endforeach;
                else:
                ?>
                <div class="col-span-5 bg-white rounded-xl p-8 text-center">
                    <p class="text-light-text">No hay imágenes de servidores disponibles en este momento.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <!-- Image Popup -->
    <div id="image-popup" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
        <div class="relative max-w-4xl mx-auto">
            <button id="close-popup" class="absolute top-4 right-4 text-white text-2xl">&times;</button>
            <img id="popup-image" src="" alt="Server Image" class="max-w-full max-h-screen p-4">
        </div>
    </div>
    
    <!-- Latest Posts Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Últimos Anuncios y Proyectos</h2>
                <p class="text-light-text max-w-2xl mx-auto">¿Buscas gente para tu proyecto? Encuentra programadores, staffs, playmakers y jugadores para todo tipo de iniciativas.</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                <?php
                // Get latest posts/announcements
                $posts = fetchAll("
                    SELECT p.id, p.title, p.content, p.slug, p.created_at, 
                           c.name AS category_name, c.slug AS category_slug,
                           u.id AS user_id, u.username, u.avatar
                    FROM posts p
                    JOIN categories c ON p.category_id = c.id
                    JOIN users u ON p.user_id = u.id
                    WHERE p.status = 'active'
                    ORDER BY p.created_at DESC
                    LIMIT 4
                ");

                if (!empty($posts)):
                    foreach ($posts as $post):
                        // Get post tags
                        $tags = fetchAll("
                            SELECT t.name, t.slug
                            FROM post_tags pt
                            JOIN tags t ON pt.tag_id = t.id
                            WHERE pt.post_id = ?
                            LIMIT 3
                        ", [$post['id']]);
                ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="text-sm text-light-text">
                                    <i class="far fa-clock mr-1"></i> 
                                    <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                                </span>
                                <h3 class="text-xl font-bold mt-2">
                                    <a href="<?php echo SITE_URL; ?>/buscalore/<?php echo $post['slug']; ?>/" class="hover:text-primary transition">
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </a>
                                </h3>
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mt-2">
                                    <?php echo htmlspecialchars($post['category_name']); ?>
                                </span>
                            </div>
                            
                            <div class="flex flex-col items-end">
                                <div class="flex items-center">
                                    <img src="<?php echo !empty($post['avatar']) ? SITE_URL . '/uploads/avatars/' . $post['avatar'] : SITE_URL . '/assets/images/default-avatar.png'; ?>" 
                                         alt="<?php echo htmlspecialchars($post['username']); ?>" class="avatar mr-2">
                                    <span class="text-sm font-medium"><?php echo htmlspecialchars($post['username']); ?></span>
                                </div>
                                <button onclick="openLoginPopup()" class="mt-3 bg-primary text-white text-sm py-1 px-4 rounded hover:bg-primary-dark transition">
                                    Contactar
                                </button>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <p class="text-light-text">
                                <?php 
                                $summary = strip_tags($post['content']);
                                echo substr($summary, 0, 180) . (strlen($summary) > 180 ? '...' : '');
                                ?>
                                <a href="<?php echo SITE_URL; ?>/buscalore/<?php echo $post['slug']; ?>/" class="text-primary hover:underline ml-1">Ver más</a>
                            </p>
                        </div>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            <?php if (!empty($tags)): ?>
                                <?php foreach ($tags as $tag): ?>
                                    <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                        <i class="fas fa-check text-primary mr-1"></i>
                                        <?php echo htmlspecialchars($tag['name']); ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    <i class="fas fa-check text-primary mr-1"></i>GTA V
                                </span>
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    <i class="fas fa-check text-primary mr-1"></i>PC
                                </span>
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    <i class="fas fa-check text-primary mr-1"></i>Roleplay
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach;
                else:
                ?>
                <div class="col-span-2 bg-white rounded-xl p-8 text-center">
                    <p class="text-light-text">No hay anuncios o proyectos disponibles en este momento.</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center">
                <a href="<?php echo SITE_URL; ?>/todos-los-anuncios/" class="btn-primary py-3 px-8 rounded-lg font-semibold inline-block">Ver todos los anuncios</a>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-secondary text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">¿Tienes un servidor?</h2>
                <p class="text-lg mb-8">Añade tu servidor a ULORE y llega a miles de jugadores interesados en tu proyecto.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?php echo SITE_URL; ?>/groups/create/" class="btn-primary py-3 px-8 rounded-lg font-semibold">AÑADIR SERVIDOR</a>
                    <a href="<?php echo SITE_URL; ?>/anadir-un-anuncio/" class="bg-white text-secondary py-3 px-8 rounded-lg font-semibold">PUBLICAR ANUNCIO</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Blog Posts Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Últimas Entradas del Blog</h2>
                <p class="text-light-text max-w-2xl mx-auto">Noticias, tutoriales y artículos relacionados con la comunidad de gaming</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                // Get latest blog posts
                $blogPosts = fetchAll("
                    SELECT b.id, b.title, b.content, b.slug, b.featured_image, b.created_at,
                           c.name AS category_name, c.slug AS category_slug,
                           u.username AS author_name
                    FROM blog_posts b
                    JOIN categories c ON b.category_id = c.id
                    JOIN users u ON b.author_id = u.id
                    WHERE b.status = 'published'
                    ORDER BY b.created_at DESC
                    LIMIT 3
                ");

                if (!empty($blogPosts)):
                    foreach ($blogPosts as $post):
                        // Get comment count
                        $commentCount = fetchOne("
                            SELECT COUNT(*) AS count 
                            FROM blog_comments 
                            WHERE post_id = ? AND status = 'approved'
                        ", [$post['id']]);
                ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="<?php echo !empty($post['featured_image']) ? SITE_URL . '/uploads/blog/' . $post['featured_image'] : SITE_URL . '/assets/images/blog-placeholder.jpg'; ?>"
                             alt="<?php echo htmlspecialchars($post['title']); ?>"
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-light-text mb-3">
                            <span class="mr-4">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                            </span>
                            <a href="<?php echo SITE_URL; ?>/category/<?php echo $post['category_slug']; ?>/" class="text-primary hover:underline">
                                <?php echo htmlspecialchars($post['category_name']); ?>
                            </a>
                        </div>
                        
                        <h3 class="text-xl font-bold mb-3">
                            <a href="<?php echo SITE_URL; ?>/<?php echo $post['slug']; ?>/" class="hover:text-primary transition">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h3>
                        
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                            <div class="text-sm">
                                Por: <span class="font-medium"><?php echo htmlspecialchars($post['author_name']); ?></span>
                            </div>
                            <div class="flex items-center text-light-text text-sm">
                                <i class="far fa-comment mr-1"></i>
                                <span><?php echo isset($commentCount['count']) ? $commentCount['count'] : 0; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach;
                else:
                ?>
                <div class="col-span-3 bg-white rounded-xl p-8 text-center">
                    <p class="text-light-text">No hay entradas de blog disponibles en este momento.</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-10">
                <a href="<?php echo SITE_URL; ?>/blog/" class="btn-primary py-3 px-8 rounded-lg font-semibold inline-block">Ver el blog</a>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                // Get site statistics
                $serverCount = fetchOne("SELECT COUNT(*) AS count FROM servers WHERE status = 'active'")['count'] ?? 0;
                $userCount = fetchOne("SELECT COUNT(*) AS count FROM users WHERE status = 'active'")['count'] ?? 0;
                $licenseCount = fetchOne("SELECT COUNT(*) AS count FROM licenses WHERE status = 'active'")['count'] ?? 0;
                ?>
                
                <div class="text-center p-6">
                    <span class="text-5xl font-bold text-primary block mb-2"><?php echo number_format($serverCount); ?></span>
                    <span class="text-xl text-gray-700">Servidores registrados</span>
                </div>
                
                <div class="text-center p-6">
                    <span class="text-5xl font-bold text-primary block mb-2"><?php echo number_format($userCount); ?></span>
                    <span class="text-xl text-gray-700">Usuarios activos</span>
                </div>
                
                <div class="text-center p-6">
                    <span class="text-5xl font-bold text-primary block mb-2"><?php echo number_format($licenseCount); ?></span>
                    <span class="text-xl text-gray-700">Licencias emitidas</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer text-white pt-16 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                <!-- Column 1: Logo and Description -->
                <div>
                    <img src="/api/placeholder/120/40" alt="ULORE" class="h-8 mb-6">
                    <p class="text-gray-300 mb-6">Punto de encuentro entre jugadores y servidores de videojuegos. Roleplay, PVP, freeroam, GTA V, Roblox, RDR2, Minecraft y más.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-discord"></i></a>
                        <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-300 hover:text-primary transition"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <!-- Column 2: Blog Posts -->
                <div>
                    <h3 class="text-lg font-bold mb-6 relative inline-block">
                        Últimas entradas
                        <span class="absolute bottom-0 left-0 w-1/3 h-0.5 bg-primary"></span>
                    </h3>
                    
                    <ul class="space-y-4">
                        <?php
                        // Get recent blog posts
                        $recentPosts = fetchAll("SELECT title, slug FROM blog_posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 3");
                        
                        if (!empty($recentPosts)):
                            foreach ($recentPosts as $post):
                        ?>
                        <li>
                            <a href="<?php echo SITE_URL; ?>/<?php echo $post['slug']; ?>/" class="text-gray-300 hover:text-primary transition">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </li>
                        <?php
                            endforeach;
                        else:
                        ?>
                        <li>
                            <span class="text-gray-300">No hay entradas recientes</span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <!-- Column 3: Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-6 relative inline-block">
                        Enlaces rápidos
                        <span class="absolute bottom-0 left-0 w-1/3 h-0.5 bg-primary"></span>
                    </h3>
                    
                    <ul class="space-y-3">
                        <li><a href="<?php echo SITE_URL; ?>/servidores/" class="text-gray-300 hover:text-primary transition">Servidores</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/todos-los-anuncios/" class="text-gray-300 hover:text-primary transition">Anuncios</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/jugadores/" class="text-gray-300 hover:text-primary transition">Jugadores</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/licencia-de-roleplay/" class="text-gray-300 hover:text-primary transition">Licencia de Roleplay</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/product/server-boost/" class="text-gray-300 hover:text-primary transition">Destacar servidor</a></li>
                    </ul>
                </div>
                
                <!-- Column 4: Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-6 relative inline-block">
                        Contacto
                        <span class="absolute bottom-0 left-0 w-1/3 h-0.5 bg-primary"></span>
                    </h3>
                    
                    <p class="text-gray-300 mb-4">¿Errores o sugerencias? Ayúdanos a mejorar ULORE</p>
                    
                    <a href="<?php echo SITE_URL; ?>/reporte-de-bug-sugerencia/" class="bg-primary text-white px-4 py-2 rounded inline-block hover:bg-primary-dark transition mb-6">Contáctanos</a>
                    
                    <div class="space-y-2 text-gray-300">
                        <p><strong>Servidores:</strong> <?php echo number_format($serverCount); ?></p>
                        <p><strong>Usuarios:</strong> <?php echo number_format($userCount); ?></p>
                        <p><strong>Licenciados:</strong> <?php echo number_format($licenseCount); ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Legal Links -->
            <div class="border-t border-gray-700 pt-6 mt-6">
                <div class="flex flex-wrap justify-between">
                    <div class="mb-4 md:mb-0">
                        <a href="<?php echo SITE_URL; ?>/aviso-legal/" class="text-gray-300 hover:text-primary transition mr-4">Aviso legal</a>
                        <a href="<?php echo SITE_URL; ?>/politica-de-cookies/" class="text-gray-300 hover:text-primary transition mr-4">Política de Cookies</a>
                        <a href="<?php echo SITE_URL; ?>/politica-de-privacidad-2/" class="text-gray-300 hover:text-primary transition">Política de privacidad</a>
                    </div>
                    <div class="text-gray-300">
                        &copy; <?php echo date('Y'); ?> ULORE Technology. Todos los derechos reservados.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 right-6 bg-primary text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all z-50">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- Login Popup -->
    <div id="login-popup" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-xl max-w-md w-full p-8 relative">
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700" onclick="closeLoginPopup()">&times;</button>
            <h3 class="text-2xl font-bold mb-4 text-center">Inicia sesión o regístrate</h3>
            <p class="text-light-text mb-6 text-center">Para ponerte en contacto con el autor del anuncio, por favor inicia sesión o regístrate.</p>
            <a href="<?php echo SITE_URL; ?>/acceso/" class="btn-primary w-full py-3 text-center rounded-lg block mb-4">Iniciar Sesión</a>
            <a href="<?php echo SITE_URL; ?>/register/" class="bg-gray-800 text-white w-full py-3 text-center rounded-lg block">Registrarse</a>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Notification bar close
        const closeNotification = document.getElementById('close-notification');
        const notificationBar = document.querySelector('.notification-bar');
        
        if (closeNotification && notificationBar) {
            closeNotification.addEventListener('click', function() {
                notificationBar.style.display = 'none';
                
                // Store in localStorage that notification has been closed
                localStorage.setItem('notificationClosed', 'true');
            });
            
            // Check if notification has been closed before
            if (localStorage.getItem('notificationClosed')) {
                notificationBar.style.display = 'none';
            }
        }
        
        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        
        if (backToTopButton) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
        
        // Image popup
        window.openImagePopup = function(imageSrc) {
            const popup = document.getElementById('image-popup');
            const popupImage = document.getElementById('popup-image');
            
            if (popup && popupImage) {
                popupImage.src = imageSrc;
                popup.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        };
        
        const closePopup = document.getElementById('close-popup');
        const imagePopup = document.getElementById('image-popup');
        
        if (closePopup && imagePopup) {
            closePopup.addEventListener('click', function() {
                imagePopup.classList.add('hidden');
                document.body.style.overflow = '';
            });
            
            imagePopup.addEventListener('click', function(e) {
                if (e.target === imagePopup) {
                    imagePopup.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        }
        
        // Login popup
        window.openLoginPopup = function() {
            const loginPopup = document.getElementById('login-popup');
            
            if (loginPopup) {
                loginPopup.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        };
        
        window.closeLoginPopup = function() {
            const loginPopup = document.getElementById('login-popup');
            
            if (loginPopup) {
                loginPopup.classList.add('hidden');
                document.body.style.overflow = '';
            }
        };
        
        const loginPopup = document.getElementById('login-popup');
        
        if (loginPopup) {
            loginPopup.addEventListener('click', function(e) {
                if (e.target === loginPopup) {
                    closeLoginPopup();
                }
            });
        }
    });
    </script>
</body>
</html>