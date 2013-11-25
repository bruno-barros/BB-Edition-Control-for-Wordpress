<?php 
/**
 * Date helper
 *
 *
 * @package   BB Edition Control
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      https://github.com/bruno-barros/BB-Edition-Control-for-Wordpress
 * @copyright 2013 Bruno Barros
 */

class Date {

    static function sql($date = '')
    {
        return self::magicValidDate($date);
    }

    /**
     * Esta função pega o formato yyyy-mm-dd e coloca no padrão Brasil dd/mm/yyyy
     *
     * @uses self::magicValidDate() valida data no padrão SQL
     * @access  public
     * @return  string
     */
    static function pt($date = '', $sep = "/")
    {
        // valida data
        $dt = self::magicValidDate($date);
        
        if ($dt === null) {
            $d = '00';
            $m = '00';
            $y = '0000';
        } else {
            $ex = explode('-', $dt);
            $d = $ex[2];
            $m = $ex[1];
            $y = $ex[0];
        }
        return $d . $sep . $m . $sep . $y;
    }

    /**
     * A função identifica o tipo de data entrado e retorna no final um valor 
     * para ela NULL caso o valor entrado for uma data inválida ou um 
     * valor padrão definido caso NULL ou em caso de data correta, 
     * retorna a mesma no padrão banco de dados como yyyy-mm-dd.
     * 
     * Aceita datas nos formatos:
     * - yyyy-mm-dd
     * - dd-mm-yyyy
     * - yyyy-mm-dd hh:ii:ss
     * - dd/mm/yyyy
     * - dd mm yyyy
     * - ddmmyyyy
     * - yyyymmdd
     * 
     * @param string $data
     * @param string $padrao
     * @return string   data no formato SQL
     */
    static function magicValidDate($data, $padrao = false)
    {
        // remove a hora se for padrão 'datetime'
        $data = preg_replace('/\d{2}:\d{2}:\d{2}/', '', $data);
        
        $dt   = str_replace(array("-","/","."," "), "", $data);

        $tam  = strlen($dt);
        
        if($tam == 8){
            $isMonth = substr($dt,4,2);

            if($isMonth > 12){ /*ddmmyyyy*/
                $dia = substr($dt,0,2);
                $mes = substr($dt,2,2);
                $ano = substr($dt,4,4);
            } else { /*yyyymmdd*/
                $dia = substr($dt,6,2);
                $mes = substr($dt,4,2);
                $ano = substr($dt,0,4);
            }
            
            if($ano < 1900 || $mes > 12){ 
                $r = null;        
            } else {

                if(!checkdate($mes,$dia,$ano)){
                    $r = null;
                } else {
                    $r = "$ano-$mes-$dia";
                }

            } 

        } else {
            $r = null;
        }

        if($r == null && $padrao){ $r = $padrao;}

        return $r;      
    }
}