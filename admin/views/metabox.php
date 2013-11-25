<?php
/**
 * View da meta box
 *
 * @package   BB Edition Control
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      https://github.com/bruno-barros/BB-Edition-Control-for-Wordpress
 * @copyright 2013 Bruno Barros
 */
?>

<label for="bb_edition_control_selected"><?php _e('Select an edition', $this->plugin_slug) ?>:</label><br />

<?php if( count($e) == 0 ): ?>


<a href="<?php echo $this->url()?>"><?php _e('Please create an edition first', $this->plugin_slug) ?>.</a><br />

<?php 
else: 

    echo '<select name="bb_edition_control_selected" id="bb_edition_control_selected" style="width:100%">';
    foreach ($e as $ed):

?>    
    <option value="<?php echo $ed->id?>" <?php echo ($ed->id == $pe) ? 'selected' : ''?>><?php echo $ed->name?></option>
<?php 
    endforeach;
    echo '</select>';

endif; 
?>