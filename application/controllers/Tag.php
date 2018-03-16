<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of TagController
 *
 * @author http://roytuts.com
 */
class Tag extends CI_Controller {

    private $error;
    private $success;

    function __construct() {
        parent::__construct();
        $this->load->model('tagmodel', 'tag');
        $this->load->library('form_validation');
    }

    private function handle_error($msg) {
        $this->error .= '<p>' . $msg . '</p>';
    }

    private function handle_success($msg) {
        $this->success .= '<p>' . $msg . '</p>';
    }

    function index() {
        if ($this->input->post('add_tags')) {
            $this->form_validation->set_rules('blog_tags', 'Tags', 'trim|required');

            $blog_tags = $this->input->post('blog_tags', TRUE);

            $blog_related_tags = '';
            if (is_array(str_split($blog_tags)) && count(str_split($blog_tags)) > 2) {
                $blog_tags = $this->format_tags_keywords($blog_tags);
                $blog_related_tags = explode('$', $blog_tags);
            } else {
                $this->handle_error('Enter Tags');
            }

            if ($this->form_validation->run($this)) {
                $resp = $this->tag->add_blog_tags($blog_related_tags);
                if ($resp === TRUE) {
                    $this->handle_success('Tags are added successfully');
                }
            }

            $data['blog_tags'] = $blog_related_tags;
        }
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        $this->load->view('tag_view', $data);
    }

    private function format_tags_keywords($string) {
        preg_match_all('`(?:[^,"]|"((?<=\)"|[^"])*")*`x', $string, $result);
        $tags = '';
        foreach ($result as $arr) {
            $i = 0;
            foreach ($arr as $val) {
                if ($i % 2 == 1) {
                    $i++;
                    continue;
                }
                $tags .= $val . '$';
                $i++;
            }
            $tags = str_replace('[', '', $tags);
            $tags = str_replace(']', '', $tags);
            $tags = rtrim($tags, '$');
            $tags = str_replace('"', '', $tags);
            break;
        }
        return $tags;
    }

}