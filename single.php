<?php
/**
 * 单篇文章模板 - 优化版
 */
get_header(); ?>

<style>
/* 全局优化 */
body {
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.7;
    font-family: 'Segoe UI', 'PingFang SC', 'Microsoft YaHei', sans-serif;
}

.feng-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
    display: flex;
    gap: 30px;
}

/* 文章内容区优化 */
.feng-single-post {
    flex: 1;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    padding: 40px;
    position: relative;
    overflow: hidden;
}

/* 文章头部优化 */
.feng-post-header {
    text-align: center;
    margin-bottom: 35px;
    position: relative;
    padding-bottom: 25px;
    border-bottom: 1px solid #eaeaea;
}

.feng-post-title {
    font-size: 2.2rem;
    margin: 0 0 15px;
    color: #2c3e50;
    line-height: 1.3;
}

.feng-post-meta {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    color: #7f8c8d;
    font-size: 0.9rem;
}

.feng-post-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* 特色图片优化 */
.feng-post-thumbnail {
    margin-bottom: 30px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.feng-post-thumbnail img {
    display: block;
    width: 100%;
    height: auto;
    transition: transform 0.5s ease;
}

.feng-post-thumbnail:hover img {
    transform: scale(1.03);
}

/* 文章内容优化 */
.feng-post-content {
    font-size: 1.08rem;
    color: #444;
    line-height: 1.8;
}

.feng-post-content p {
    margin-bottom: 1.8em;
}

.feng-post-content h2 {
    font-size: 1.7rem;
    margin: 2em 0 1em;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0f0f0;
    color: #2c3e50;
}

.feng-post-content h3 {
    font-size: 1.4rem;
    margin: 1.8em 0 0.8em;
    color: #3498db;
}

.feng-post-content blockquote {
    border-left: 4px solid #3498db;
    background: #f8fafc;
    padding: 20px 25px;
    margin: 25px 0;
    border-radius: 0 8px 8px 0;
    font-style: italic;
    color: #5a6268;
}

.feng-post-content pre {
    background: #2d2d2d;
    color: #f8f8f2;
    padding: 20px;
    border-radius: 8px;
    overflow-x: auto;
    margin: 25px 0;
    font-size: 0.95rem;
    line-height: 1.5;
}

.feng-post-content code {
    background: #f0f3f9;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.95em;
}

.feng-post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 20px 0;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.feng-post-content a {
    color: #3498db;
    text-decoration: none;
    border-bottom: 1px dashed rgba(52, 152, 219, 0.4);
    transition: all 0.3s ease;
}

.feng-post-content a:hover {
    color: #2980b9;
    border-bottom: 1px solid #2980b9;
}

/* 文章标签优化 */
.feng-post-tags {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin: 40px 0 20px;
    padding: 15px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.feng-post-tags i {
    color: #7f8c8d;
}

.feng-post-tags a {
    display: inline-block;
    background: #e1f0fa;
    color: #3498db;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid #d1e5f9;
}

.feng-post-tags a:hover {
    background: #d1e5f9;
    transform: translateY(-2px);
    box-shadow: 0 3px 8px rgba(52, 152, 219, 0.15);
}

/* 文章底部优化 */
.feng-post-footer {
    margin-top: 40px;
}

.feng-post-navigation {
    display: flex;
    justify-content: space-between;
    border-top: 1px solid #eee;
    padding-top: 30px;
}

.feng-prev-post, .feng-next-post {
    flex: 1;
}

.feng-prev-post a, .feng-next-post a {
    display: block;
    padding: 15px;
    border-radius: 8px;
    background: #f8fafd;
    transition: all 0.3s ease;
    text-decoration: none;
    color: #444;
    border: 1px solid #eee;
}

.feng-prev-post a:hover, .feng-next-post a:hover {
    background: #eef5fd;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.feng-prev-post {
    padding-right: 10px;
}

.feng-next-post {
    padding-left: 10px;
    text-align: right;
}

.feng-prev-post i, .feng-next-post i {
    transition: transform 0.3s ease;
}

.feng-prev-post a:hover i {
    transform: translateX(-5px);
}

.feng-next-post a:hover i {
    transform: translateX(5px);
}

/* 侧边工具栏 */
.feng-side-toolbar {
    position: fixed;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 15px;
    z-index: 999;
}

.feng-tool-item {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    color: #3498db;
    font-size: 1.2rem;
}

.feng-tool-item:hover {
    background: #3498db;
    color: white;
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
}

.feng-tool-item .tooltip {
    position: absolute;
    right: 60px;
    background: #3498db;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 0.85rem;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.feng-tool-item:hover .tooltip {
    opacity: 1;
}

.feng-tool-item .tooltip::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -5px;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    border-left: 5px solid #3498db;
}

/* 目录侧边栏 */
.feng-toc-sidebar {
    width: 300px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    padding: 25px;
    align-self: flex-start;
    position: sticky;
    top: 30px;
}

.feng-toc-title {
    font-size: 1.3rem;
    color: #2c3e50;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #eaeaea;
    position: relative;
}

.feng-toc-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -2px;
    width: 50px;
    height: 2px;
    background: #3498db;
}

