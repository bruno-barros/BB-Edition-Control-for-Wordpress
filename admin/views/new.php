<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
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

	


    <?php //echo plugins_url() ?>

    <form id="add-new-edition" action="<?php echo $this->form_action_url()?>" method="post">
        <input type="hidden" name="bb_add_new_hidden" value="Y">
        <input type="hidden" name="bb_referrer" value="<?php echo $this->form_action_url()?>">

        <ul>
            <li>
                <label for="field_date" title="Choose date by clicking the calendar next to this field.">Date</label>
                <input type="text" name="date" id="field_date" class="date-pick" title="Use the button next to this field to pick a date.">
            </li>    
             
       
        
        </ul>

        

        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', $this->plugin_slug ) ?>" />
        </p>
    </form>


    <div id="bb-edition-control" class="postbox ">
    <div class="handlediv" title="Clique para expandir ou recolher."><br></div><h3 class="hndle"><span>Edição</span></h3>
    <div class="inside">

    <label for="bb_edition_control_selected">Selecione a edição:</label><br>

    <select name="bb_edition_control_selected" id="bb_edition_control_selected" style="width:100%">    
        <option value="2">Edição 4 - Novembro</option>
        
        <option value="3" selected="">Edição 2</option>
    </select></div>
    </div>


    <div id="mediatag-settings-bulk-admin" class="postbox media-tags-settings-postbox">
        <h3 class="hndle"><span>Media-Tags Bulk Admin Interface</span></h3>
        <div class="inside">
    
                        <p>Turn On/Off the Media-Tags Bulk Admin Interfaces. There are two sections where some heavy JavaScript code is added to the page:</p>

                        <select id="mediatag_admin_bulk_library" name="mediatag_admin_bulk_library">
                            <option selected="selected" value="no">Off</option>
                            <option selected="selected" value="yes">On</option>
                        </select>&nbsp;
                        <label for="mediatag_admin_bulk_library">Media Library Page</label><br>

                        <select id="mediatag_admin_bulk_inline" name="mediatag_admin_bulk_inline">
                            <option selected="selected" value="no">Off</option>
                            <option selected="selected" value="yes">On</option>
                        </select>&nbsp;
                        <label for="mediatag_admin_bulk_inline">Media Upload Popup (Gallery &amp; Media Library Tabs)</label><br><br>
                                </div>
    </div>


</div>
