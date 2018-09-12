<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin_model
 * @property CI_DB $db
 */

class Admin_model extends CI_Model
{
    function insert_data($into, $data) {
        $this->db->insert($into, $data);
        return $this->db->affected_rows() > 0;
    }

    function select($from) {
        return $this->db
            ->get($from);
    }

    function select_from($from, $where, $is) {
        return $this->db
            ->where($where, $is)
            ->get($from);
    }

    function delete($form, $where, $is) {
        $this->db
            ->where($where, $is)
            ->delete($form);
        return $this->db->affected_rows() > 0;
    }

    function update($where, $is, $into, $data)
    {
        $this->db
            ->where($where, $is)
            ->update($into, $data);
        return $this->db->affected_rows() > 0;
    }
}