<?php
class Friend_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function is_friends($id_1, $id_2)
    {
        $query = $this->db->select('*')->from('friends')
            ->group_start()
                ->where('id_1', $id_1)
                ->where('id_2', $id_2)
            ->group_end()
            ->or_group_start()
                ->where('id_2', $id_1)
                ->where('id_1', $id_2)
            ->group_end()
            ->get();
        $row = $query->row();
        if(isset($row)) return TRUE;
        return FALSE;
    }

    public function make_friends($id_1, $id_2)
    {
        $data = array(
            'id_1' => $id_1,
            'id_2' => $id_2
        );
        $this->db->insert('friends', $data);
    }

    public function remove_friends($id_1, $id_2)
    {
        $this->db
            ->group_start()
                ->where('id_1', $id_1)
                ->where('id_2', $id_2)
            ->group_end()
            ->or_group_start()
                ->where('id_2', $id_1)
                ->where('id_1', $id_2)
            ->group_end()
        ->delete('friends');
    }

    public function send_request($sender, $receiver)
    {
        $data = array(
            'sender' => $sender,
            'receiver' => $receiver
        );

        $this->db->insert('friend_requests', $data);
    }

    public function accept_request($sender, $receiver)
    {
        $query = $this->db->select('*')->from('friend_requests')
            ->where('sender', $sender)->where('receiver', $receiver)->get();

        if($query->row() == NULL) show_404();

        $this->db->where('sender', $sender)->where('receiver', $receiver)->delete('friend_requests');
        $this->make_friends($sender, $receiver);
    }

    public function reject_request($user, $friend)
    {
        $this->db->where('sender', $sender)->where('receiver', $receiver)->delete('friend_requests');
    }

    public function get_friend_list($user)
    {
        $query_1 = $this->db->select('id_1 as id, timestamp')->from('friends')
            ->where('id_2', $user)->get();
        $result_1 = $query_1->result();

        $query_2 = $this->db->select('id_2 as id, timestamp')->from('friends')
            ->where('id_1', $user)->get();
        $result_2 = $query_2->result();

        return array_merge($result_1, $result_2);
    }

    public function get_friend_id_array($user)
    {
        $friend_list = $this->get_friend_list($user);
        $friend_id_array = array();
        foreach ($friend_list as $id)
        {
            $friend_id_array[] = $id->id;
        }

        return $friend_id_array;
    }

    public function get_request_list($user)
    {
        $query = $this->db->select('*')->from('friend_requests')
        ->where('receiver', $user)->get();

        return $query->result();
    }

}
