<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of tagmodel
 *
 * @author http://roytuts.com
 */
class TagModel extends CI_Model {

    private $blog_tags = 'tags';

    function __construct() {
        
    }

    function add_blog_tags($tags) {
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $tag_array = array('tag_name' => $tag);
                $this->db->insert($this->blog_tags, $tag_array);
            }
            return TRUE;
        }
        return NULL;
    }

}