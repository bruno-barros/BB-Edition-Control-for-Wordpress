<?php
/**
 * View da listagem de edições
 *
 * @package   BB Edition Control
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      https://github.com/bruno-barros/BB-Edition-Control-for-Wordpress
 * @copyright 2013 Bruno Barros
 */
?>
<div class="wrap">

    <h2>Edições</h2>
 
    <table class="widefat">
    <thead>
        <tr>
            <th><?php _e('Date', $this->plugin_slug)?></th>
            <th><?php _e('Number', $this->plugin_slug)?></th>
            <th><?php _e('Name', $this->plugin_slug)?></th>       
            <th><?php _e('Status', $this->plugin_slug)?></th>
            <th></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th><?php _e('Date', $this->plugin_slug)?></th>
        <th><?php _e('Number', $this->plugin_slug)?></th>
        <th><?php _e('Name', $this->plugin_slug)?></th>
        <th><?php _e('Status', $this->plugin_slug)?></th>
        <th></th>
        </tr>
    </tfoot> 
    <tbody>       
    <?php

    if(isset($list) && $list):

        foreach ($list as $k => $item):
    ?>
        <tr>
         <td><?php echo Date::pt($item->date)?></td>
         <td><?php echo $item->number?></td>
         <td><?php echo $item->name?></td>
         <td><?php echo Str::statusLbl($item->status)?></td>
         <td><a href="<?php echo $this->url()?>&edit=<?php echo $item->id?>">editar</a></td>
       </tr>
        

    <?php 
        endforeach;

    endif;
    ?>
    </tbody>
    </table>

    <div class="tablenav">
    <div class='tablenav-pages'>
    <div class="pagination-links">
            
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
    </div>   
    </div>
    </div>




</div>