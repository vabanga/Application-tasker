<?php

namespace application\models;

use application\core\Model;
use application\core\View;

class Main extends Model
{
    public $error;

    public function cardCount()
    {
        return $this->db->column('SELECT COUNT(id) FROM main');
    }

    public function cardList($route)
    {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => (($route['page'] ?? 1) - 1) * $max
        ];

        $arr = $this->db->row('SELECT * FROM main ORDER BY id DESC LIMIT :start, :max', $params);
        if(isset($route['sort']))
        {
            $column = $route['sort'];
            if($column == 'all' || $column == 'email' || $column == 'username' || $column == 'status')
            {
                if($column == 'all')
                {
                    $sortArr = $this->sort($arr, ["id"=>SORT_DESC]);
                }
                else
                {
                    $sortArr = $this->sort($arr, ["$column"=>SORT_ASC]);
                }
                return $sortArr;
            }
            else
            {
                header('HTTP/1.1 404 Not Found');
                View::errorCode(404);
            }
        }
        else
        {
            return $this->db->row('SELECT * FROM main ORDER BY id DESC LIMIT :start, :max', $params);
        }

    }

    public function sort($array, $cols)
    {
        $colarr = array();
        foreach ($cols as $col => $order) {
            $colarr[$col] = array();
            foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
        }
        $eval = 'array_multisort(';
        foreach ($cols as $col => $order) {
            $eval .= '$colarr[\''.$col.'\'],'.$order.',';
        }
        $eval = substr($eval,0,-1).');';
        eval($eval);
        $ret = array();
        foreach ($colarr as $col => $arr) {
            foreach ($arr as $k => $v) {
                $k = substr($k,1);
                if (!isset($ret[$k])) $ret[$k] = $array[$k];
                $ret[$k][$col] = $array[$k][$col];
            }
        }
        return $ret;
    }

    public function taskAdd($post) {
        if(isset($post['img']))
        {
            $params = [
                'name' => htmlspecialchars($post['name']),
                'email' => htmlspecialchars($post['email']),
                'text' => htmlspecialchars($post['text']),
                'img' => htmlspecialchars($post['img'])
            ];
            $this->db->query('INSERT INTO main (`username`, `email`, `text`, `img`) VALUES (:name, :email, :text, :img)', $params);
        }
        else
        {
            $params = [
                'name' => htmlspecialchars($post['name']),
                'email' => htmlspecialchars($post['email']),
                'text' => htmlspecialchars($post['text'])
            ];
            $this->db->query('INSERT INTO main (`username`, `email`, `text`) VALUES (:name, :email, :text)', $params);
        }

    }
}