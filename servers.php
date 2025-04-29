<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidores de videojuegos - ULORE</title>
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
        
        .page-header {
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://picsum.photos/1920/800');
            background-size: cover;
            background-position: center;
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
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .stars i {
            color: #ffd700;
        }
        
        .filter-item {
            transition: all 0.3s ease;
        }
        
        .filter-item:hover, .filter-item.active {
            background-color: rgba(5, 187, 201, 0.1);
            border-color: var(--primary);
        }
        
        .filter-count {
            background-color: rgba(5, 187, 201, 0.1);
            color: var(--primary);
        }
        
        .notification-bar {
            background-color: var(--accent);
        }
        
        .footer {
            background-color: var(--secondary);
        }
        
        @media (max-width: 768px) {
            .filters-sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                width: 80%;
                height: 100%;
                z-index: 1000;
                background-color: white;
                transition: left 0.3s ease;
                overflow-y: auto;
            }
            
            .filters-sidebar.active {
                left: 0;
            }
            
            .filters-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }
            
            .filters-overlay.active {
                display: block;
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

    <!-- Page Header -->
    <section class="page-header py-16 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Servidores de videojuegos</h1>
            <p class="text-lg max-w-2xl mx-auto">Encuentra servidores de GTA V, Red Dead Redemption 2, Roblox, Minecraft y muchos más</p>
        </div>
    </section>
    
    <!-- Servers List Section -->
    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="lg:flex">
                <!-- Filters Sidebar -->
                <div class="lg:w-1/4 lg:pr-8 mb-8 lg:mb-0">
                    <div class="bg-white rounded-xl p-6 shadow-sm filters-sidebar">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold">Filtros</h2>
                            <div class="flex space-x-4">
                                <button id="reset-filters" class="text-sm text-primary hover:underline">Resetear</button>
                                <button id="close-filters" class="text-2xl lg:hidden">&times;</button>
                            </div>
                        </div>
                        
                        <!-- Search Box -->
                        <div class="mb-6">
                            <form action="" method="get" id="search-form">
                                <div class="relative">
                                    <input type="text" name="search" placeholder="Buscar servidores..." value="<?php echo htmlspecialchars($search ?? ''); ?>"
                                           class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Categories Filter -->
                        <div class="mb-6">
                            <h3 class="font-semibold mb-3 text-gray-700">Categorías</h3>
                            <div class="space-y-2">
                                <?php foreach ($categories as $cat): ?>
                                <a href="?category=<?php echo $cat['slug']; ?><?php echo !empty($sort) ? '&sort=' . $sort : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                                   class="filter-item flex justify-between items-center px-3 py-2 rounded-lg border border-transparent <?php echo ($category === $cat['slug']) ? 'active' : ''; ?>">
                                    <span><?php echo htmlspecialchars($cat['name']); ?></span>
                                    <span class="filter-count text-xs px-2 py-1 rounded-full"><?php echo $cat['server_count']; ?></span>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <!-- Games Filter -->
                        <div class="mb-6">
                            <h3 class="font-semibold mb-3 text-gray-700">Juegos</h3>
                            <div class="space-y-2">
                                <?php 
                                $gamesList = array_filter($tags, function($tag) {
                                    return in_array($tag['slug'], ['gta-v', 'rdr2', 'roblox', 'minecraft']);
                                });
                                foreach ($gamesList as $gameTag): 
                                ?>
                                <a href="?game=<?php echo $gameTag['slug']; ?><?php echo !empty($sort) ? '&sort=' . $sort : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                                   class="filter-item flex justify-between items-center px-3 py-2 rounded-lg border border-transparent <?php echo ($game === $gameTag['slug']) ? 'active' : ''; ?>">
                                    <span><?php echo htmlspecialchars($gameTag['name']); ?></span>
                                    <span class="filter-count text-xs px-2 py-1 rounded-full"><?php echo $gameTag['server_count']; ?></span>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <!-- Tags Filter -->
                        <div>
                            <h3 class="font-semibold mb-3 text-gray-700">Etiquetas</h3>
                            <div class="space-y-2">
                                <?php 
                                $tagsList = array_filter($tags, function($tag) {
                                    return !in_array($tag['slug'], ['gta-v', 'rdr2', 'roblox', 'minecraft']);
                                });
                                foreach ($tagsList as $tagItem): 
                                ?>
                                <a href="?tag=<?php echo $tagItem['slug']; ?><?php echo !empty($sort) ? '&sort=' . $sort : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                                   class="filter-item flex justify-between items-center px-3 py-2 rounded-lg border border-transparent <?php echo ($tag === $tagItem['slug']) ? 'active' : ''; ?>">
                                    <span><?php echo htmlspecialchars($tagItem['name']); ?></span>
                                    <span class="filter-count text-xs px-2 py-1 rounded-full"><?php echo $tagItem['server_count']; ?></span>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Servers List -->
                <div class="lg:w-3/4">
                    <!-- Mobile Filters Button -->
                    <div class="lg:hidden mb-4">
                        <button id="show-filters" class="bg-white rounded-lg px-4 py-2 shadow-sm w-full flex justify-between items-center">
                            <span class="font-medium">Filtros</span>
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                    
                    <!-- Sort and Results Count -->
                    <div class="bg-white rounded-xl p-4 shadow-sm flex flex-wrap justify-between items-center mb-6">
                        <div class="text-light-text">
                            <span class="font-medium text-dark-text"><?php echo $totalCount['total']; ?></span> servidores encontrados
                        </div>
                        
                        <div class="flex items-center">
                            <label class="mr-2 text-light-text">Ordenar por:</label>
                            <select id="sort-select" class="border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option value="newest" <?php echo ($sort === 'newest') ? 'selected' : ''; ?>>Más recientes</option>
                                <option value="oldest" <?php echo ($sort === 'oldest') ? 'selected' : ''; ?>>Más antiguos</option>
                                <option value="name-asc" <?php echo ($sort === 'name-asc') ? 'selected' : ''; ?>>Nombre (A-Z)</option>
                                <option value="name-desc" <?php echo ($sort === 'name-desc') ? 'selected' : ''; ?>>Nombre (Z-A)</option>
                                <option value="rating" <?php echo ($sort === 'rating') ? 'selected' : ''; ?>>Mejor valorados</option>
                                <option value="players" <?php echo ($sort === 'players') ? 'selected' : ''; ?>>Más jugadores</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Servers Grid -->
                    <?php if (!empty($servers)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($servers as $server): 
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
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden server-card relative">
                            <?php if ($server['featured']): ?>
                            <span class="featured-badge">Destacado</span>
                            <?php endif; ?>
                            
                            <div class="p-5">
                                <div class="flex items-start mb-4 gap-4">
                                    <div class="server-logo shrink-0">
                                        <img src="<?php echo !empty($server['logo_image']) ? SITE_URL . '/uploads/server-logos/' . $server['logo_image'] : SITE_URL . '/assets/images/server-placeholder.png'; ?>" 
                                             alt="<?php echo htmlspecialchars($server['name']); ?>">
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold leading-tight mb-1">
                                            <a href="<?php echo SITE_URL; ?>/servidores/<?php echo $server['slug']; ?>/" class="hover:text-primary">
                                                <?php echo htmlspecialchars($server['name']); ?>
                                            </a>
                                        </h3>
                                        <div class="flex items-center mb-1">
                                            <a href="?category=<?php echo $server['category_slug']; ?>" class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded">
                                                <?php echo htmlspecialchars($server['category_name']); ?>
                                            </a>
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
                                
                                <p class="text-light-text text-sm mb-4 line-clamp-2">
                                    <?php 
                                    $description = strip_tags($server['description']);
                                    echo substr($description, 0, 120) . (strlen($description) > 120 ? '...' : ''); 
                                    ?>
                                </p>
                                
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <?php foreach (array_slice($serverTags, 0, 3) as $tag): ?>
                                        <a href="?tag=<?php echo $tag['slug']; ?>" class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded hover:bg-gray-200 transition">
                                            <?php echo htmlspecialchars($tag['name']); ?>
                                        </a>
                                    <?php endforeach; ?>
                                    <?php if (count($serverTags) > 3): ?>
                                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">
                                            +<?php echo count($serverTags) - 3; ?>
                                        </span>
                                    <?php endif; ?>
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
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if ($totalPages > 1): ?>
                    <div class="mt-8 flex justify-center">
                        <div class="inline-flex rounded-md shadow">
                            <?php if ($page > 1): ?>
                            <a href="?page=<?php echo $page - 1; ?><?php echo !empty($category) ? '&category=' . $category : ''; ?><?php echo !empty($game) ? '&game=' . $game : ''; ?><?php echo !empty($tag) ? '&tag=' . $tag : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?><?php echo !empty($sort) ? '&sort=' . $sort : ''; ?>" class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-l-md">
                                <i class="fas fa-chevron-left mr-2"></i> Anterior
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($page < $totalPages): ?>
                            <a href="?page=<?php echo $page + 1; ?><?php echo !empty($category) ? '&category=' . $category : ''; ?><?php echo !empty($game) ? '&game=' . $game : ''; ?><?php echo !empty($tag) ? '&tag=' . $tag : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?><?php echo !empty($sort) ? '&sort=' . $sort : ''; ?>" class="border <?php echo $page > 1 ? 'border-l-0' : ''; ?> border-gray-300 bg-white text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 text-sm font-medium <?php echo $page > 1 ? '' : 'rounded-l-md'; ?> rounded-r-md">
                                Siguiente <i class="fas fa-chevron-right ml-2"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Page Numbers -->
                    <div class="mt-4 flex justify-center">
                        <div class="inline-flex space-x-1">
                            <?php
                            $startPage = max(1, $page - 2);
                            $endPage = min($totalPages, $page + 2);
                            
                            if ($startPage > 1) {
                                echo '<a href="?page=1' . (!empty($category) ? '&category=' . $category : '') . (!empty($game) ? '&game=' . $game : '') . (!empty($tag) ? '&tag=' . $tag : '') . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($sort) ? '&sort=' . $sort : '') . '" class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-md">1</a>';
                                if ($startPage > 2) {
                                    echo '<span class="border border-gray-300 bg-white text-gray-700 relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-md">...</span>';
                                }
                            }
                            
                            for ($i = $startPage; $i <= $endPage; $i++) {
                                $active = ($i === $page) ? 'bg-primary border-primary text-white' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50';
                                echo '<a href="?page=' . $i . (!empty($category) ? '&category=' . $category : '') . (!empty($game) ? '&game=' . $game : '') . (!empty($tag) ? '&tag=' . $tag : '') . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($sort) ? '&sort=' . $sort : '') . '" class="border ' . $active . ' relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-md">' . $i . '</a>';
                            }
                            
                            if ($endPage < $totalPages) {
                                if ($endPage < $totalPages - 1) {
                                    echo '<span class="border border-gray-300 bg-white text-gray-700 relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-md">...</span>';
                                }
                                echo '<a href="?page=' . $totalPages . (!empty($category) ? '&category=' . $category : '') . (!empty($game) ? '&game=' . $game : '') . (!empty($tag) ? '&tag=' . $tag : '') . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($sort) ? '&sort=' . $sort : '') . '" class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-md">' . $totalPages . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php else: ?>
                    <!-- No Results Message -->
                    <div class="bg-white rounded-xl p-8 text-center shadow-sm">
                        <img src="/api/placeholder/150/150" alt="No hay resultados" class="mx-auto mb-4">
                        <h3 class="text-2xl font-bold mb-2">No se encontraron servidores</h3>
                        <p class="text-light-text mb-6">No hay servidores que coincidan con los criterios de búsqueda.</p>
                        <a href="<?php echo SITE_URL; ?>/servidores/" class="btn-primary py-2 px-6 rounded-lg inline-block">Ver todos los servidores</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-secondary text-white mt-10">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">¿Tienes un servidor?</h2>
                <p class="text-lg mb-8">Añade tu servidor a ULORE y llega a miles de jugadores interesados en tu proyecto.</p>
                <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo SITE_URL; ?>/groups/create/" class="btn-primary py-3 px-8 rounded-lg font-semibold">AÑADIR SERVIDOR</a>
                    <a href="<?php echo SITE_URL; ?>/product/server-boost/" class="bg-white text-secondary py-3 px-8 rounded-lg font-semibold">DESTACAR MI SERVIDOR</a>
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
                        <?php
                        // Get site statistics
                        $serverCount = fetchOne("SELECT COUNT(*) AS count FROM servers WHERE status = 'active'")['count'] ?? 0;
                        $userCount = fetchOne("SELECT COUNT(*) AS count FROM users WHERE status = 'active'")['count'] ?? 0;
                        $licenseCount = fetchOne("SELECT COUNT(*) AS count FROM licenses WHERE status = 'active'")['count'] ?? 0;
                        ?>
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
    
    <!-- Mobile Filters Overlay -->
    <div class="filters-overlay" id="filters-overlay"></div>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 right-6 bg-primary text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all z-50">
        <i class="fas fa-arrow-up"></i>
    </button>
    
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
        
        // Mobile Filters Toggle
        const showFiltersBtn = document.getElementById('show-filters');
        const closeFiltersBtn = document.getElementById('close-filters');
        const filtersSidebar = document.querySelector('.filters-sidebar');
        const filtersOverlay = document.getElementById('filters-overlay');
        
        if (showFiltersBtn && filtersSidebar) {
            showFiltersBtn.addEventListener('click', function() {
                filtersSidebar.classList.add('active');
                filtersOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }
        
        if (closeFiltersBtn && filtersSidebar) {
            closeFiltersBtn.addEventListener('click', function() {
                filtersSidebar.classList.remove('active');
                filtersOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        
        if (filtersOverlay) {
            filtersOverlay.addEventListener('click', function() {
                filtersSidebar.classList.remove('active');
                filtersOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        
        // Sort select change handler
        const sortSelect = document.getElementById('sort-select');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('sort', this.value);
                window.location.href = currentUrl.toString();
            });
        }
        
        // Reset filters button
        const resetButton = document.getElementById('reset-filters');
        if (resetButton) {
            resetButton.addEventListener('click', function() {
                window.location.href = '<?php echo SITE_URL; ?>/servidores/';
            });
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
    });
    </script>
</body>
</html>    