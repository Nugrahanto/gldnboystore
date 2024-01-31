<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_category(){
        return $this->db->where('status_category', 1)
                        ->order_by('id_category', 'ASC')
				 		->get('tb_category')
				 		->result();
    }

    public function get_all_category(){
        return $this->db->order_by('id_category', 'ASC')
				 		->get('tb_category')
				 		->result();
    }

    public function get_subCat($id_category){
        return $this->db->where('id_category', $id_category)
                        ->where('status_subCategory', 1)
                        ->order_by('id_subCategory', 'ASC')
				 		->get('tb_subcategory')
				 		->result();
    }

    public function get_all_subcategory($id_category){
        return $this->db->where('id_category', $id_category)
                        ->order_by('id_subCategory', 'ASC')
				 		->get('tb_subcategory')
				 		->result();
    }
    
    public function get_promo(){
        $current_date = date('Y-m-d');
        return $this->db->where('end_promo >=', $current_date)
                        ->order_by('id_promo', 'ASC')
                        ->order_by('status_promo', 'DESC')
				 		->get('tb_promo')
				 		->result();
    }

    public function add_promo()
    {
        $name_promo = $this->input->post('name_promo');
        $value_promo = $this->input->post('value_promo');
        $start_promo = $this->input->post('start_promo');
        $end_promo = $this->input->post('end_promo');

        $data = array(
            'id_promo' 		=> NULL, 
            'name_promo'	=> $name_promo,
            'start_promo'	=> date('Y-m-d', strtotime($start_promo)),
            'end_promo'	    => date('Y-m-d', strtotime($end_promo)),
            'value_promo'	=> $value_promo,
            'status_promo'	=> 1
            );
        $this->db->insert('tb_promo', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_goods($id_category){
        // if(is_numeric($id_category)){
        //     //print_r($id_category + " if");
        //     return $this->db->order_by('id_goods', 'DESC')
        //                 ->where('tb_category.id_category', $id_category)
        //                 ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
		// 		 		->get('tb_category')
        //                  ->result();
        // } else {
        //     //print_r($id_category + " else");
        //     return $this->db->order_by('id_goods', 'DESC')
        //                 ->where('tb_category.name_category', $id_category)
        //                 ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
		// 		 		->get('tb_category')
        //                  ->result();
        // }
        return $this->db->order_by('id_goods', 'DESC')
                        ->where('tb_category.name_category', $id_category)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
				 		->get('tb_category')
                         ->result();
    }

    public function get_goods_det($id_goods){
            return $this->db->where('tb_goods.id_goods', $id_goods)
                        ->join('tb_stock', 'tb_stock.id_goods = tb_goods.id_goods')
                        ->join('tb_subcategory', 'tb_subcategory.id_subCategory = tb_goods.id_subCategory', 'left')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
				 		->get('tb_goods')
                        ->row();
    }

    public function get_goods_image($id_goods, $title){
        if ($title == "detail"){
            return $this->db->where('tb_images.id_goods', $id_goods)
                            ->where('tb_images.status_images', 1)
                            ->join('tb_goods', 'tb_goods.id_goods = tb_images.id_goods')
                            ->get('tb_images')
                            ->result();
        } else {
            return $this->db->where('tb_images.id_goods', $id_goods)
                            ->join('tb_goods', 'tb_goods.id_goods = tb_images.id_goods')
                            ->get('tb_images')
                            ->result();
        }
    }

    public function add_goods($images){
        $name = $this->input->post('name_goods');
        $price = $this->input->post('price_goods');
        $desc = $this->input->post('desc_goods');
        $status = 1;
        $id_category = $this->input->post('id_category');
        $id_subCategory = $this->input->post('id_subCat');
        $id_promo = $this->input->post('id_promo');
        $size_S = $this->input->post('sizeS');
        $size_M = $this->input->post('sizeM');
        $size_L = $this->input->post('sizeL');
        $size_XL = $this->input->post('sizeXL');
        $stockOther = $this->input->post('stockOther');

        if($id_subCategory == "0"){
            $id_subCategory = "";
        }

        $data = array(
            'id_goods'   	=> NULL, 
            'name_goods'	=> $name,
            'price_goods'	=> $price,
            'desc_goods'	=> $desc,
            'status_goods'	=> $status,
            'id_category'	=> $id_category,
            'id_subCategory'=> $id_subCategory,
            'id_promo'  	=> $id_promo
			);
        $this->db->insert('tb_goods', $data);
        
        $lastId = $this->db->insert_id();

        $dataSize = array(
			'id_stock' 	=> NULL, 
            'S'	        => $size_S,
            'M'	        => $size_M,
            'L'	        => $size_L,
            'XL'	    => $size_XL,
            'other'     => $stockOther,
            'id_goods'  => $lastId
			);
        $this->db->insert('tb_stock', $dataSize);

        foreach($images as $p_index=>$p_value) {
            $this->db->insert('tb_images', 
                array(
                    'id_images'     => NULL,
                    'name_images'   => $p_value['name_images'],
                    'status_images' => 1,
                    'id_goods'      => $lastId
                )
            );
        }

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
    }

    public function edit_goods($id_goods)
    {
        $name = $this->input->post('name_goods');
        $price = $this->input->post('price_goods');
        $desc = $this->input->post('desc_goods');
        $id_category = $this->input->post('id_category');
        $id_subCategory = $this->input->post('id_subCat');
        $id_promo = $this->input->post('id_promo');
        $size_S = $this->input->post('sizeS');
        $size_M = $this->input->post('sizeM');
        $size_L = $this->input->post('sizeL');
        $size_XL = $this->input->post('sizeXL');
        $stockOther = $this->input->post('stockOther');
        $status = 1;

        if($id_subCategory == "0"){
            $id_subCategory = "";
        }

        $a=0;
        $b=0;

        if ($size_S == 0 && $size_M == 0 && $size_L == 0 && $size_XL == 0 && $stockOther == 0){
            if ($id_category != 2){
                $status = 0;
            }
        }

        $data = array(
            'name_goods'	=> $name,
            'price_goods'	=> $price,
            'desc_goods'	=> $desc,
            'status_goods'	=> $status,
            'id_category'	=> $id_category,
            'id_subCategory'=> $id_subCategory,
            'id_promo'  	=> $id_promo
            );
            
        $this->db->where('id_goods', $id_goods)
                 ->update('tb_goods', $data);

        if ($this->db->affected_rows() > 0) {
            $a = 1;
        } else{
            $a = 0;
        }

        $dataSize = array(
            'S'	        => $size_S,
            'M'	        => $size_M,
            'L'	        => $size_L,
            'XL'	    => $size_XL,
            'other'     => $stockOther,
            'id_goods'  => $id_goods
            );

        $this->db->where('id_goods', $id_goods)
                 ->update('tb_stock', $dataSize);

        if ($this->db->affected_rows() > 0) {
            $b = 1;
        } else{
            $b = 0;
        }

        if ($a == 1 || $b == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function status_images($id_images, $status_images){
        $status = 1;

        if ($status_images == 1){
            $status = 0;
        }

        //print_r($status);

        $data = array(
            'status_images' => $status,
            );

        $this->db->where('id_images', $id_images)
                 ->update('tb_images', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }

    public function status_category($id_category, $status_category){
        $status = 1;
        if ($status_category == 1){
            $status = 0;
        }

        $data = array(
            'status_category' => $status,
            );

        $this->db->where('id_category', $id_category)
                 ->update('tb_category', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }

    public function status_subCategory($id_category, $status_category){
        $status = 1;
        if ($status_category == 1){
            $status = 0;
        }

        $data = array(
            'status_subCategory' => $status,
            );

        $this->db->where('id_subCategory', $id_category)
                 ->update('tb_subcategory', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }

    public function status_promo($id_promo, $status_promo){
        $status = 1;
        if ($status_promo == 1){
            $status = 0;
        }

        $data = array(
            'status_promo' => $status,
            );

        $this->db->where('id_promo', $id_promo)
                 ->update('tb_promo', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }

    public function get_images_instagram()
    {
        return $this->db->get('tb_images_instagram')
                        ->result();
    }

    public function get_det_images_instagram($id)
    {
        return $this->db->where('id', $id)
                        ->get('tb_images_instagram')
                        ->row();
    }

    public function update_instagram()
    {
        $id = $this->input->post('id');
        $link_image = $this->input->post('link_image');
        $link_instagram = $this->input->post('link_instagram');
        $nomor = $this->input->post('nomor');

        $data = array(
            'nomor' 	    => $nomor,
            'link_image'	=> $link_image,
            'link_instagram'=> $link_instagram
            );
        $this->db->where('id', $id)
                 ->update('tb_images_instagram', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
