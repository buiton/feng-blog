<?php
/**
 * 首页模板 - 增强版
 */
get_header(); ?>

<div class="feng-blog-container">
    <!-- Hero Section -->
    <section class="feng-hero">
        <div class="feng-container">
            <h1><?php echo get_bloginfo('description'); ?></h1>
            <p>分享Java高级用法、微服务架构、数据库优化与系统稳定性实战经验</p>
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="feng-btn">查看所有文章</a>
        </div>
    </section>

    <!-- Main Content -->
    <div class="feng-container feng-main-content">
        <!-- Blog Posts -->
        <div class="feng-posts-container">
            <h2 style="margin-bottom: 30px; font-size: 1.8rem;">最新文章</h2>
            <div class="feng-blog-posts">
                <?php
                $recent_posts = new WP_Query([
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => true,
                    'post_type' => ['post'] // 包含文章类型
                ]);
                
                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    
                    // 获取文章永久链接
                    $post_link = get_permalink();
                ?>
                <article class="feng-post-card">
                    <div class="feng-post-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php echo esc_url($post_link); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo esc_url($post_link); ?>">
                                <div style="background: linear-gradient(45deg, #3498db, #8e44ad); height: 180px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: 700;">
                                    <div class="placeholder-title">
                                        <?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="feng-post-content">
                        <div class="feng-post-meta">
                            <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
                        </div>
                        <h3><a href="<?php echo esc_url($post_link); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                        <a href="<?php echo esc_url($post_link); ?>" class="feng-read-more">阅读更多</a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>暂无文章</p>';
                endif;
                ?>
            </div>
        </div>
        
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>