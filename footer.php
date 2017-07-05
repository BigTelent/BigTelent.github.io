</div>
<!-- 友情链接 -->
<?php get_template_part( 'inc/footer-links' ); ?>

<!-- 版权说明 -->
<footer id="footer">
	<div class="bottom-nav">
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'header',
					'menu_class'		=> 'bottom-menu',
					'fallback_cb'		=> 'default_menu'
				) );
			?>
	</div>		
	<div id="contentinfo">
		Copyright © 2007-2016 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> All rights reserved. | Theme by <a  href="https://www.ricemouse.com/27.html" title="米鼠" target="_blank">Mydream</a> | <?php echo get_option( 'zh_cn_l10n_icp_num' );?>
	</div>
</footer>

<!-- 返回顶部 -->
<ul id="scroll">
	<li><a class="scroll-top" title="返回顶部"><i class="iconfont icon-chevronup"></i></a></li>
	<li><a class="scroll-bottom" title="转到底部"><i class="iconfont icon-chevrondown"></i></a></li>
</ul>

<!-- 百度分享 -->
<?php if ( is_single() ) { ?>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php } ?>

<!-- 右下播放器 -->
<?php if (md_get_option('playerbox')) { ?>
	<?php get_template_part( 'inc/playerbox' ); ?>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>