.feng-toc-list {
    list-style: none;
    padding-left: 10px;
    max-height: 70vh;
    overflow-y: auto;
}

.feng-toc-list::-webkit-scrollbar {
    width: 6px;
}

.feng-toc-list::-webkit-scrollbar-thumb {
    background: #d1e5f9;
    border-radius: 3px;
}

.feng-toc-list li {
    margin-bottom: 8px;
    position: relative;
    padding-left: 15px;
}

.feng-toc-list li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 6px;
    height: 6px;
    background: #3498db;
    border-radius: 50%;
}

.feng-toc-list li a {
    color: #5a6268;
    text-decoration: none;
    transition: color 0.3s ease;
    display: block;
    padding: 5px 0;
}

.feng-toc-list li a:hover {
    color: #3498db;
}

.feng-toc-list .toc-h2 {
    font-weight: 600;
    margin-left: 0;
}

.feng-toc-list .toc-h3 {
    margin-left: 15px;
    font-size: 0.95rem;
}

.feng-toc-list .toc-h4 {
    margin-left: 30px;
    font-size: 0.9rem;
}

/* 阅读进度条 */
.feng-reading-progress {
    position: fixed;
    top: 76px;
    left: 0;
    height: 4px;
    background: #3498db;
    z-index: 1000;
    width: 0%;
    transition: width 0.3s ease;
}

/* 响应式设计 */
@media (max-width: 992px) {
    .feng-container {
        flex-direction: column;
    }
    
    .feng-toc-sidebar {
        width: 100%;
        position: static;
        margin-bottom: 30px;
    }
    
    .feng-side-toolbar {
        right: 15px;
        bottom: 30px;
        top: auto;
        transform: none;
        flex-direction: row;
    }
}

@media (max-width: 768px) {
    .feng-single-post {
        padding: 25px 20px;
    }
    
    .feng-post-title {
        font-size: 1.8rem;
    }
    
    .feng-post-meta {
        flex-direction: column;
        gap: 8px;
        align-items: center;
    }
    
    .feng-post-navigation {
        flex-direction: column;
        gap: 15px;
    }
    
    .feng-prev-post, .feng-next-post {
        padding: 0;
        width: 100%;
    }
}
/* ================== 评论区域优化 ================== */
.feng-comments-section {
    margin-top: 60px;
    padding-top: 40px;
    border-top: 1px solid #eaeaea;
}

.feng-comments-title {
    font-size: 1.6rem;
    margin-bottom: 30px;
    color: #2c3e50;
    position: relative;
    padding-bottom: 15px;
}

.feng-comments-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 60px;
    height: 3px;
    background: #3498db;
    border-radius: 3px;
}

/* 评论列表容器 */
.feng-comments-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* 单条评论样式 */
.feng-comment {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    padding: 25px;
    background: #f8fafd;
    border-radius: 10px;
    position: relative;
    transition: all 0.3s ease;
    border: 1px solid #eaeaea;
}

.feng-comment:hover {
    background: #f0f7ff;
    border-color: #d1e5f9;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.1);
}

.feng-comment-avatar {
    flex: 0 0 70px;
    height: 70px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid #eaeaea;
}

.feng-comment-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.feng-comment-content {
    flex: 1;
}

.feng-comment-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 12px;
}

