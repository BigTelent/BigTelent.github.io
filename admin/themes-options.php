<?php

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

function optionsframework_options() {

	$blogpath =  get_stylesheet_directory_uri() . '/img';

	// 将所有分类（categories）加入数组
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// 所有分类ID
	$categories = get_categories(); 
	foreach ($categories as $cat) {
	$cats_id .= '<li>'.$cat->cat_name.' [ '.$cat->cat_ID.' ]</li>';
	}

	// 所有公告分类ID
	$categories = get_categories(array('taxonomy' => 'notice')); 
	foreach ($categories as $cat) {
	$catb_id .= '<li>'.$cat->cat_name.' [ '.$cat->cat_ID.' ]</li>';
	}

	// 将所有标签（tags）加入数组
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// 将所有页面（pages）加入数组
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = '选择页面:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	$options = array();
	
	
	//主题描述
	$options[] = array(
		'name' => '主题说明',
		'type' => 'heading'
	);	
	
	$options[] = array(
		'name' => '',
		'desc' => '<div style="font:16px/32px Microsoft YaHei,Helvetica,Arial,Lucida Grande,Tahoma,sans-serif;">梦想,一个迷人而又绚丽的代名词<br>MyDream采用自适应制作，满足电脑和移动终端显示，该主题采集了很多别人的设计，做了简单的糅合，或许能看到别人主题的影子，但是该主题主要就是简洁，简单，无需哪些繁杂的东西，干净点更好！<br>主题发布地址：<a target="_blank" href="http://www.ricemouse.com/27.html">MyDream</a><br>主题讨论群：<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=66c37241611deab13c3ff611813a55fc1dcb8a86abd0183c96a7f1d38b2723a3">MyDream | WordPress交流</a></div>',
		'id' => '',
		'type' => 'info'
	);
	

	// 首页设置

	$options[] = array(
		'name' => '首页设置',
		'type' => 'heading'
	);

    $options[] = array(
        'name' => '首页布局选择',
        'id' => 'layout',
        'std' => 'blog',
        'type' => 'radio',
        'options' => array(
            'blog' => '博客布局',
        )
    );

	$options[] = array(
		'id' => 'clear'
	);

	$options[] = array(
		'name' => '是否开启前端登录',
		'desc' => '显示',
		'id' => 'login',
		'std' => '0',
		'type' => 'checkbox'
	);	

	$options[] = array(
		'id' => 'clear'
	);
	
	$options[] = array(
		'name' => '是否开启首页公告',
		'desc' => '显示，并代替首页面包屑导航',
		'id' => 'bulletin',
		'std' => '0',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => '输入公告内容',
		'desc' => '每个条目用"li"包含',
		'id' => 'bulletin_text',
		'std' => '',
		'type' => 'textarea'
	);
		
	$options[] = array(
		'id' => 'clear'
	);		
	
	$options[] = array(
		'name' => '首页博客布局排除的分类文章',
		'desc' => '输入排除的分类ID，多个分类用半角逗号","隔开',
		'id' => 'not_cat_n',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => '分类ID对照',
		'desc' => '<ul>'.$cats_id.'</ul>',
		'id' => 'catid',
		'type' => 'info'
	);

	$options[] = array(
		'id' => 'clear'
	);
	

	$options[] = array(
		'name' => '首页页脚链接',
		'desc' => '显示首页页脚链接',
		'id' => 'footer_link',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => '',
		'desc' => '可以输入链接分类ID，显示特定的链接在首页，留空则显示全部链接',
		'id' => 'link_f_cat',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'id' => 'clear'
	);

	$options[] = array(
		'name' => '',
		'desc' => '选择友情链接页面',
		'id' => 'link_url',
		'type' => 'select',
		'class' => 'mini',
		'options' => $options_pages
	);
	
	$options[] = array(
		'id' => 'clear'
	);
	
	$options[] = array(
		'name' => '文章Ajax滚动加载',
		'desc' => '启用',
		'id' => 'scroll',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => '',
		'desc' => '滚动加载页数',
		'id' => 'scroll_n',
		'std' => '3',
		'type' => 'text'
	);	
	
	// 幻灯片设置

	$options[] = array(
		'name' => '幻灯片设置',
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => '是否首页显示幻灯',
		'desc' => '显示',
		'id' => 'slider',
		'std' => '0',
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => '幻灯片显示数量',
		'desc' => '幻灯显示篇数，不要少于三个，不然异常',
		'id' => 'slider_n',
		'std' => '5',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
        'name' => '幻灯片排序',
        'id' => 'slider_orderby',
		'desc' => '默认随机显示',
        'std' => 'rand',
        'type' => 'select',
        'options' => array(
            'rand' => '随机',
            'desc' => '倒叙',
            'asc' => '正叙',
			'modified'=> '按文章修改时间'
        )
    );
	
    $options[] = array(
        'name' => '首页幻灯片内容选择',
        'id' => 'slider_content',
        'std' => 'show',
        'type' => 'radio',
        'options' => array(
            'show' => '自定义栏目添加show，值为图片地址',
            'custom' => '自定义幻灯片',
			'rand' => '随机显示'
        )
    );

	$options[] = array(
		'name' => '首页幻灯片需要显示的分类文章',
		'desc' => '输入分类ID，多个分类用半角逗号","隔开',
		'id' => 'cat_in',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => '分类ID对照',
		'desc' => '<ul>'.$cats_id.'</ul>',
		'id' => 'catid',
		'type' => 'info'
	);	
	
	$options[] = array(
		'id' => 'clear'
	);	
	
	$options[] = array(
		'name' => '自定义幻灯片说明',
		'desc' => '下面是自定义幻灯片设置，根据要求填写',
		'id' => '',
		'type' => 'info'
	);	
	$options[] = array(
		'name' => '自定义幻灯片1',
		'desc' => '标题',
		'id' => 'slider_title1',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '',
		'desc' => '图片地址',
		'id' => 'slider_img1',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	$options[] = array(
		'name' => '',
		'desc' => '链接地址',
		'id' => 'slider_url1',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);
	$options[] = array(
		'name' => '',
		'desc' => '描述',
		'id' => 'slider_describe1',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '自定义幻灯片2',
		'desc' => '标题',
		'id' => 'slider_title2',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '',
		'desc' => '图片地址',
		'id' => 'slider_img2',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	$options[] = array(
		'name' => '',
		'desc' => '链接地址',
		'id' => 'slider_url2',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);
	$options[] = array(
		'name' => '',
		'desc' => '描述',
		'id' => 'slider_describe2',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	

	$options[] = array(
		'name' => '自定义幻灯片3',
		'desc' => '标题',
		'id' => 'slider_title3',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '',
		'desc' => '图片地址',
		'id' => 'slider_img3',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	$options[] = array(
		'name' => '',
		'desc' => '链接地址',
		'id' => 'slider_url3',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);
	$options[] = array(
		'name' => '',
		'desc' => '描述',
		'id' => 'slider_describe3',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '自定义幻灯片4',
		'desc' => '标题',
		'id' => 'slider_title4',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '',
		'desc' => '图片地址',
		'id' => 'slider_img4',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	$options[] = array(
		'name' => '',
		'desc' => '链接地址',
		'id' => 'slider_url4',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);
	$options[] = array(
		'name' => '',
		'desc' => '描述',
		'id' => 'slider_describe4',
		'std' => '',
		'class' => 'lengthtext',
		'type' => 'text'
	);	
	
	$options[] = array(
		'id' => 'clear'
	);	
	
	$options[] = array(
        'name' => '幻灯片特效',
        'id' => 'slider_easing',
        'std' => '',
        'type' => 'select',
        'options' => array(
			'easeOutCubic' => 'easeOutCubic',
			'easeInOutCubic' => 'easeInOutCubic',
			'easeInCirc' => 'easeInCirc',
			'easeOutCirc' => 'easeOutCirc',
			'easeInOutCirc' => 'easeInOutCirc',
			'easeInExpo' => 'easeInExpo',
			'easeOutExpo' => 'easeInOutExpo',
			'easeInQuad' => 'easeInQuad',
			'easeOutQuad' => 'easeOutQuad',
			'easeInOutQuad' => 'easeInOutQuad',
			'easeInQuart' => 'easeInQuart',
			'easeOutQuart' => 'easeOutQuart',
			'easeInOutQuart' => 'easeInOutQuart',
			'easeInQuint' => 'easeInQuint',
			'easeOutQuint' => 'easeOutQuint',
			'easeInOutQuint' => 'easeInOutQuint',
			'easeInSine' => 'easeInSine',
			'easeOutSine' => 'easeOutSine',
			'easeInOutSine' => 'easeInOutSine',
			'easeInBack' => 'easeInBack',
			'easeOutBack' => 'easeOutBack',
			'easeInOutBack' => 'easeInOutBack',
        )
    );		
	
	$options[] = array(
        'name' => '幻灯片文字特效',
        'id' => 'slider_fade',
		'desc' => '',
        'std' => 'vertical',
        'type' => 'select',
        'options' => array(
            'vertical' => 'vertical',
            'horizontal' => 'horizontal',
			'none'		=> 'none'
        )
    );		

	$options[] = array(
		'id' => 'clear'
	);	
	
	$options[] = array(
		'name' => '幻灯片高度',
		'desc' => '',
		'id' => 'slider_height',
		'std' => '280',
		'type' => 'text'
	);	
	
	$options[] = array(
		'name' => '图片最大化按钮',
		'desc' => '',
		'id' => 'slider_photo',
		'std' => 'true',
		'type' => 'select',
		'options' => array(
            'true' => '显示',
            'false' => '不显示',
        )
	);	
		
	// LOGO|背景设置
	$options[] = array(
		'name' => '基本设置',
		'type' => 'heading'
	);

	$options[] = array(
		'name' => '全站背景图片开启',
		'desc' => '选中开启背景图片',
		'id' => 'back-img-show',
		'std' => '0',
		'type' => 'checkbox'
	);	
	
	$options[] = array(
		'name' => '全站背景图片',
		'desc' => '',
		'id' => 'back-img',
        "std" => "$blogpath/bj.png",
		'type' => 'upload'
	);	

	$options[] = array(
		'id' => 'clear'
	);		
	
	$options[] = array(
		'name' => '上传Logo',
		'desc' => '透明png图片最佳，比例 220×50px',
		'id' => 'logo',
        "std" => "$blogpath/logo.png",
		'type' => 'upload'
	);

	$options[] = array(
		'name' => '自定义Favicon',
		'desc' => '上传favicon.ico，并通过FTP上传到网站根目录',
		'id' => 'favicon',
        "std" => "$blogpath/favicon.ico",
		'type' => 'upload'
	);

	$options[] = array(
		'id' => 'clear'
	);

	// 高级设置

	$options[] = array(
		'name' => '高级设置',
		'type' => 'heading'
	);
	

	$options[] = array(
        'name' => '头像资源选择',
        'id' => 'gravatar_source',
        'std' => 'cn',
        'type' => 'radio',
        'options' => array(
			'default' => '主题默认',
            'duoshuo' => '多说服务器',
            'ssl' => '官方SSL服务器',
            'cn' => '官方cn服务器',			
        )
    );

	$options[] = array(
		'id' => 'clear'
	);
	

	$options[] = array(
		'name' => '流量统计代码（异步）',
		'desc' => '用于在页头添加异步统计代码',
		'id' => 'tongji-head',
		'std' => '',
		'type' => 'textarea'
	);	
	
	
	$options[] = array(
		'id' => 'clear'
	);

	$options[] = array(
		'name' => '主动推送百度',
		'desc' => '启用',
		'id' => 'baidu_submit',
		'std' => '0',
		'type' => 'checkbox'
	);	

	$options[] = array(
		'name' => '百度推送Token',
		'desc' => '从百度站长里获取你的专有Token',
		'id' => 'baidu_token',
		'std' => '',
		'type' => 'text'
	);	

	$options[] = array(
		'id' => 'clear'
	);
	
	$options[] = array(
		'name' => '左下播放器',
		'desc' => '启用',
		'id' => 'playerbox',
		'std' => '0',
		'type' => 'checkbox'
	);	

	$options[] = array(
		'name' => '播放器高度度',
		'desc' => 'px',
		'id' => 'playerbox-height',
		'std' => '400',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => '播放器代码',
		'desc' => '用iframe调用播放器不然可能隐藏后不能播放。iframe部分属性【scrolling="no" frameborder="no" border="0" marginwidth="0" marginheight="0"】',
		'id' => 'playerbox-code',
		'std' => '<iframe scrolling="no" frameborder="no" border="0" marginwidth="0" marginheight="0"  src="http://www.xiami.com/widget/player-multi?uid=116844&sid=47078,47106,46934,47079,46794,46818,46792,46814,46842,46908,46813,46933,46925,46935,46923,46822,1769636197,47129,1769547248,46786,46837,47004,47111,46828,46811,47116,46790,46927,46885,46816,46782,46826,46905,1769547254,46892,46889,&width=235&height=346&mainColor=5695c1&backColor=457cb4&autoplay=0" type="application/x-shockwave-flash" width="235" height="346"></iframe>',
		'type' => 'textarea'
	);
	
	// SEO设置

	$options[] = array(
		'name' => 'SEO设置',
		'type' => 'heading'
	);

	$options[] = array(
		'name' => '',
		'desc' => '启用主题自带SEO功能，如使用其它SEO插件，请取消勾选',
		'id' => 'wp_title',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => '首页描述（Description）',
		'desc' => '',
		'id' => 'description',
		'std' => '一般不超过200个字符',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => '首页关键词（KeyWords）',
		'desc' => '',
		'id' => 'keyword',
		'std' => '一般不超过100个字符',
		'type' => 'textarea'
	);

	$options[] = array(
		'id' => 'clear'
	);

	$options[] = array(
		'name' => '站点title连接符',
		'desc' => '修改站点title连接符号',
		'id' => 'connector',
		'std' => '|',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'id' => 'clear'
	);

	$options[] = array(
		'name' => '',
		'desc' => '首页显示站点副标题',
		'id' => 'blog_info',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'id' => 'clear'
	);

	// 广告设置

	$options[] = array(
		'name' => '广告设置',
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => '两端式代码，放在<head>里面;如无必要不需添加任何东西',
		'desc' => 'JS请求次数少，执行效率高。',
		'id' => 'ad-head-js',
		'std' => '',
		'type' => 'textarea'
	);	
	
	$options[] = array(
		'id' => 'clear'
	);		
	$options[] = array(
		'name' => '列表页广告',
		'desc' => '显示',
		'id' => 'ad-archive-show',
		'std' => '0',
		'type' => 'checkbox'
	);	
	$options[] = array(
		'name' => 'PC端列表页广告',
		'desc' => 'PC端用于列表页第二篇文章下添加广告位',
		'id' => 'ad-archive-p',
		'std' => '',
		'type' => 'textarea'
	);	
	
	$options[] = array(
		'name' => '移动端列表页广告',
		'desc' => '移动端用于列表页第二篇文章下添加广告位',
		'id' => 'ad-archive-m',
		'std' => '',
		'type' => 'textarea'
	);

	$options[] = array(
		'id' => 'clear'
	);	
	
	$options[] = array(
		'name' => '文章页广告',
		'desc' => '显示',
		'id' => 'ad-single-show',
		'std' => '0',
		'type' => 'checkbox'
	);		
	
	$options[] = array(
		'name' => 'PC端文章内容标题下广告',
		'desc' => 'PC端文章内容标题下添加广告位',
		'id' => 'ad-single-p',
		'std' => '',
		'type' => 'textarea'
	);	

	$options[] = array(
		'name' => '移动端文章内容标题下广告',
		'desc' => '移动端文章内容标题下添加广告位',
		'id' => 'ad-single-m',
		'std' => '',
		'type' => 'textarea'
	);	
	
	$options[] = array(
		'id' => 'clear'
	);		
	
	return $options;
}