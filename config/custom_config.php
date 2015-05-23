<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/6
 * Time: 20:19
 */


//每页文章数量
define('ARTICLE_PAGE_SIZE',10);
//每页留言板数量
define('MB_PAGE_SIZE',10);
//文章评论每页条数
define('ARTICLE_COMMENTS_PAGE_SIZE',10);
//留言板的article id
define('MB_ARTICLE_ID',0);
//article 最少字数
define('ARTICLE_MIN_NUM',0);
//article 预览中预览的文章字数
define('ARTICLE_REVIEW_NUM',500);
//article 预览中预览的文章title字节数
define('ARTICLE_TITLE_REVIEW_NUM',60);
//article 最大的文章title字数
define('ARTICLE_TITLE_MAX_NUM',25);
//定义yii web目录上一个目录（主目录）绝对路径
define('DOCUMENT_ROOT', '' );
//定义图片目录
define('IMAGE_ROOT',DOCUMENT_ROOT.'/res/img');
//自定于头像目录
define('HEAD_PORTRAIT_ROOT',IMAGE_ROOT.'/head_portrait');
//自定义音频目录
define('MUSIC_ROOT',DOCUMENT_ROOT.'/res/music');
//置顶日期
define('KEEP_TOP_DATE', '2020-01-01');



//个人页
define('PERSONAL_ARTICLE_PAGE_SIZE', 10);

//定义导航序列
define('NAV_HOME_NUM',1);
define('NAV_ARTICLE_NUM',2);
define('NAV_MUSIC_NUM',3);
define('NAV_PHOTO_NUM',4);
define('NAV_MB_NUM',5);
define('NAV_CONTACT_NUM',6);

//定义文章类型
define('ARTICLE_TYPE_ALL', 0);
//doudou博文
define('ARTICLE_TYPE_DOUDOU',5);

//文章类型

  return $article_info = [
        ['theme_1',
            ['title_1', 'title_2']
        ],

        ['theme_2',
            ['title_1', 'title_2']
        ]
    ];
