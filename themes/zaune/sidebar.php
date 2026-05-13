<!-- Sidebar Structure -->
<aside class="sidebar">
    <!-- Search Widget -->
    <div class="sidebar-widget search-widget">
        <h3 class="widget-title">Search</h3>
        <form role="search" method="get"  id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
            <input type="search" placeholder="Type and press enter..." aria-label="Search" value="<?php echo get_search_query(); ?>" name="s" id="s">
            <button type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Categories Widget -->
    <div class="sidebar-widget categories-widget">
        <h3 class="widget-title">Categories</h3>
        <ul class="categories-list">
            <li><a href="#">Web Design <span class="count">12</span></a></li>
            <li><a href="#">Development <span class="count">8</span></a></li>
            <li><a href="#">Marketing <span class="count">15</span></a></li>
            <li><a href="#">SEO <span class="count">23</span></a></li>
        </ul>
    </div>

    <!-- Popular Posts Widget -->
    <div class="sidebar-widget popular-posts">
        <h3 class="widget-title">Popular Posts</h3>
        <article class="post-item">
            <a href="#" class="post-thumbnail">
                <img src="http://localhost/wp-content/uploads/2025/02/Gabionenwand_Rom.jpg" alt="Post thumbnail">
            </a>
            <div class="post-content">
                <h4><a href="#">Best practices for modern web development</a></h4>
                <time datetime="2023-08-15">August 15, 2023</time>
            </div>
        </article>
        <!-- Repeat similar post items -->
    </div>



    <!-- Social Links Widget -->
    <div class="sidebar-widget social-widget">
        <h3 class="widget-title">Follow Us</h3>
        <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</aside>

<!-- CSS Styles -->
<style>
:root {
    --sidebar-bg: #ffffff;
    --accent-color: #2c3e50;
    --text-color: #34495e;
    --hover-color: #3498db;
    --border-color: #ecf0f1;
}

.sidebar {
    background: var(--sidebar-bg);
    padding: 2rem;
    box-shadow: 0 0 30px rgba(0,0,0,0.03);
    border-radius: 12px;
    position: sticky;
    top: 100px;
    margin-bottom: 2rem;
}

.widget-title {
    color: var(--accent-color);
    font-size: 1.25rem;
    margin: 0 0 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid var(--border-color);
}

/* Search Widget Styles */
.search-form {
    position: relative;
    margin-bottom: 2rem;
}

.search-form input {
    width: 100%;
    padding: 12px 45px 12px 20px;
    border: 1px solid var(--border-color);
    border-radius: 30px;
    transition: all 0.3s ease;
}

.search-form button {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--accent-color);
    cursor: pointer;
}

/* Categories Widget Styles */
.categories-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.categories-list li {
    margin-bottom: 0.75rem;
}

.categories-list a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: var(--text-color);
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.categories-list a:hover {
    background: #f8f9fa;
    color: var(--hover-color);
    transform: translateX(5px);
}

.count {
    background: var(--border-color);
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 0.85rem;
}

/* Popular Posts Styles */
.post-item {
    display: flex;
    gap: 15px;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.post-thumbnail {
    flex: 0 0 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-thumbnail:hover img {
    transform: scale(1.05);
}

.post-content h4 {
    margin: 0 0 0.5rem;
    font-size: 1rem;
}

.post-content time {
    font-size: 0.85rem;
    color: #7f8c8d;
}

/* Newsletter Widget Styles */
.newsletter-form {
    margin-top: 1.5rem;
}

.newsletter-form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 8px;
}

.subscribe-btn {
    width: 100%;
    padding: 12px;
    background: var(--accent-color);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.subscribe-btn:hover {
    background: var(--hover-color);
}

/* Social Links Styles */
.social-links {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.social-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 50%;
    color: var(--text-color);
    transition: all 0.3s ease;
}

.social-link:hover {
    background: var(--hover-color);
    color: white;
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .sidebar {
        position: static;
        margin-top: 2rem;
    }
}
</style>