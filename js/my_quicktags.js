QTags.addButton( 'hr', '水平线', "\n<hr />\n", '' );//添加横线
QTags.addButton( 'h2', 'H2', "\n<h2>", "</h2>\n" ); //添加标题2
QTags.addButton( 'h3', 'H3', "\n<h3>", "</h3>\n" ); //添加标题3
QTags.addButton( 'paged', '分页', '\n<!--nextpage-->\n', "" );//添加文章分页
QTags.addButton( 'toggle', '折叠板', '\n[toggle hide="no" title="" color=""][/toggle]', "" );//添加Toggle内容块
QTags.addButton( 'callout', '信息条', '\n[callout class="info或warning或danger" title=""][/callout]', "" );//添加提示信息短代码
QTags.addButton( 'loginshow', '登录可见', '\n[loginshow][/loginshow]', "" );//添加登录可见短代码
QTags.addButton( 'replyshow', '回复可见', '\n[replyshow][/replyshow]', "" );//添加回复可见短代码

//这儿共有四对引号，分别是按钮的ID、显示名、点一下输入内容、再点一下关闭内容（此为空则一次输入全部内容），\n表示换行。