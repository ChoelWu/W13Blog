<{extends file='tpl/default/admin/common/layout.html'}>
<{include file='tpl/default/admin/common/layout.html'}>
<{block name='header'}><{/block}>
<{block name='content'}>

<{/block}>
<{block name='footer'}><{/block}>
<{if condition="a=b"}>123<{/if}>
<{foreach list=menu_list key=menu_key value=menu}>
<li>hello <{$menu['name']}></li>
<{/foreach}>