<?php
// 获取当前评论页码
$paged = max(1, get_query_var('cpage',1));
$comments_per_page = get_option('comments_per_page');
// 查询评论
$args = array(
    'post_id'  => get_the_ID(),
    'status'   => 'approve',
    'number'   => $comments_per_page,
    'offset'   => ($paged - 1) * $comments_per_page,
    'order'    => 'ASC', // 按时间正序排列
);

$comments = get_comments($args);

// 获取总评论数
$comment_count = get_comments(array(
    'post_id' => get_the_ID(),
    'status'  => 'approve',
    'count'   => true
));

// 设置分页变量
$total_pages = ceil($comment_count / $comments_per_page);
global $wp_query;
$wp_query->max_num_comment_pages = $total_pages;
?>

<div class="feng-comments-section">
    <h2 class="feng-comments-title">评论</h2>

    <?php if ($comment_count > 0) : ?>
        <div class="feng-comments-list">
            <?php
            wp_list_comments(array(
                'style'       => 'div',
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'feng_custom_comment',
                'per_page'    => $comments_per_page,
                'page'        => $paged
            ), $comments);
            ?>
        </div>

        <!-- 分页 -->
        <div class="feng-comment-pagination">
            <?php
            $pagination_args = array(
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
                'type'      => 'array',
                'echo'      => false,
                'current'   => $paged,
                'total'     => $total_pages,
                'base'      => add_query_arg('cpage', '%#%')
            );

            $pagination_links = paginate_comments_links($pagination_args);

            if ($pagination_links) {
                echo '<ul class="pagination-list">';
                foreach ($pagination_links as $link) {
                    $link = str_replace(
                        ['page-numbers', 'prev', 'next', 'current'],
                        ['pagination-link', 'pagination-prev', 'pagination-next', 'pagination-current'],
                        $link
                    );
                    echo '<li class="pagination-item">' . $link . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </div>
    <?php else : ?>
        <div class="feng-no-comments">
            <i class="far fa-comment-alt"></i>
            <h3>暂无评论</h3>
            <p>成为第一个评论这篇文章的人吧！</p>
        </div>
    <?php endif; ?>

    <!-- 评论表单 -->
    <div class="feng-comment-respond">
        <?php comment_form(array(
            'title_reply'          => '<span class="feng-comment-reply-title">发表评论</span>',
            'title_reply_to'       => '回复给 %s',
            'cancel_reply_link'    => '取消回复',
            'label_submit'         => '提交评论',
            'comment_notes_before' => '<p class="comment-notes">您的电子邮箱地址不会被公开。必填项已用<span class="required">*</span>标注</p>',
            'comment_field'        => '<div class="feng-form-group comment-form-comment"><label for="comment">评论内容</label><textarea id="comment" name="comment" cols="45" rows="8" required="required"></textarea></div>',
            'fields'               => array(
                'author' => '<div class="feng-form-group comment-form-author"><label for="author">姓名<span class="required">*</span></label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" required="required" /></div>',
                'email'  => '<div class="feng-form-group comment-form-email"><label for="email">电子邮箱<span class="required">*</span></label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" required="required" /></div>',
                'url'    => '<div class="feng-form-group comment-form-url"><label for="url">个人网站</label><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>',
            ),
            'class_submit'         => 'feng-submit-button',
            'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><i class="fas fa-paper-plane"></i>%4$s</button>',
            'submit_field'         => '<div class="feng-form-submit">%1$s %2$s</div>',
        )); ?>
    </div>
</div>
