<?php
/**
 * Editando uma edição
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

	
    <div class="tabwrap">
        

    <h3>Editando...</h3>

    <form id="add-new-edition" action="<?php echo $this->form_action_url()?>" method="post">
        <input type="hidden" name="bb_update_hidden" value="Y">
        <input type="hidden" name="bb_update_id" value="<?php echo $item->id?>">
        <input type="hidden" name="bb_referrer" value="<?php echo $this->form_action_url()?>">

    <table class="form-table">
 
    <tr valign="top">
        <th scope="row"><label for="field_date"><?php _e('Date', $this->plugin_slug)?></label></th>
        <td>
            <input type="text" name="date" id="field_date" class="date-pick" value="<?php echo Date::pt($item->date)?>">
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="field_date"><?php _e('Number', $this->plugin_slug)?></label></th>
        <td>
            <input type="number" name="number" id="field_number" class="small-text" value="<?php echo $item->number?>">
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="field_date"><?php _e('Name', $this->plugin_slug)?></label> </th>
        <td>
                <input type="text" name="name" id="field_name" class="regular-text" value="<?php echo $item->name?>">
           
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="field_date"><?php _e('Slug', $this->plugin_slug)?></label> </th>
        <td>
           <input type="text" name="slug" id="field_slug" class="regular-text" value="<?php echo $item->slug?>">
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="field_date"><?php _e('Description', $this->plugin_slug)?></label> </th>
        <td>
           <textarea name="description" id="field_description" class="regular-text" cols="30" rows="3"><?php echo $item->description?></textarea>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="field_date"><?php _e('Status', $this->plugin_slug)?></label> </th>
        <td>
           <?php echo Str::statusCombo($item->status)?>
        </td>
    </tr>       
        
        </table>

        

        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', $this->plugin_slug ) ?>" />
            <a href="<?php echo $this->url()?>" class="button-secondary"><?php _e('Back', $this->plugin_slug ) ?></a>
        </p>
    </form>

    </div>

 

</div>
