<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: Complie.class.php
// +----------------------------------------------------------------------
// | Date: 2019/1/18
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace frame\core\View;

class Compile
{
    private $patten = [
        '#\{\\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}#',
        '#\{if (.*?)\}#',
        '#\{(else if|elseif) (.*?)\}#',
        '#\{else\}#',
        '#\{foreach \\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)}#',
        '#\{\/(foreach|if)}#',
        '#\{\\^(k|v)\}#',
    ];
    private $translation = [
        "<?php echo \$this->_valueMap['\\1']; ?>",
        '<?php if (\\1) {?>',
        '<?php } else if (\\2) {?>',
        '<?php }else {?>',
        "<?php foreach (\$this->_valueMap['\\1'] as \$k => \$v) {?>",
        '<?php }?>',
        '<?php echo \$\\1?>'
    ];

    /**
     * 编译模板
     * @param $sourceFile
     * @param $compileFile
     */
    public function compile($sourceFile, $compileFile)
    {
        $content = file_get_contents($sourceFile);
        $content = preg_replace($this->patten, $this->translation, $content);
        file_put_contents($compileFile, $content);
    }
}