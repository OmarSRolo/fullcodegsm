<?php


class User_model extends MY_Model
{

    public $before_get = array('before_get');
    public $after_get = array('after_get');

    public $before_create = array('before_create');
    public $after_create = array('after_create');

    public $before_update = array('before_update');
    public $after_update = array('after_update');

    public $before_delete = array('before_delete');
    public $after_delete = array('after_delete');


    public function __construct()
    {
        parent::__construct();
        $this->_table = 'users';

        $this->validate = array(
            array('field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email|is_unique[' . $this->_table . '.email]',
            ),
            array('field' => 'username',
                'label' => 'username',
                'rules' => 'required|is_unique[' . $this->_table . '.username]'),
            array('field' => 'password',
                'label' => 'password',
                'rules' => 'required|min_length[7]')
        );
    }

    /*************Callback******************/
    protected function before_get()
    {

    }

    protected function after_get($row)
    {
        if (isset($row)) {
            unset($row['password']);

        }

        return $row;
    }

    protected function before_create($row)
    {
        $this->db->trans_start();
        if (!empty($row['password'])) {
            $this->tmp_password = $row['password'];
            $row['password'] = sha1($row['password']);
        }

        $row['created'] = date('Y-m-d H:i:s');
        return $row;
    }

    protected function after_create($row)
    {
        $this->db->trans_complete();
        return $row;
    }

    protected function before_update($row)
    {
        $this->db->trans_start();

        if (!empty($row['password'])) {
            $row['password'] = sha1($row['password']);
        }

        $row['updated_at'] = date('Y-m-d H:i:s');
        return $row;
    }

    protected function after_update($row)
    {
        $this->db->trans_complete();
        return $row;
    }

    protected function before_delete($row)
    {
        $this->db->trans_start();
        return $row;
    }

    protected function after_delete($row)
    {
        $this->db->trans_complete();
        return $row;
    }

}
