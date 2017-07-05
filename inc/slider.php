<!-- 幻灯片引用 http://plugins.gravitysign.com/seria/ -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#slider').seria({
			adjacentVisible: 0,
  			easing: '<?php echo md_get_option('slider_easing'); ?>', /**幻灯片特效**/
			fade: '<?php echo md_get_option('slider_fade'); ?>', /**文字滚动特效 **/
  			height: <?php echo md_get_option('slider_height'); ?>,
  			pagination: true,
  			photoExpand: <?php echo md_get_option('slider_photo'); ?>,
			fadeSync: true,
			photoPanning: true,
  			});
		});
</script>

<div id="slider" class="seria">	
	<?php if (md_get_option(slider_content)== 'show') { ?>
		<ul class="seria-list">			
		<?php			
			$args = array(
				'meta_key' => 'show',
				'ignore_sticky_posts' => 1,
				'posts_per_page' => md_get_option('slider_n'),
				'orderby'=> md_get_option('slider_orderby'),				
			);
			query_posts($args);
		?>		
		<?php while (have_posts()) : the_post();$do_not_duplicate[] = $post->ID; ?>
		<?php $image = get_post_meta($post->ID, 'show', true); ?>
			<li>				
				<div class="seria-photo">
					<figure>
						<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
						<figcaption><?php the_title(); ?></figcaption>
					</figure>
				</div>				
				<div class="seria-about">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p><a href="<?php the_permalink(); ?>" target="_blank" rel="bookmark"><?php if (has_excerpt('')){ echo wp_trim_words( get_the_excerpt(), 120, '...' ); } else { echo wp_trim_words( get_the_content(), 120, '...' ); } ?></a></p>
				</div>				
			</li>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</ul>
	<?php } ?>
	
	<?php if (md_get_option(slider_content)== 'rand') { ?>
		<ul class="seria-list">			
		<?php	
			$cat = explode(',',md_get_option('cat_in'));
			$args = array(
				'cat' => $cat,
				'ignore_sticky_posts' => 1,
				'posts_per_page' => md_get_option('slider_n'),
				'orderby'=> md_get_option('slider_orderby'),				
			);
			query_posts($args);
		?>		
		<?php while (have_posts()) : the_post();$do_not_duplicate[] = $post->ID; ?>
			<li>				
				<div class="seria-photo">
					<figure>
						<?php get_thumbnail(420,280)?>
						<figcaption><?php the_title(); ?></figcaption>
					</figure>
				</div>				
				<div class="seria-about">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p><a href="<?php the_permalink(); ?>" target="_blank" rel="bookmark"><?php if (has_excerpt('')){ echo wp_trim_words( get_the_excerpt(), 120, '...' ); } else { echo wp_trim_words( get_the_content(), 120, '...' ); } ?></a></p>
				</div>				
			</li>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</ul>
	<?php } ?>

	
	<?php if (md_get_option(slider_content)== 'custom') { ?>
		<ul class="seria-list">			
			<li>				
				<div class="seria-photo">
					<figure>
						<a href="<?php echo md_get_option('slider_url1') ?>" rel="bookmark"><img src="<?php echo md_get_option('slider_img1') ?>" alt="<?php echo md_get_option('slider_title1') ?>" /></a>
						<figcaption><?php echo md_get_option('slider_title1') ?></figcaption>
					</figure>
				</div>				
				<div class="seria-about">
						<h2><a href="<?php echo md_get_option('slider_url1') ?>" rel="bookmark"><?php echo md_get_option('slider_title1') ?></a></h2>
						<p><a href="<?php echo md_get_option('slider_url1') ?>" target="_blank" rel="bookmark">
						<?php echo md_get_option('slider_describe1') ?>
						</a></p>
				</div>				
			</li>
			<li>				
				<div class="seria-photo">
					<figure>
						<a href="<?php echo md_get_option('slider_url2') ?>" rel="bookmark"><img src="<?php echo md_get_option('slider_img2') ?>" alt="<?php echo md_get_option('slider_title2') ?>" /></a>
						<figcaption><?php echo md_get_option('slider_title2') ?></figcaption>
					</figure>
				</div>				
				<div class="seria-about">
						<h2><a href="<?php echo md_get_option('slider_url2') ?>" rel="bookmark"><?php echo md_get_option('slider_title2') ?></a></h2>
						<p><a href="<?php echo md_get_option('slider_url2') ?>" target="_blank" rel="bookmark">
						<?php echo md_get_option('slider_describe2') ?>
						</a></p>
				</div>				
			</li>
			<li>				
				<div class="seria-photo">
					<figure>
						<a href="<?php echo md_get_option('slider_url3') ?>" rel="bookmark"><img src="<?php echo md_get_option('slider_img3') ?>" alt="<?php echo md_get_option('slider_title3') ?>" /></a>
						<figcaption><?php echo md_get_option('slider_title3') ?></figcaption>
					</figure>
				</div>				
				<div class="seria-about">
						<h2><a href="<?php echo md_get_option('slider_url3') ?>" rel="bookmark"><?php echo md_get_option('slider_title3') ?></a></h2>
						<p><a href="<?php echo md_get_option('slider_url3') ?>" target="_blank" rel="bookmark">
						<?php echo md_get_option('slider_describe3') ?>
						</a></p>
				</div>				
			</li>
			<li>				
				<div class="seria-photo">
					<figure>
						<a href="<?php echo md_get_option('slider_url4') ?>" rel="bookmark"><img src="<?php echo md_get_option('slider_img4') ?>" alt="<?php echo md_get_option('slider_title4') ?>" /></a>
						<figcaption><?php echo md_get_option('slider_title4') ?></figcaption>
					</figure>
				</div>				
				<div class="seria-about">
						<h2><a href="<?php echo md_get_option('slider_url4') ?>" rel="bookmark"><?php echo md_get_option('slider_title4') ?></a></h2>
						<p><a href="<?php echo md_get_option('slider_url4') ?>" target="_blank" rel="bookmark">
						<?php echo md_get_option('slider_describe4') ?>
						</a></p>
				</div>				
			</li>			
	</ul>
	<?php } ?>	

</div>