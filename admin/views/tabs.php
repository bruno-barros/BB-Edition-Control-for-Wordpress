<?php
/**
 * Abas
 *
 * @package   BB Edition Control
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      https://github.com/bruno-barros/BB-Edition-Control-for-Wordpress
 * @copyright 2013 Bruno Barros
 */
?>

<div class="wrap">


<?php screen_icon(); ?>
<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

<h2 class="nav-tab-wrapper">
    <a id="options-group-1-tab" class="nav-tab <?php echo ($this->getTab()=='list')?'nav-tab-active':''?>" href="<?php echo $this->url('tab=list')?>">Edições</a>
    <a id="options-group-2-tab" class="nav-tab <?php echo ($this->getTab()=='new')?'nav-tab-active':''?>" href="<?php echo $this->url('tab=new')?>">Nova</a>

    <?php if( $this->getTab()=='edit' ): ?>
    <div id="options-group-2-tab" class="nav-tab nav-tab-active">Editando</div> 
    <?php endif; ?>
</h2>

</div>