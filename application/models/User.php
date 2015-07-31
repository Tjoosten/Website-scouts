<?php

class User extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*')
                 ->from('users')
                 ->where('Mail = '."'".$username."'")
                 ->where('password = '."'".MD5($password)."'")
                 ->where('Blocked', '0')
                 ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function setLoginStamp()
    {
        $session = $this->session->userdata('logged_in');
        $this->db->where('id', $session['id'])
            ->update('users', ['last_seen' => time()]);
    }

    public function setOnline()
    {
        $session = $this->session->userdata('logged_in');

        $this->db->where('id', $session['id'])
            ->update('users', ['online' => 'Y']);
    }

    public function setOffline()
    {
        $session = $this->session->userdata('logged_in');

        $this->db->where('id', $session['id'])
            ->update('users', ['online' => 'N']);
    }

    public function getProfile()
    {
        $this->db->select('*')
            ->where('id', $this->uri->segment(3));

        $query = $this->db->get('users');

        return $query->result();
    }

    public function reset_pass()
    {
        $this->db->select('*')
                 ->from('users')
                 ->where('Mail', $this->input->post('recovery'));

        $Query = $this->db->get();

        return $Query->result();
    }

    public function insert_new($New)
    {
        $Values = [
            'password' => md5($New['New']),
        ];

        $this->db->where('Mail', $this->input->post('recovery'))
                 ->update('users', $Values);
    }

    public function permissions($user_id)
    {
        $this->db->select('*')
            ->from('Permissions')
            ->where('user_id', $user_id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
