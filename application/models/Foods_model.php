<?php

class Foods_model extends CI_Model {

    public function add_foods($insertData) {
        if ($this->db->insert('foods', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_foods($IfoodsId = 0) {
        if ($IfoodsId != 0) {
            $this->db->where('foods_id', $IfoodsId);
        }
        $objQuery = $this->db->get('foods');
        return $objQuery->result_array();
    }

    public function get_foods_img($hiddenID = 0) {
        if ($hiddenID != 0) {
            $this->db->where('foods_id', $hiddenID);
        }
        $objQuery = $this->db->get('foods');
        return $objQuery->result_array();
    }

    public function update_foods($IfoodsId, $updateData) {
        $this->db->where('foods_id', $IfoodsId);
        if ($this->db->update('foods', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_foods($IfoodsId) {
        $this->db->where('foods_id', $IfoodsId);
        if ($this->db->delete('foods')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_foods_name($IfoodsId = 0) {
        if ($IfoodsId != 0) {
            $this->db->where('foods_id', $IfoodsId);
        }
        $this->db->select('foods_id');
        $objQuery = $this->db->get('foods');

        foreach ($objQuery->result_array() as $key => $value) {
            $array[$value['foods_id']] = $key;
        }
        $datas = $array;
        //echo "<prE>";        print_r($datas); 
        // $a = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
        return array_rand($datas, 1);

        /*
          if ($IfoodsId != 0) {
          $this->db->where('foods_id', $IfoodsId);
          }
          $this->db->select('foods_id');
          $objQuery = $this->db->get('foods');
          foreach ($objQuery->result_array() as $key => $value) {
          $array[] = $value['foods_id'];
          }
          $datas = $array;

          // $a = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
          return array_rand($datas, 1);
         */
    }

    public function getFoodsDashboard($user_id) {

        $this->db->select('d.daily_id,d.daily_user_id,d.daily_type,d.daily_amount,d.daily_created_date,f.foods_id,f.foods_name,f.foods_image,f.foods_health_capicity,f.foods_status,f.foods_created_date,count(f.foods_name) as count_foods');
        //$this->db->select('ov.page_id , h.hotel_name, count(ov.page_id) as count_visit ');
        //$this->db->from('online_visitors as ov');
        $this->db->from('daily_earnings as d');
        $this->db->join('foods as f', 'f.foods_id = d.daily_amount');
        //$this->db->join('hotels as h', 'h.ID = ov.page_id');
        $this->db->where('daily_type', 'foods');
        $this->db->where('d.daily_user_id', $user_id);
        $this->db->where('d.daily_earning_status', 1);
        $this->db->group_by('f.foods_name');
        $this->db->order_by('d.daily_id', "asc");

        $objQuery = $this->db->get();
        //if ($objQuery->num_rows() > 0) {
        return $objQuery->result_array();
        //} else {
        //  return FALSE;
        //}
        //echo $this->db->last_query(); die;
    }

    public function getFoodsDashboardImage($user_id, $getFoodid) {

        $this->db->select('d.daily_id,d.daily_user_id,d.daily_type,d.daily_amount,d.daily_created_date,f.foods_id,f.foods_name,f.foods_image,f.foods_health_capicity,f.foods_status,f.foods_created_date,count(f.foods_name) as count_foods');
        //$this->db->select('ov.page_id , h.hotel_name, count(ov.page_id) as count_visit ');
        //$this->db->from('online_visitors as ov');
        $this->db->from('daily_earnings as d');
        $this->db->join('foods as f', 'f.foods_id = d.daily_amount');
        //$this->db->join('hotels as h', 'h.ID = ov.page_id');
        $this->db->where('daily_type', 'foods');
        $this->db->where('d.daily_user_id', $user_id);
        $this->db->where('d.daily_id', $getFoodid);
        $this->db->group_by('f.foods_name');
        $this->db->order_by('d.daily_id', "asc");

        $objQuery = $this->db->get();
        if ($objQuery->num_rows() > 0) {
            return $objQuery->result_array();
        } else {
            return FALSE;
        }
        //echo $this->db->last_query(); die;
    }

    /**
     * updateUserHealth
     *
     * @uses        using this we can get first old health capacity and than update player health capacity.
     * @author      Webiots_m     
     */
    public function updateUserHealth($user_id, $updateData) {
        $this->db->where('id', $user_id);
        if ($this->db->update('users', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_total_foods($userId) {
        $this->db->select('*');
        $this->db->select('COUNT(daily_amount) AS daily_amount', FALSE);
        $this->db->where('daily_type','foods');
        $this->db->where('daily_user_id',$userId);
        $this->db->where('daily_earning_status',1);        
        $objQuery = $this->db->get('daily_earnings');
        return $objQuery->row_array();
        
        
    }

}
