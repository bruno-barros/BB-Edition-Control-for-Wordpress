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


    <form id="add-new-edition" action="<?php echo $this->form_action_url()?>" method="post">
        <input type="hidden" name="bb_add_new_hidden" value="Y">
        <input type="hidden" name="bb_referrer" value="<?php echo $this->form_action_url()?>">

    <table class="form-table">
 
        <tr valign="top">
            <th scope="row"><label for="field_date"><?php _e('Date', $this->plugin_slug)?></label></th>
            <td>
                <input type="text" name="date" id="field_date" class="date-pick" value="" placeholder="dd/mm/aaaa">
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="field_date"><?php _e('Number', $this->plugin_slug)?></label></th>
            <td>
                <input type="number" name="number" id="field_number" class="small-text" value="">
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="field_date"><?php _e('Name', $this->plugin_slug)?></label> </th>
            <td>
                    <input type="text" name="name" id="field_name" class="regular-text" value="<?php _e('Edition', $this->plugin_slug)?>...">
               
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="field_date"><?php _e('Slug', $this->plugin_slug)?></label> </th>
            <td>
               <input type="text" name="slug" id="field_slug" class="regular-text" value="">
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="field_date"><?php _e('Description', $this->plugin_slug)?></label> </th>
            <td>
               <textarea name="description" id="field_description" class="regular-text" cols="30" rows="3"></textarea>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="field_date"><?php _e('Status', $this->plugin_slug)?></label> </th>
            <td>
               <?php echo Str::statusCombo(0)?>
            </td>
        </tr>      
        
        </table>

        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', $this->plugin_slug ) ?>" />
        </p>

    </form>



</div>
