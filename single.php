<?php
ini_set("memory_limit","128M");
?>
<?php get_header(); ?>
<div class="row">
	
    <div class="col-md-8">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>        
            
            <section class="article-view">
                <?php $author = get_field('article-author')?get_field('article-author'):''; 
				if (has_post_thumbnail()): ?>
					<div class="article-photo">
						<a href="<?=get_the_post_thumbnail_url($post->ID, 'full')?>" data-fancybox><?php the_post_thumbnail('large') ?></a>
						<div class="article-caption">
                            <div class="article-title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="article-meta d-flex flex-wrap">
                                <span class="item-date"><time datetime="<?php echo get_the_date('Y-m-d H:i', $post); ?>"><?php the_date(); ?></time></span>
                                <?php if ($author) { ?>
                                <span class="item-author"><?=$author?></span>
                                <?php } ?>
                            </div>
                        </div>
					</div>
				<?php else : ?>
					<div class="title-single">
						<div class="article-title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="article-meta d-flex flex-wrap">
							<span class="item-date"><time datetime="<?php echo get_the_date('Y-m-d H:i', $post); ?>"><?php the_date(); ?></time></span>
							<?php if ($author) { ?>
                            <span class="item-author"><?=$author?></span>
                            <?php } ?>
						</div>
					</div>
				<?php endif; ?>
                 
				<div class="print" style="display:none;"><a href="javascript:window.print();"><i class="sprite s-print_ico"></i> версія для друку</a></div>
				<div class="post-content">
                   <?php the_content();?>
				</div>
    
                <div class="tags-list d-flex flex-wrap">
                	<?php the_tags('<span>Теги:</span> ',''); ?>
                </div>
        
                    
        
            </section>
        
			<div class="block">
			<?php 
				if ( function_exists( 'the_ad_placement' ) ) {
                    the_ad_placement( 'ad-before-comments-single' );
                }
            ?>
            </div>
    
       		<?php comments_template( '', true ); ?>
	   
       		<?php $tags = wp_get_post_tags($post->ID);
			
				if ($tags) {
					$tags_ids = array();
					foreach ($tags as $tag) {
						$tags_ids[] = $tag->term_id;
					}
					
					$args = array(
						'tag__in' => $tags_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page' => 2,
						'ignore_sticky_posts' => 1,
						'fields' => 'ids'
					);
					
					$tag_posts = get_posts($args);
					
					if ($tag_posts) {
				?>
					<div class="related-block">
						<div class="section-title">
							<h2>Статті по темі</h2>
                        </div>
						<div class="posts-list row">
							<?php foreach($tag_posts as $article_id) : ?>
                             <div class="post-item col-lg-6">
                                <?php if (has_post_thumbnail($article_id)) { ?>
                                <div class="item-thumb"><a href="<?php echo get_permalink($article_id); ?>"><?php echo get_the_post_thumbnail($article_id, 'post-thumb'); ?></a></div>
                                <?php } ?>
                                <div class="item-title"><a href="<?php echo get_permalink($article_id); ?>"><?php 
                                    echo get_the_title($article_id);
                                ?></a></div>
                                <div class="item-meta d-flex flex-wrap">
                                    <span class="item-date"><?php echo get_the_date(get_option('date_format'), $article_id); ?></span>
                                    <?php $author = get_field('article-author', $article_id)?get_field('article-author', $article_id):''; ?>
                                    <?php if ($author) { ?>
                                    <span class="item-author"><?=$author?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
						</div>
                    </div>
			<?php
					}
				}
			?>
            
            <?php if (wp_is_mobile()) : ?>
                <div class="home-slider">
                    <div class="cycle-slideshow"
                         data-cycle-fx="scrollHorz"
                         data-cycle-pager=".cycle-pager"
                         data-cycle-pager-template="<span></span>"
                         data-cycle-timeout="5000"
                         data-cycle-speed="1000"
                         data-cycle-manual-speed="1000"
                         data-cycle-slides="> div">
                            <?php
                            $category_id = 10;

                            $myposts = get_posts( array( 'numberposts' => 3, 'category' => $category_id, 'fields' => 'ids' ) );
                            $counter=0;
                            foreach( $myposts as $post_id ) :
                                $counter++;
                                $p_link = get_permalink($post_id);
                                $author = get_field('article-author', $post_id)?get_field('article-author', $post_id):''; 

                                echo '<div class="article-photo article-photo-'.$counter.'">
                                    <a href="'.$p_link.'" class="article-photo-bg" style="background-image:url(\''.get_the_post_thumbnail_url($post_id, 'large').'\')">
                                        <div class="article-caption">
                                            <div class="article-title">
                                                '.get_the_title($post_id).'
                                            </div>
                                            <div class="article-meta d-flex flex-wrap">
                                                <span class="item-date"><time datetime="'.get_the_date('Y-m-d H:i', $post_id).'">'.get_the_date(get_option('date_format'), $post_id).'</time></span>';
                                                if ($author) {
                                                echo '<span class="item-author">'.$author.'</span>';
                                                }
                                            echo '</div>
                                        </div>
                                    </a>
                                </div>';
                            endforeach; 
                            ?>
                    </div>
                    <div class="cycle-pager"></div>
                </div>
            <?php else : ?>
                
                <div class="home-block polis">
                     <?php $category_id = 4;?>
                    <div class="section-title"><h2>Поліс</h2></div>
                    <div class="posts-list row">
                    <?php	
                    $myposts = get_posts( array( 'numberposts' => 4, 'category' => $category_id, 'fields' => 'ids' ) );
                    $count=0;

                    foreach( $myposts as $post_id ) :
                        ?>
                        <div class="post-item col-lg-6">
                            <?php if (has_post_thumbnail($post_id)) { ?>
                            <div class="item-thumb"><a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_post_thumbnail($post_id, 'post-thumb'); ?></a></div>
                            <?php } ?>
                            <div class="item-title"><a href="<?php echo get_permalink($post_id); ?>"><?php 
                                echo get_the_title($post_id);
                            ?></a></div>
                            <div class="item-meta d-flex flex-wrap">
                                <span class="item-date"><?php echo get_the_date(get_option('date_format'), $post_id); ?></span>
                                <?php $author = get_field('article-author', $post_id)?get_field('article-author', $post_id):''; ?>
                                <?php if ($author) { ?>
                                <span class="item-author"><?=$author?></span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    </div>
                 </div>
        
                <div class="home-block listnews">
                <?php $category_id = 6; ?>

                 <div class="section-title"><h2>Статті</h2></div>
                 <div class="posts-list row">
                    <?php	
                    $myposts = get_posts( array( 'numberposts' => 3, 'category' => $category_id, 'fields' => 'ids' ) );
                    $count=0;

                    foreach( $myposts as $post_id ) :
                        $count++;
                        ?>
                        <div class="post-item<?php if ($count%3==1) echo ' col-12 post-item-first'; else echo ' col-sm-6 post-item-small'; ?>">
                            <?php if (has_post_thumbnail($post_id)) { ?>
                            <div class="item-thumb"><a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_post_thumbnail($post_id, 'post-thumb'); ?></a></div>
                            <?php } ?>
                            <div class="item-title"><a href="<?php echo get_permalink($post_id); ?>"><?php 
                                echo get_the_title($post_id);
                            ?></a></div>
                            <div class="item-meta d-flex flex-wrap">
                                <span class="item-date"><?php echo get_the_date(get_option('date_format'), $post_id); ?></span>
                                <?php $author = get_field('article-author', $post_id)?get_field('article-author', $post_id):''; ?>
                                <?php if ($author) { ?>
                                <span class="item-author"><?=$author?></span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
        
                <div class="home-block">
                    <div class="section-title"><h2>Останні новини</h2></div>        
                    <?php 
                    $cat_id = 3;
                    $count = 20;
                    $args_important = array(
                        'posts_per_page' => 2,
                        'fields' => 'ids',
                        'meta_query' => array(
                            array(
                                'key' => 'important-left',
                                'value' => 1
                            )
                        )
                    );
                    $important_news = get_posts($args_important); 
                    $args = array(
                        'posts_per_page' => $count-count($important_news),
                        'fields' => 'ids',
                        'post__not_in' => $important_news
                    );
                    if ($cat_id) $args['cat'] = $cat_id;
                    $news = get_posts($args); 
                    echo '<div class="news-list">';
                    $old_date = '';
                    $counter = 0;
                        foreach($news as $news_item_id) {
                            $counter++;
                            $news_class = '';
                            if (get_the_date('Ymd', $news_item_id)!=$old_date) {
                                echo '<div class="news-item news-item-date"><div class="item-entry">'.get_the_date('l, d F Y', $news_item_id).'</div></div>';
                                $old_date = get_the_date('Ymd', $news_item_id);
                            }
                            if (in_category('hot_news', $news_item_id)) $news_class .= ' item-bold';
                            echo '<div class="news-item'.$news_class.'">
                                <div class="item-meta">
                                    <span class="item-date">'.get_the_date('H:i', $news_item_id).'</span>
                                </div>
                                <div class="item-entry">';
                                    echo '<div class="item-title"><a href="'.get_permalink($news_item_id).'">'.get_the_title($news_item_id).'</a></div>
                                </div>
                            </div>';
                            if ($counter==5 && count($important_news)>0) $important_id = $important_news[0]; 
                                elseif ($counter==8 && count($important_news)>1) $important_id = $important_news[1]; 
                                else $important_id = '';
                            if ($important_id!='') :
                                echo '<div class="news-item important-news-item item-bold">
                                    <div class="item-entry">
                                        <a href="'.get_permalink($important_id).'">';
                                        if (has_post_thumbnail($important_id)) {
                                            $img_url = aq_resize( get_the_post_thumbnail_url($important_id), 300, 150, true, true, true );
                                            echo '<div class="thumb"><img src="'.$img_url.'" alt="'.get_the_title($important_id).'"></div>';
                                        }
                                        echo '<div class="item-title">'.get_the_title($important_id).'</div>
                                        </a>
                                    </div>
                                </div>';
                            endif;
                        }
                        if ($cat_id && $cat_id!=3) {
                            echo '<div class="news-more"><a href="'.get_category_link($cat_id).'">'.get_category($cat_id)->name.'</a></div>';
                        } else {
                            echo '<div class="news-more"><a href="'.get_category_link(3).'">Більше новин</a></div>';
                        }
                    echo '</div>'; ?>
                </div>

            <?php endif; ?>
       		
			<div class="block">
			<?php
			if ( function_exists( 'the_ad_placement' ) ) {
				the_ad_placement( 'ad-bottom-single' );
			}
			?>
            </div>
        
        <?php endwhile;?>
    </div>
    <div class="col-md-4">
		<?php get_sidebar(); ?>
    </div>
    
</div>

<?php if (wp_is_mobile()) : 
	
	get_template_part('news-infinity');
	
endif; ?>

<?php get_footer(); ?>