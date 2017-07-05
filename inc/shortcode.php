<?php

// 添加短代码 伸缩内容块
function toggle_content($atts, $content = null){
	$content = do_shortcode($content);
	extract(shortcode_atts(array('hide'=>'no','title'=>'','color'=>''),$atts));
	if($hide=='no'){
		return '<div class="toggle-wrap"><div class="toggle-click-btn '.$hide.'" style="color:'.$color.'">'.$title.'</div><div class="toggle-content">'.$content.'</div></div>';
	}else{
		return '<div class="toggle-wrap"><div class="toggle-click-btn '.$hide.'" style="color:'.$color.'">'.$title.'</div><div class="toggle-content" style="display:none;">'.$content.'</div></div>';
	}
}
add_shortcode('toggle', 'toggle_content');

// 添加短代码 信息提示
function md_infoblock($atts, $content = null){
	$content = do_shortcode($content);
	extract(shortcode_atts(array('class'=>'info','title'=>''),$atts));
	return '<div class="bs-callout bs-callout-'.$class.'"><h4>'.$title.'</h4><p>'.$content.'</p></div>';
}
add_shortcode('callout', 'md_infoblock');


// 添加短代码 登录可见
function loginshow_shortcode( $atts, $content ){
	if( !is_null( $content ) && !is_user_logged_in() ) $content = '<div class="bg-lr2v contextual"><i class="iconfont icon-information-outline"></i> 此处内容需要 <span class="user-login">登录</span> 才可见 </div>';
	return $content;
}
add_shortcode( 'loginshow', 'loginshow_shortcode' );

// 添加短代码 回复可见
function replyshow_shortcode( $atts, $content ){
	if( !is_null( $content ) ) :
	if(!is_user_logged_in()){
		$content = '<div class="bg-lr2v contextual"><i class="iconfont icon-messageprocessing"></i>此处内容需要登录并 <span class="user-login">发表评论</span> 才可见</div>';
	}else{
		global $post;
		$user_id = get_current_user_ID();
		if( $user_id != $post->post_author && !user_can($user_id,'edit_others_posts') ){
			$comments = get_comments( array('status' => 'approve', 'user_id' => get_current_user_ID(), 'post_id' => $post->ID, 'count' => true ) );
			if(!$comments) {
				$content = '<div class="bg-lr2v contextual"><i class="iconfont icon-messageprocessing"></i>此处内容需要登录并 <a href="#comments">发表评论</a> 才可见</div>';
			}
		}
	}
	endif;
	return $content;
}
add_shortcode( 'replyshow', 'replyshow_shortcode' );
?>