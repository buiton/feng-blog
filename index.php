<?php
/**
 * 默认模板
 */
get_header(); ?>

<div class="feng-container feng-main-content">
    <!-- 主内容区 -->
    <div class="feng-posts-container">
        <?php if (have_posts()) : ?>
            <h2 class="page-title"><?php single_post_title(); ?></h2>
            
            <div class="feng-blog-posts">
                <?php while (have_posts()) : the_post(); ?>
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
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <a href="<?php the_permalink(); ?>" class="feng-read-more">阅读更多</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- 分页 -->
            <div class="feng-pagination">
                <?php
                the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => __('« 上一页'),
                    'next_text' => __('下一页 »'),
                ]);
                ?>
            </div>
            
        <?php else : ?>
            <p><?php _e('抱歉，没有找到任何文章。'); ?></p>
        <?php endif; ?>
    </div>
    
    <!-- 侧边栏 -->
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>