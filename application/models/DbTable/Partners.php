<?php
class Application_Model_DbTable_Partners extends Zend_Db_Table_Abstract
{
    protected $_name = 'partners';
    
    public function getPartner($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    
    public function updatePartner($id, $name, $email, $ac_man)
    {
        $data = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'account_manager' => $ac_man,
        );
        $this->update($data, 'id = '. (int)$id);
    }
    
    public function deletePartner($id)
    {
        $this->delete('id =' . (int)$id);
    }
    }