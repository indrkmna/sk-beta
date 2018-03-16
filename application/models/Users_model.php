<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    var $table = 'users';

    //set column field database for datatable orderable
    var $column_order = array('oauth_provider','ouath_id','package_id','first_name','last_name','email','gender','locale','picture_url','level','created','modified',null);
    
    //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $column_search = array('first_name','last_name'); 
    
    // default order 
    var $order = array('user_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        $i = 0;
    
        // loop column 
        foreach ($this->column_search as $item) 
        {
            // if datatable send POST for search
            if($_POST['search']['value']) 
            {

                // first loop
                if($i===0) 
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('user_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    // Edit User
    public function edit($data) {
        $this->db->where('user_id',$data['user_id']);
        $this->db->update('users',$data);
    }       

    public function delete_by_id($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete($this->table);
    }
 

    function createUser($data1){
        $this->db->insert('users', $data1);
        return $this->db->insert_id();
    }


    // Listing Users
    public function listUsers() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('user_id','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }    

    // Get User End
    public function getUserEnd() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('user_id','DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result_array();
    }          
 

    // Detail
    public function detail($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return $query->row_array();
    }          
    
    // Detail Profile
    public function profile($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $query->row_array();
    }    

    // Register
    function registerStudent($data)
    {
        return $this->db->insert('users', $data);
    }       

    //send verification email to user's email id
    function sendEmail($to_email)
    {
        $from_email = 'noreply@sedotkode.com';
        $subject = 'Silahkan Konfirmasi Link Verifikasi';
        $message = 'Kepada User,<br /><br />Tolong untuk mengkonfirmasi link verifikasi .<br /><br /> http://www.sedotkode.com/beta/register/verify/' . md5($to_email) . '<br /><br /><br />Terima Kasih<br />';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'iix3.cloudhost.id'; //smtp host name
        $config['smtp_port'] = '587'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'sample123@'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Sedotkode');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }  

    public function check_user($username) {
        $qry = "SELECT count(*) as cnt from users where username= ?";
        $res = $this->db->query($qry,array($username))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

}
