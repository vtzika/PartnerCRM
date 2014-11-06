<?php
class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    
    public function getUser($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function addUser($username, $email, $password, $role)
    {
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            
        );
        $this->insert($data);
    }
    
    public function deleteUser($id)
    {
        $this->delete('id =' . (int)$id);
    }
    }