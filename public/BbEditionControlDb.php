<?php 
/**
 * Bb Edition Control Database
 *
 * Every database job is done by it.
 *
 * @package   BbEditionControl
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      https://github.com/bruno-barros/BB-Edition-Control-for-Wordpress
 * @copyright 2013 Bruno Barros
 */

class BbEditionControlDb {

    protected $table = 'bb_edition_control';

    public $rules = array(
        'date' => 'date|required',
        'name' => 'string|required',
        'slug' => 'string|required',
        'description' => 'string',
        'status' => 'number|required',
    );

    public function __construct()
    {
        global $wpdb;
    }

    /**
     * Return table name prefixed
     * @return string
     */
    public function getTable()
    {
        global $wpdb;
        return $wpdb->prefix . $this->table;
    }

    /**
     * Valida e salva dados de uma nova edição
     * @return string|bool String do erro, ou TRUE tudo OK
     */
    public function saveNewEdition($formData)
    {        
        if( $this->insert($formData) )
        {
            return true;        
        } else {
            throw new Exception("A nova edição não foi salva corretamente.");
        }
    }

    /**
     * Valida e atualiza dados de uma nova edição
     * @return string|bool String do erro, ou TRUE tudo OK
     */
    public function updateEdition($id, $formData)
    {        
        if( $this->update($id, $formData) )
        {
            return true;        
        } else {
            throw new Exception("A edição não foi atualizada corretamente.");
        }
    }


    /**
     * Insere dados na tabela bb_edition_cotrol
     * @param  array $array Dados da edição
     * @return bool
     */
    public function insert($array)
    {
        global $wpdb;
        $wpdb->show_errors();

        if(! is_array($array))
        {
            throw new InvalidArgumentException("O argumento deve ser array, mas \"".gettype($array)."\" foi passado.");
        }

        $date = Date::sql($array['date']);
        $name = $array['name'];
        $number = $array['number'];
        $slug = $array['slug'];
        $status = $array['status'];
        $desc = $array['description'];

        $wpdb->query( 
            $wpdb->prepare("INSERT INTO " . $this->getTable() . " VALUES (NULL, %s, %s, %s, %s, %d, %s)", 
                $date, $number, $name, $slug, $status, $desc)
            );

        return true;
    }

    /**
     * Atualiza um registro na tabela bb_edition_cotrol
     * @param  [type] $id    [description]
     * @param  [type] $array [description]
     * @return [type]        [description]
     */
    public function update($id, $array)
    {
        global $wpdb;
        $wpdb->show_errors();

        if(! is_array($array))
        {
            throw new InvalidArgumentException("O argumento deve ser array, mas \"".gettype($array)."\" foi passado.");
        }

        

        $date = Date::sql($array['date']);
        $name = $array['name'];
        $number = $array['number'];
        $slug = $array['slug'];
        $status = $array['status'];
        $desc = $array['description'];


        
        $wpdb->query( 
            $wpdb->prepare("UPDATE " . $this->getTable() . " SET date = %s, number = %s, name = %s, status = %d, description = %s  WHERE id = '{$id}'", 
                $date, $number, $name, $status, $desc)
            );

        return true;
    }

    /**
     * Retorna todas as edições
     * @return object
     */
    public function getAll()
    {
        global $wpdb;

        $l = $wpdb->get_results("SELECT * FROM {$this->getTable()} ORDER BY date DESC");

        return $l;
            
    }

    /**
     * Retorna todas as edições ativas
     * @return object
     */
    public function getActive()
    {
        global $wpdb;

        $l = $wpdb->get_results("SELECT * FROM {$this->getTable()} WHERE status = '1' ORDER BY date DESC");

        return $l;
            
    }


    /**
     * Retorna a edição pelo ID
     * @param  int $id
     * @return object
     */
    public function get($id = null)
    {
        global $wpdb;

        $l = $wpdb->get_results("SELECT * FROM {$this->getTable()} WHERE id={$id}");

        return ($l) ? $l[0] : null;
    }


    /**
     * Retorna o ID da edição do post
     * @param  object|int $post Pode ser o objeto ou o ID
     * @return int
     */
    public function getPostEditionId($post)
    {
        if( is_object($post))
        {
            $id = $post->ID;
        }
        else
        {
            $id = $post;
        }

        $metaVal = get_post_meta( $id, '_bb_edition_control', true);

        return ( is_numeric($metaVal) ) ? $metaVal : 0;
    }

    /**
     * Retorna objeto com dados da edição
     * @param  object|int $post ID ou objeto
     * @return object
     */
    public function getPostEdition($post)
    {
        $id = $this->getPostEditionId($post);
        return $this->get($id);
    }

    /**
     * Adiciona ou atualiza o metadado sobre a edição
     * @param  int $postId
     * @param  int $editionId
     * @return bool
     */
    public function savePostEdition($postId, $editionId = null)
    {
        /* Get the meta value of the custom field key. */
        $metaVal = get_post_meta( $postId, '_bb_edition_control', true );

        if($metaVal === '')
        {
            add_post_meta( $postId, '_bb_edition_control', $editionId, true );
        }
        else
        {
            update_post_meta( $postId, '_bb_edition_control', $editionId );
        }

    }

    /**
     * Gera as tabelas
     * @return void
     */
    public function createTable()
    {
        global $wpdb;
        $structure = "CREATE TABLE IF NOT EXISTS {$this->getTable()} (
        `id` int(9) NOT NULL AUTO_INCREMENT,
        `date` date NOT NULL,
        `number` int(9) NOT NULL,
        `name` varchar(255) NOT NULL,
        `slug` varchar(255) NOT NULL,
        `status` int(1) NOT NULL DEFAULT '0',
        `description` text NOT NULL,
        PRIMARY KEY (`date`),
        UNIQUE KEY `id` (`id`)
        );";
        $wpdb->query($structure);
    }

    /**
     * Remove tabela
     * @return void
     */
    public function dropTable()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE {$this->getTable()};");
    }

}