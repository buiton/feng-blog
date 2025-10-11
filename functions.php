<?php
// 添加主题支持
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

// 注册菜单
function feng_register_menus() {
    register_nav_menus([
        'primary-menu' => __('主菜单', 'feng-blog'),
        'footer-menu' => __('底部菜单', 'feng-blog')
    ]);
}
add_action('init', 'feng_register_menus');

// 加载样式和脚本
function feng_enqueue_scripts() {
    // 主样式
    wp_enqueue_style('feng-blog-style', get_stylesheet_uri(), [], '1.0');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    // 自定义脚本
    wp_enqueue_script('feng-blog-script', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
    
    // 为评论添加回复脚本
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'feng_enqueue_scripts');

// 自定义文章查询
function feng_recent_posts_query() {
    return new WP_Query([
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'ignore_sticky_posts' => true
    ]);
}

// 获取文章阅读量
function feng_get_post_views($post_id = null) {
    if (!$post_id) $post_id = get_the_ID();
    $count = get_post_meta($post_id, 'post_views', true);
    return $count ? $count : '0';
}

// 计算阅读时间
function feng_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $minutes = ceil($word_count / 200); // 按每分钟200词计算
    return $minutes . ' 分钟阅读';
}

// 增强版评论回调函数
function feng_custom_comment($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    $comment_class = comment_class('feng-comment', $comment->comment_ID, $comment->comment_post_ID, false);
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php echo $comment_class; ?>>
        <div class="feng-comment-inner">
            <div class="feng-comment-avatar">
                <?php echo get_avatar($comment, $args['avatar_size']); ?>
            </div>

            <div class="feng-comment-content">
                <div class="feng-comment-meta">
                    <h4 class="feng-comment-author">
                        <?php echo get_comment_author_link(); ?>
                        <?php if ($comment->comment_author_email === get_the_author_meta('email')) : ?>
                            <span class="feng-comment-badge">作者</span>
                        <?php endif; ?>
                    </h4>
                    <span class="feng-comment-date">
                        <i class="far fa-clock"></i>
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?>
                        </time>
                    </span>
                </div>

                <?php if ('0' == $comment->comment_approved) : ?>
                    <div class="feng-comment-awaiting-moderation">
                        <i class="fas fa-info-circle"></i> 您的评论正在等待审核
                    </div>
                <?php endif; ?>

                <div class="feng-comment-text">
                    <?php comment_text(); ?>
                </div>

                <div class="feng-comment-actions">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'reply_text' => '<i class="fas fa-reply"></i> 回复',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '',
                        'class'     => 'feng-comment-reply'
                    )));
                    ?>
                </div>
            </div>
        </div>
    <?php
}

// 确保评论功能开启
function feng_enable_comments() {
    add_post_type_support('post', 'comments');
    add_post_type_support('page', 'comments');
}
add_action('init', 'feng_enable_comments');

// // 添加评论分页支持
// function feng_comment_pagination_args($args) {
//     $args['prev_text'] = '<i class="fas fa-chevron-left"></i> 上一页';
//     $args['next_text'] = '下一页 <i class="fas fa-chevron-right"></i>';
//     $args['screen_reader_text'] = '评论导航';
//     return $args;
// }
// add_filter('paginate_comments_links', 'feng_comment_pagination_args');

// 注册 cpage 查询变量
add_filter('query_vars', function($vars) {
    $vars[] = 'cpage';
    return $vars;
});

// 启用嵌套评论功能
add_action('after_setup_theme', function() {
    add_theme_support('threaded-comments');
});

// 修正评论查询排序
add_filter('comments_clauses', function($clauses) {
    if (is_singular() && get_option('thread_comments')) {
        $clauses['orderby'] = 'comment_date_gmt ASC';
    }
    return $clauses;
});
