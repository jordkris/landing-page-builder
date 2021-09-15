<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_landingpage extends CI_Model
{
    public function getAll() {
        return $this->db->get('landingpage')->result_array();
    }
}
