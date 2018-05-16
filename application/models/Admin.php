<?php


namespace application\models;


use application\core\Model;

class Admin extends Model
{
    public $error;

    public function loginValidate($post) {
        $config = require 'application/config/admin.php';
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }

    public function isTasksExists($id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM main WHERE id = :id', $params);
    }

    public function taskData($id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM main WHERE id = :id', $params);
    }

    public function taskEdit($post, $id) {
        $params = [
            'id' => $id,
            'text' => $post['text'],
            'status' => $post['status']
        ];
        $this->db->query('UPDATE main SET text = :text, status = :status WHERE id = :id', $params);
    }
}