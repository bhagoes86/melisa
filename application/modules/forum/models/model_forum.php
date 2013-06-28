<?php

/*
 * Model Course
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_forum extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_themes() {
        $this->db->select('*');
        $this->db->from('table_site');
        return $this->db->get();
    }

    function select_users($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get();
    }

    function select_content($id_content, $type) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_content', $id_content);
        $this->db->where('type', $type);
        return $this->db->get();
    }

    function insert_wall($data) {
        $this->db->insert('wall', $data);
        return $this->db->insert_id();
    }

    function update_wall($id_wall, $data2) {
        $this->db->where('id_wall', $id_wall);
        $this->db->update('wall', $data2);
    }

    function delete_wall($id_wall) {
        $this->db->where('id_wall', $id_wall);
        $this->db->delete('wall');
    }

    function insert_broadcast($data) {
        $this->db->insert('broadcast', $data);
        return $this->db->insert_id();
    }

    function insert_tag($data) {
        $this->db->insert('tags', $data);
        return $this->db->insert_id();
    }

    function select_broadcast($content_id, $broadcast_type) {
        $this->db->select('*');
        $this->db->from('broadcast');
        $this->db->where('content_id', $content_id);
        $this->db->where('broadcast_type', $broadcast_type);
        return $this->db->get();
    }

    function select_tag($content_id, $tag_type) {
        $this->db->select('*');
        $this->db->from('tags');
        $this->db->where('content_id', $content_id);
        $this->db->where('tag_type', $tag_type);
        return $this->db->get();
    }

    function select_trending_tag() {
        return $this->db->query('SELECT count(tag) as jml, user_id, tag, tag_type from tags group by tag order by jml DESC limit 5');
    }

    function select_tag_join_content($tag) {
        $this->db->select('*');
        $this->db->from('tags');
        $this->db->join('content', 'content.id_content = tags.content_id');
        $this->db->join('users', 'users.id = content.user_id');
        $this->db->where('tags.tag', $tag);
        $this->db->group_by('id_content');
        return $this->db->get();
    }

    function select_wall_broadcast_first() {
        $this->db->select('*');
        $this->db->from('wall');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->order_by('id_wall', 'DESC');
        $this->db->limit(10);
        return $this->db->get();
    }

    function select_activity_first($user_id) {
        $this->db->select('*');
        $this->db->from('wall');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->where('wall.user_id', $user_id);
        $this->db->or_where('wall.user_idto', $user_id);
        $this->db->order_by('id_wall', 'DESC');
        $this->db->limit(2);
        return $this->db->get();
    }

    function select_user_info($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function select_wall_by_id($id_wall) {
        $this->db->select('*');
        $this->db->from('wall');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->where('wall.id_wall', $id_wall);
        return $this->db->get();
    }

    function select_content_log($user_id) {
        $this->db->select('*');
        $this->db->from('content_log');
        $this->db->join('content', 'content.id_content=content_log.content_id');
        $this->db->join('users', 'users.id=content.user_id');
        $this->db->where('content_log.user_id', $user_id);
        $this->db->group_by('content_log.content_id');
        return $this->db->get();
    }

    function select_content_bookmark($user_id) {
        $this->db->select('*');
        $this->db->from('content_bookmark');
        $this->db->join('content', 'content.id_content=content_bookmark.content_id');
        $this->db->join('users', 'users.id=content.user_id');
        $this->db->where('content_bookmark.user_id', $user_id);
        $this->db->group_by('content_bookmark.content_id');
        return $this->db->get();
    }

    function select_content_podcast() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->join('users', 'users.id=content.user_id');
        $type = array(0, 2, 3, 6);
        $this->db->where_in('content.type', $type);
        $this->db->where('content.show', 1);
        $this->db->order_by('content.id_content', 'DESC');
        return $this->db->get();
    }

    function select_content_document() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->join('users', 'users.id=content.user_id');
        $type = array(1, 4, 7);
        $this->db->where_in('content.type', $type);
        $this->db->where('content.show', 1);
        $this->db->order_by('content.id_content', 'DESC');
        return $this->db->get();
    }

    function select_content_presentation() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->join('users', 'users.id=content.user_id');
        $type = array(5);
        $this->db->where_in('content.type', $type);
        $this->db->where('content.show', 1);
        $this->db->order_by('content.id_content', 'DESC');
        return $this->db->get();
    }

    function select_content_by_id($id_content) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_content', $id_content);
        return $this->db->get();
    }

}