<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_site extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function show_record() {
        $this->db->select('*');
        $this->db->from('table_site');
        return $this->db->get();
    }

    //untuk semua update yang berbentuk text
    function data_update($header, $menu1, $menu2, $menu3, $caption, $footer, $bgheader, $bgfooter, $tgpicture1, $tgpicture2, $tgpicture3) {
        $this->db->set('header', $header);
        $this->db->set('menu1', $menu1);
        $this->db->set('menu2', $menu2);
        $this->db->set('menu3', $menu3);
        $this->db->set('caption', $caption);
        $this->db->set('footer', $footer);
        $this->db->set('bgfooter', $bgfooter);
        $this->db->set('bgheader', $bgheader);
        $this->db->set('tgpicture1', $tgpicture1);
        $this->db->set('tgpicture2', $tgpicture2);
        $this->db->set('tgpicture3', $tgpicture3);
        $this->db->update('table_site');
    }

    function header_update($header) {
        $this->db->set('header', $header);
        $this->db->update('table_site');
    }

    function bgheader_update($bgheader) {
        $this->db->set('bgheader', $bgheader);
        $this->db->update('table_site');
    }

    function footer_update($footer) {
        $this->db->set('footer', $footer);
        $this->db->update('table_site');
    }

    function bgfooter_update($bgfooter) {
        $this->db->set('bgfooter', $bgfooter);
        $this->db->update('table_site');
    }

    function caption_update($caption) {
        $this->db->set('caption', $caption);
        $this->db->update('table_site');
    }

    function menu1_update($menu1) {
        $this->db->set('menu1', $menu1);
        $this->db->update('table_site');
    }

    function menu2_update($menu2) {
        $this->db->set('menu2', $menu2);
        $this->db->update('table_site');
    }

    function menu3_update($menu3) {
        $this->db->set('menu3', $menu3);
        $this->db->update('table_site');
    }

    function tgpicture1_update($tgpicture1) {
        $this->db->set('tgpicture1', $tgpicture1);
        $this->db->update('table_site');
    }

    function tgpicture2_update($tgpicture2) {
        $this->db->set('tgpicture2', $tgpicture2);
        $this->db->update('table_site');
    }

    function tgpicture3_update($tgpicture3) {
        $this->db->set('tgpicture3', $tgpicture3);
        $this->db->update('table_site');
    }

    function update_smpicture($filename, $status) {
        if ($status == 1) {
            $this->db->set('smpicture1', $filename);
            $this->db->update('table_site');
        } elseif ($status == 2) {
            $this->db->set('smpicture2', $filename);
            $this->db->update('table_site');
        } else {
            $this->db->set('smpicture3', $filename);
            $this->db->update('table_site');
        }
    }

    function select_header_text() {
        $this->db->select('*');
        $this->db->from('table_site');
        return $this->db->get;
    }

}