<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');


class User_model extends Model
{

    # Find tuples
    public function search($search) {
        
        $res = $this->db->table('rav_users')
            ->like('rav_first_name', "%$search%")
            ->or_like('rav_last_name', "%$search%")
            ->or_like('rav_email', "%$search%")
            ->or_like('rav_gender', "%$search%")
            ->or_like('rav_address', "%$search%")
            ->get_all();

        return $res;
    }

    # Insert tuple
    public function create($fname, $lname, $email, $gender, $address)
    {
        $data = [
            'rav_last_name' => $lname,
            'rav_first_name' => $fname,
            'rav_email' => $email,
            'rav_gender' => $gender,
            'rav_address' => $address
        ];

        return $this->db->table('rav_users')->insert($data);
    }

    # Get all users
    public function get_users()
    {
        return $this->db->table('rav_users')->get_all();
    }

    # Update a user
    public function update_user($id, $fname, $lname, $email, $gender, $address)
    {
        $data = [
            'rav_last_name' => $lname,
            'rav_first_name' => $fname,
            'rav_email' => $email,
            'rav_gender' => $gender,
            'rav_address' => $address
        ];
        
        return $this->db->table('rav_users')->where('id', $id)->update($data);
    }

    # Delete a user
    public function delete_user($id) 
    {
        return $this->db->table('rav_users')->where('id', $id)->delete();
    }

}
