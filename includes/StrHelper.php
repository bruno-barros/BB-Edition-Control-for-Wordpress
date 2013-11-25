<?php 
/**
 * String helper
 *
 *
 * @package   BB Edition Control
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      https://github.com/bruno-barros/BB-Edition-Control-for-Wordpress
 * @copyright 2013 Bruno Barros
 */
class Str {

    static function statusLbl($value='')
    {
        $label = '';

        if($value == 1) $label = 'Publicado';
        if($value == 0) $label = 'Não publicado';

        return $label;
    }

    static function statusCombo($selected = 1)
    {
        $h = "<select name=\"status\" id=\"field_status\">";
        $h .= "<option value=\"1\" ".( ($selected == 1)?'selected':'').">Publicado</option>";
        $h .= "<option value=\"0\" ".( ($selected == 0)?'selected':'' ).">Não publicado</option>";
        $h .= '</select>';

        return $h;
    }

}