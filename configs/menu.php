<?php
return [
    [
        'name' => '模块管理',
        'children' => [
            [
                'id' => 'channel-page',
                'name' => '栏目管理',
                'target' => 'navtab',
                'url' => 'index.php?g=admin&a=channel'
            ],
            [
                'id' => 'slider-pic-page',
                'name' => '轮播图管理',
                'target' => 'navtab',
                'url' => 'index.php?g=admin&a=slide_pic'
            ]
        ]
    ],
    [
        'id' => 'article-page',
        'name' => '文章管理',
        'target' => 'navtab',
        'url' => 'html/base/navtab.html'
    ],
    [
        'name' => '评论管理',
        'children' => [
            [
                'id' => 'word-page',
                'name' => '敏感词管理',
                'target' => 'navtab',
                'url' => 'html/base/navtab.html'
            ],
            [
                'id' => 'comment-page',
                'name' => '评论管理',
                'target' => 'navtab',
                'url' => 'html/base/dialog.html'
            ]
        ]
    ],
    [
        'name' => '多媒体管理',
        'children' => [
            [
                'id' => 'photo-page',
                'name' => '相册',
                'target' => 'navtab',
                'url' => 'html/base/navtab.html'
            ],
            [
                'id' => 'vedio-page',
                'name' => '视频',
                'target' => 'navtab',
                'url' => 'html/base/dialog.html'
            ],
            [
                'id' => 'material-page',
                'name' => '素材',
                'target' => 'navtab',
                'url' => 'html/base/dialog.html'
            ],
            [
                'id' => 'trash-page',
                'name' => '回收站',
                'target' => 'navtab',
                'url' => 'html/base/dialog.html'
            ]
        ]
    ],
    [
        'name' => '博客信息',
        'children' => [
            [
                'id' => 'personal-page',
                'name' => '个人信息（简历）',
                'target' => 'navtab',
                'url' => 'html/base/navtab.html'
            ],
            [
                'id' => 'blog-page',
                'name' => '博客信息',
                'target' => 'navtab',
                'url' => 'html/base/dialog.html'
            ]
        ]
    ],
    [
        'name' => '备份迁移',
        'children' => [
            [
                'id' => 'back-up-page',
                'name' => '备份',
                'target' => 'navtab',
                'url' => 'html/base/navtab.html'
            ],
            [
                'id' => 'remove-page',
                'name' => '迁移',
                'target' => 'navtab',
                'url' => 'html/base/dialog.html'
            ]
        ]
    ]
];