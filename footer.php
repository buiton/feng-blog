<!-- Footer -->
<footer class="feng-footer">
    <div class="feng-container">
        <div class="feng-footer-content">
            <div class="feng-footer-widget">
                <h3>关于博客</h3>
                <p><?php bloginfo('description'); ?></p>
            </div>
            
            <div class="feng-footer-widget">
                <h3>热门标签</h3>
                <div class="feng-tech-stack">
                    <?php
                    $tags = get_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="feng-tech-item">' . $tag->name . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
            
            <div class="feng-footer-widget">
                <h3>联系我</h3>
                <p><i class="fas fa-envelope"></i> Email: fgl_java@163.com</p>
                <p><i class="fab fa-github"></i> GitHub: <a href="https://github.com/buiton" style="color: #fff;">github.com/buiton</a></p>
            </div>
        </div>
        
        <div class="feng-footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 保留所有权利 | 持续学习，持续分享</p>
        </div>
    </div>
</footer>

</div> <!-- 结束 .feng-blog-container -->

<?php wp_footer(); ?>
</body>
</html>