.feng-comment-author {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.feng-comment-date {
    color: #7f8c8d;
    font-size: 0.9rem;
}

.feng-comment-text {
    color: #444;
    line-height: 1.7;
    margin-bottom: 15px;
}

.feng-comment-text p:last-child {
    margin-bottom: 0;
}

.feng-comment-reply {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #e1f0fa;
    color: #3498db;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid #d1e5f9;
}

.feng-comment-reply:hover {
    background: #d1e5f9;
    transform: translateY(-2px);
    box-shadow: 0 3px 8px rgba(52, 152, 219, 0.15);
}

/* 子评论样式 */
.feng-comment .feng-comment {
    margin-top: 25px;
    margin-left: 40px;
    background: #fff;
    border: 1px solid #f0f0f0;
    padding: 20px;
}

.feng-comment .feng-comment:hover {
    background: #f8fafd;
}

/* 评论表单区域 */
.feng-comment-respond {
    margin-top: 50px;
    padding: 30px;
    background: #f8fafd;
    border-radius: 10px;
    border: 1px solid #eaeaea;
}

.feng-comment-reply-title {
    font-size: 1.4rem;
    margin-top: 0;
    margin-bottom: 25px;
    color: #2c3e50;
}

.feng-comment-form {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.feng-comment-form .comment-notes {
    grid-column: span 2;
    color: #7f8c8d;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.feng-comment-form .comment-form-author,
.feng-comment-form .comment-form-email,
.feng-comment-form .comment-form-url {
    margin-bottom: 0;
}

.feng-comment-form .comment-form-comment {
    grid-column: span 2;
}

.feng-form-group {
    margin-bottom: 20px;
}

.feng-form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #2c3e50;
}

.feng-form-group input,
.feng-form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #fff;
}

.feng-form-group input:focus,
.feng-form-group textarea:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
}

.feng-form-group textarea {
    min-height: 150px;
    resize: vertical;
}

.feng-form-submit {
    grid-column: span 2;
    text-align: right;
}

.feng-submit-button {
    background: #3498db;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.feng-submit-button:hover {
    background: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
}

/* 深色模式下的评论区域 */
body.feng-dark-mode .feng-comments-section {
    border-color: #444;
}

body.feng-dark-mode .feng-comments-title {
    color: #f0f0f0;
}

body.feng-dark-mode .feng-comment {
    background: #333;
    border-color: #444;
}

body.feng-dark-mode .feng-comment:hover {
    background: #3a3a3a;
    border-color: #555;
}

body.feng-dark-mode .feng-comment-author {
    color: #f0f0f0;
}

body.feng-dark-mode .feng-comment-text {
    color: #d0d0d0;
}

body.feng-dark-mode .feng-comment-reply {
    background: #3a3a3a;
    border-color: #555;
    color: #64b5f6;
}

body.feng-dark-mode .feng-comment-reply:hover {
    background: #4a4a4a;
}

body.feng-dark-mode .feng-comment-respond {
    background: #333;
    border-color: #444;
}

body.feng-dark-mode .feng-comment-reply-title {
    color: #f0f0f0;
}

body.feng-dark-mode .feng-form-group label {
    color: #e0e0e0;
}

body.feng-dark-mode .feng-form-group input,
body.feng-dark-mode .feng-form-group textarea {
    background: #2d2d2d;
    border-color: #444;
    color: #e0e0e0;
}

body.feng-dark-mode .feng-form-group input:focus,
body.feng-dark-mode .feng-form-group textarea:focus {
    border-color: #64b5f6;
    box-shadow: 0 0 0 3px rgba(100, 181, 246, 0.2);
}

body.feng-dark-mode .feng-submit-button {
    background: #64b5f6;
}

body.feng-dark-mode .feng-submit-button:hover {
    background: #4a9ed9;
}

/* 响应式设计 */
@media (max-width: 768px) {
    .feng-comment {
        flex-direction: column;
        padding: 20px;
    }
    
    .feng-comment-avatar {
        margin-bottom: 15px;
    }
    
    .feng-comment .feng-comment {
        margin-left: 20px;
    }
    
    .feng-comment-form {
        grid-template-columns: 1fr;
    }
    
    .feng-comment-form .comment-notes,
    .feng-comment-form .comment-form-comment,
    .feng-form-submit {
        grid-column: span 1;
    }
}

/* 空评论状态 */
.feng-no-comments {
    text-align: center;
    padding: 40px 20px;
    background: #f8fafd;
    border-radius: 10px;
    border: 1px dashed #eaeaea;
    color: #7f8c8d;
}

.feng-no-comments i {
    font-size: 3rem;
    margin-bottom: 20px;
    display: block;
    color: #d1e5f9;
}

.feng-no-comments h3 {
    color: #2c3e50;
    margin-bottom: 15px;
}

body.feng-dark-mode .feng-no-comments {
    background: #333;
    border-color: #444;
    color: #b0b0b0;
}

body.feng-dark-mode .feng-no-comments h3 {
    color: #f0f0f0;
}
</style>

