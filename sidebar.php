<aside class="feng-sidebar">
    <!-- About Widget -->
    <div class="feng-widget feng-about-widget">
        <h3 class="feng-widget-title">关于我</h3>
        <div class="feng-avatar">F</div>
        <p>👋 Hello，欢迎来到我的博客！我是一个热爱技术、不断进化的 Java 程序员。</p>
        
        <div class="feng-highlight">
            <p><strong>🙋 关于我</strong><br>
            你好，我是 Feng，一名专注于 Java 后端开发的程序员。目前从事健康险、理赔和大数据平台相关的系统研发。</p>
        </div>
        
        <p><strong>🧰 我的技术栈</strong></p>
        <div class="feng-tech-stack">
            <span class="feng-tech-item">Java</span>
            <span class="feng-tech-item">Spring Boot</span>
            <span class="feng-tech-item">MySQL</span>
            <span class="feng-tech-item">Kafka</span>
            <span class="feng-tech-item">Redis</span>
            <span class="feng-tech-item">Python</span>
            <span class="feng-tech-item">Docker</span>
            <span class="feng-tech-item">微服务</span>
        </div>
        
        <div class="feng-social-links">
            <a href="https://github.com/buiton" target="_blank" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a href="mailto:fgl_java@163.com" title="Email">
                <i class="far fa-envelope"></i>
            </a>
        </div>
    </div>
    
    <!-- Newsletter Widget -->
    <div class="feng-widget feng-newsletter-widget">
        <h3 class="feng-widget-title">订阅更新</h3>
        <p>获取最新技术文章和资源，直接发送到你的邮箱</p>
        <form>
            <input type="email" placeholder="你的邮箱地址" required>
            <button type="submit" class="feng-btn" style="width: 100%;">订阅</button>
        </form>
    </div>
    
    <!-- Categories Widget -->
    <div class="feng-widget feng-categories-widget">
        <h3 class="feng-widget-title">文章分类</h3>
        <ul>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' 
                    . $category->name . ' <span>' . $category->count . '</span></a></li>';
            }
            ?>
        </ul>
    </div>
	  <!-- Tags Widget - 新增文章标签展示 -->
    <div class="feng-widget feng-tags-widget">
        <h3 class="feng-widget-title">文章标签</h3>
        <div class="feng-tags-container">
            <?php
            // 获取标签并按文章数量排序
            $tags = get_tags(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 20 // 显示前20个标签
            ));
            
            if ($tags) {
                // 获取最大和最小文章数用于确定标签大小
                $max_count = 0;
                $min_count = 9999;
                foreach ($tags as $tag) {
                    if ($tag->count > $max_count) $max_count = $tag->count;
                    if ($tag->count < $min_count) $min_count = $tag->count;
                }
                
                // 计算大小范围
                $diff = $max_count - $min_count;
                if ($diff <= 0) $diff = 1;
                
                foreach ($tags as $tag) {
                    // 计算标签大小 (1.0-3.0)
                    $size = 1.0 + (($tag->count - $min_count) / $diff) * 2.0;
                    
                    // 根据大小确定CSS类
                    $class = 'feng-tag';
                    if ($size > 2.5) $class = 'feng-tag-lg';
                    elseif ($size < 1.5) $class = 'feng-tag-sm';
                    
                    echo '<a href="' . get_tag_link($tag->term_id) . '" class="' . $class . '">' . $tag->name . '</a>';
                }
            } else {
                echo '<p>暂无标签</p>';
            }
            ?>
        </div>
</aside>