<div class="feng-container">
    <div class="feng-single-post">
        <!-- 阅读进度条 -->
        <div class="feng-reading-progress"></div>
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- 文章头部 -->
            <header class="feng-post-header">
                <h1 class="feng-post-title"><?php the_title(); ?></h1>
                
                <div class="feng-post-meta">
                    <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                    <span><i class="far fa-user"></i> <?php the_author(); ?></span>
                    <span><i class="far fa-eye"></i> <?php echo feng_get_post_views(); ?> 阅读</span>
                    <span><i class="far fa-comment"></i> <?php comments_number('0 评论', '1 评论', '% 评论'); ?></span>
                    <span><i class="far fa-clock"></i> <?php echo feng_reading_time(); ?></span>
                </div>
            </header>
            
            <!-- 特色图片 -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="feng-post-thumbnail">
                    <?php the_post_thumbnail('large', array('class' => 'feng-featured-image')); ?>
                </div>
            <?php endif; ?>
            
            <!-- 文章内容 -->
            <div class="feng-post-content">
                <?php the_content(); ?>
            </div>
            
            <!-- 文章标签 -->
            <?php if (has_tag()) : ?>
                <div class="feng-post-tags">
                    <i class="fas fa-tags"></i>
                    <?php the_tags('', ''); ?>
                </div>
            <?php endif; ?>
            
            <!-- 文章底部 -->
            <footer class="feng-post-footer">
                <div class="feng-post-navigation">
                    <div class="feng-prev-post">
                        <?php previous_post_link('%link', '<i class="fas fa-arrow-left"></i> 上一篇: %title'); ?>
                    </div>
                    <div class="feng-next-post">
                        <?php next_post_link('%link', '下一篇: %title <i class="fas fa-arrow-right"></i>'); ?>
                    </div>
                </div>
                
                <!-- 作者信息框 -->
                <div class="feng-author-box">
                    <div class="feng-author-avatar">
                        <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                    </div>
                    <div class="feng-author-info">
                        <h4>关于作者: <?php the_author(); ?></h4>
                        <p><?php echo get_the_author_meta('description'); ?></p>
                        <div class="feng-author-links">
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="feng-btn">查看所有文章</a>
                        </div>
                    </div>
                </div>
                
                <!-- 相关文章 -->
                <div class="feng-related-posts">
                    <h3>相关推荐</h3>
                    <div class="feng-related-grid">
                        <?php
                        $categories = get_the_category();
                        $category_ids = array();
                        foreach($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }
                        
                        $args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => 3,
                            'orderby' => 'rand'
                        );
                        
                        $related_posts = new WP_Query($args);
                        if($related_posts->have_posts()) {
                            while($related_posts->have_posts()) {
                                $related_posts->the_post();
                                ?>
                                <div class="feng-related-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="feng-related-thumbnail">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="feng-related-meta">
                                        <span><?php echo get_the_date(); ?></span>
                                        <span><?php echo feng_get_post_views(); ?> 阅读</span>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </footer>
        </article>
        <?php comments_template(); ?>
        <?php endwhile; endif; ?>
    </div>

    
    
    <!-- 目录侧边栏 -->
    <aside class="feng-toc-sidebar">
        <h3 class="feng-toc-title">文章目录</h3>
        <div class="feng-toc-container" id="feng-toc-container">
            <!-- 目录将通过JavaScript动态生成 -->
            <p class="feng-toc-loading">正在生成目录...</p>
        </div>
    </aside>
</div>

<!-- 侧边工具栏 -->
<div class="feng-side-toolbar">
    <div class="feng-tool-item" id="feng-toc-toggle" title="显示/隐藏目录">
        <i class="fas fa-list"></i>
        <span class="tooltip">目录</span>
    </div>
    <div class="feng-tool-item" id="feng-font-increase" title="增大字体">
        <i class="fas fa-text-height"></i>
        <span class="tooltip">增大字体</span>
    </div>
    <div class="feng-tool-item" id="feng-font-decrease" title="减小字体">
        <i class="fas fa-text-width"></i>
        <span class="tooltip">减小字体</span>
    </div>
    <div class="feng-tool-item" id="feng-dark-mode" title="深色模式">
        <i class="fas fa-moon"></i>
        <span class="tooltip">深色模式</span>
    </div>
    <div class="feng-tool-item" id="feng-share-post" title="分享文章">
        <i class="fas fa-share-alt"></i>
        <span class="tooltip">分享文章</span>
    </div>
    <div class="feng-tool-item" id="feng-scroll-top" title="回到顶部">
        <i class="fas fa-arrow-up"></i>
        <span class="tooltip">回到顶部</span>
    </div>
</div>

<script>
// 添加必要的工具函数
function feng_get_post_views() {
    // 在实际应用中，这里应该有获取阅读次数的逻辑
    return Math.floor(Math.random() * 500) + 100;
}

function feng_reading_time() {
    // 计算阅读时间
    const content = document.querySelector('.feng-post-content').textContent;
    const words = content.trim().split(/\s+/).length;
    const minutes = Math.ceil(words / 200);
    return minutes + ' 分钟阅读';
}

// 初始化功能
document.addEventListener('DOMContentLoaded', function() {
    // 1. 生成文章目录
    generateTOC();
    
    // 2. 设置阅读进度条
    setupReadingProgress();
    
    // 3. 添加工具栏功能
    setupToolbar();
    
    // 4. 添加深色模式功能
    setupDarkMode();
    
    // 5. 添加字体调整功能
    setupFontAdjustment();
    
    // 6. 添加分享功能
    setupShare();
});

// 生成文章目录
function generateTOC() {
    const tocContainer = document.getElementById('feng-toc-container');
    if (!tocContainer) return; // 添加安全检测
    
    // 确保只抓取文章内容区的标题
    const contentArea = document.querySelector('.feng-post-content');
    if (!contentArea) return;
    
    const headings = contentArea.querySelectorAll('h2, h3, h4');
    
    if (headings.length === 0) {
        tocContainer.innerHTML = '<p>本文没有使用标题</p>';
        return;
    }
    
    let tocHTML = '<ul class="feng-toc-list">';
    
    headings.forEach((heading, index) => {
        // 确保标题有ID
        if (!heading.id) {
            heading.id = 'heading-' + index;
        }
        
        const level = parseInt(heading.tagName.substring(1));
        const className = 'toc-h' + level;
        
        tocHTML += `
            <li class="${className}">
                <a href="#${heading.id}">${heading.textContent}</a>
            </li>
        `;
    });
    
    tocHTML += '</ul>';
    tocContainer.innerHTML = tocHTML;
    
    // 平滑滚动
    document.querySelectorAll('.feng-toc-list a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// 设置阅读进度条
function setupReadingProgress() {
    const progressBar = document.querySelector('.feng-reading-progress');
   
    window.addEventListener('scroll', function() {
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        const scrollTop = window.scrollY;
        const progress = (scrollTop / (documentHeight - windowHeight)) * 100;
        progressBar.style.width = progress + '%';
    });
}

// 设置工具栏功能
function setupToolbar() {
    // 目录显示/隐藏切换
    const tocToggle = document.getElementById('feng-toc-toggle');
    const tocSidebar = document.querySelector('.feng-toc-sidebar');
    
    tocToggle.addEventListener('click', function() {
        tocSidebar.style.display = tocSidebar.style.display === 'none' ? 'block' : 'none';
    });
    
    // 回到顶部按钮
    const scrollTopBtn = document.getElementById('feng-scroll-top');
    
    scrollTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // 在移动设备上默认隐藏目录
    if (window.innerWidth < 992) {
        tocSidebar.style.display = 'none';
    }
}

// 设置深色模式
function setupDarkMode() {
    const darkModeBtn = document.getElementById('feng-dark-mode');
    const darkModeKey = 'feng-dark-mode-enabled';
    
    // 检查本地存储或系统偏好
    const isDarkMode = localStorage.getItem(darkModeKey) === 'true' || 
        (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches);
    
    if (isDarkMode) {
        document.body.classList.add('feng-dark-mode');
    }
    
    darkModeBtn.addEventListener('click', function() {
        document.body.classList.toggle('feng-dark-mode');
        
        // 保存用户偏好
        const isEnabled = document.body.classList.contains('feng-dark-mode');
        localStorage.setItem(darkModeKey, isEnabled);
    });
}

// 设置字体调整
function setupFontAdjustment() {
    const fontSizeKey = 'feng-font-size';
    const savedSize = localStorage.getItem(fontSizeKey) || '16';
    const content = document.querySelector('.feng-post-content');
    
    // 应用保存的字体大小
    content.style.fontSize = savedSize + 'px';
    
    // 增大字体按钮
    document.getElementById('feng-font-increase').addEventListener('click', function() {
        const currentSize = parseFloat(window.getComputedStyle(content).fontSize);
        const newSize = Math.min(currentSize + 1, 22); // 最大22px
        content.style.fontSize = newSize + 'px';
        localStorage.setItem(fontSizeKey, newSize);
    });
    
    // 减小字体按钮
    document.getElementById('feng-font-decrease').addEventListener('click', function() {
        const currentSize = parseFloat(window.getComputedStyle(content).fontSize);
        const newSize = Math.max(currentSize - 1, 14); // 最小14px
        content.style.fontSize = newSize + 'px';
        localStorage.setItem(fontSizeKey, newSize);
    });
}

// 设置分享功能
function setupShare() {
    const shareBtn = document.getElementById('feng-share-post');
    
    shareBtn.addEventListener('click', function() {
        const title = document.title;
        const url = window.location.href;
        
        if (navigator.share) {
            // 使用Web Share API
            navigator.share({
                title: title,
                url: url
            }).catch(console.error);
        } else {
            // 回退方案：显示分享选项
            alert('分享功能需要现代浏览器支持，请手动复制链接：\n' + url);
        }
    });
}
</script>

<style>
/* 深色模式 */
body.feng-dark-mode {
    background-color: #1a1a1a;
    color: #e0e0e0;
}

body.feng-dark-mode .feng-single-post,
body.feng-dark-mode .feng-toc-sidebar {
    background: #2d2d2d;
    color: #e0e0e0;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

body.feng-dark-mode .feng-post-title,
body.feng-dark-mode .feng-toc-title {
    color: #f0f0f0;
}

body.feng-dark-mode .feng-post-content {
    color: #d0d0d0;
}

body.feng-dark-mode .feng-post-content h2,
body.feng-dark-mode .feng-post-content h3 {
    color: #64b5f6;
}

body.feng-dark-mode .feng-post-meta span {
    color: #9e9e9e;
}

body.feng-dark-mode .feng-post-tags a {
    background: #3a3a3a;
    border-color: #555;
    color: #64b5f6;
}

body.feng-dark-mode .feng-post-tags a:hover {
    background: #4a4a4a;
}

body.feng-dark-mode .feng-toc-list li a {
    color: #b0b0b0;
}

body.feng-dark-mode .feng-toc-list li a:hover {
    color: #64b5f6;
}

/* 作者信息框 */
.feng-author-box {
    display: flex;
    gap: 20px;
    margin: 40px 0;
    padding: 25px;
    background: #f8fafd;
    border-radius: 10px;
    border: 1px solid #eaeaea;
}

body.feng-dark-mode .feng-author-box {
    background: #333;
    border-color: #444;
}

.feng-author-avatar img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
}

.feng-author-info {
    flex: 1;
}

.feng-author-info h4 {
    margin-top: 0;
    margin-bottom: 10px;
    color: #2c3e50;
}

body.feng-dark-mode .feng-author-info h4 {
    color: #f0f0f0;
}

.feng-author-info p {
    margin-bottom: 15px;
    color: #666;
}

body.feng-dark-mode .feng-author-info p {
    color: #b0b0b0;
}

.feng-author-links .feng-btn {
    display: inline-block;
    background: #3498db;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.feng-author-links .feng-btn:hover {
    background: #2980b9;
    transform: translateY(-2px);
}

/* 相关文章 */
.feng-related-posts {
    margin-top: 40px;
}

.feng-related-posts h3 {
    font-size: 1.4rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0f0f0;
}

body.feng-dark-mode .feng-related-posts h3 {
    border-color: #444;
}

.feng-related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

@media (max-width: 768px) {
    .feng-related-grid {
        grid-template-columns: 1fr;
    }
}

.feng-related-item {
    background: #f8fafd;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

body.feng-dark-mode .feng-related-item {
    background: #333;
    border-color: #444;
}

.feng-related-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.feng-related-thumbnail {
    display: block;
    height: 160px;
    overflow: hidden;
}

.feng-related-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.feng-related-item:hover .feng-related-thumbnail img {
    transform: scale(1.05);
}

.feng-related-item h4 {
    margin: 15px;
    font-size: 1.05rem;
}

.feng-related-item h4 a {
    color: #2c3e50;
    text-decoration: none;
    transition: color 0.3s ease;
    border: none;
}

body.feng-dark-mode .feng-related-item h4 a {
    color: #f0f0f0;
}

.feng-related-item h4 a:hover {
    color: #3498db;
}

.feng-related-meta {
    display: flex;
    justify-content: space-between;
    padding: 0 15px 15px;
    font-size: 0.85rem;
    color: #7f8c8d;
}
</style>

<?php get_footer(); ?>