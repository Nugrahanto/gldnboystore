<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model { 
    public function get_category(){
        return $this->db->where('status_category', 1)
                        ->order_by('id_category', 'ASC')
				 		->get('tb_category')
				 		->result();
    }

    public function get_category_left(){
        return $this->db->where('tb_category.status_category', 1)
                        ->join('tb_subcategory', 'tb_subcategory.id_category = tb_category.id_category', 'left')
                        ->group_by('tb_category.id_category')
				 		->get('tb_category')
				 		->result();
    }

    public function get_subcategory(){
        return $this->db->where('status_subCategory', 1)
                        //->join('tb_category', 'tb_category.id_category = tb_subcategory.id_category')
                        // ->group_by('tb_category.id_category')
				 		->get('tb_subcategory')
				 		->result();
    }

    public function get_product_home(){
        return $this->db->where('tb_goods.status_goods', 1)
                        ->limit(8)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->join('tb_subcategory', 'tb_subcategory.id_category = tb_category.id_category', 'left')
                        ->group_by('tb_images.id_goods')
				 		->get('tb_goods')
				 		->result();
    }

    public function get_goods_cat($limit, $start, $name_category){
        if ($name_category != "limited-edition" && $name_category != "women"){
            return $this->db->limit($limit, $start)
                        ->where('tb_goods.status_goods', 1)
                        ->where('tb_category.name_category', $name_category)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
				 		->get('tb_category')
                        ->result();
        } else {
            return $this->db->limit($limit, $start)
                        ->where('tb_category.name_category', $name_category)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
				 		->get('tb_category')
                        ->result();
        }
    }

    public function get_goods_subcat($limit, $start, $name_category, $name_subCategory){
        if ($name_category != "women"){
            return $this->db->where('tb_goods.status_goods', 1)
                        ->limit($limit, $start)
                        ->where('tb_category.name_category', $name_category)
                        ->where('tb_subcategory.name_subCategory', $name_subCategory)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->join('tb_subcategory', 'tb_subcategory.id_subCategory = tb_goods.id_subCategory')
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->group_by('tb_images.id_goods')
				 		->get('tb_category')
                        ->result();
        } else {
            return $this->db->limit($limit, $start)
                        ->where('tb_category.name_category', $name_category)
                        ->where('tb_subcategory.name_subCategory', $name_subCategory)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->join('tb_subcategory', 'tb_subcategory.id_subCategory = tb_goods.id_subCategory')
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->group_by('tb_images.id_goods')
				 		->get('tb_category')
                        ->result();
        }
    }

    public function get_goods_image($id_goods){
        return $this->db->where('tb_goods.name_goods', $id_goods)
                        ->join('tb_goods', 'tb_goods.id_goods = tb_images.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->get('tb_images')
                        ->result();
    }

    public function get_goods_det($name_goods){
        return $this->db->where('tb_goods.name_goods', $name_goods)
                        ->join('tb_stock', 'tb_stock.id_goods = tb_goods.id_goods')
                        ->join('tb_subcategory', 'tb_subcategory.id_subCategory = tb_goods.id_subCategory', 'left')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
				 		->get('tb_goods')
                        ->row();
    }

    public function get_goods_other($name_goods, $name_category){
        if ($name_category != "limited-edition" && $name_category != "women"){
            return $this->db->where('tb_goods.name_goods !=', $name_goods)
                        ->where('tb_category.name_category', $name_category)
                        ->where('tb_goods.status_goods', 1)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
                        ->get('tb_goods')
                        ->result();
        } else {
            return $this->db->where('tb_goods.name_goods !=', $name_goods)
                        ->where('tb_category.name_category', $name_category)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
                        ->get('tb_goods')
                        ->result(); 
        }
    }

    public function get_goods_other_products($name_goods){
        return $this->db->where('tb_goods.name_goods !=', $name_goods)
                        ->where('tb_goods.status_goods', 1)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
                        ->get('tb_goods')
                        ->result();
    }

    public function get_goods_other_sale($name_goods){
        return $this->db->where('tb_goods.name_goods !=', $name_goods)
                        ->where('tb_goods.id_promo !=', 0)
                        ->where('tb_goods.status_goods', 1)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
                        ->get('tb_goods')
                        ->result();
    }

    public function total_records_collection($name_category){
        if ($name_category != "limited-edition" && $name_category != "women"){
            return $this->db->where('tb_goods.status_goods', 1)
                        ->where('tb_category.name_category', $name_category)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->from('tb_category')
						->count_all_results();
        } else {
            return $this->db->where('tb_category.name_category', $name_category)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->from('tb_category')
						->count_all_results();
        }
    }

    public function total_records_collection_subcat($name_category, $name_subCategory){
        if ($name_category != "women"){
            return $this->db->where('tb_goods.status_goods', 1)
                        ->where('tb_category.name_category', $name_category)
                        ->where('tb_subcategory.name_subCategory', $name_subCategory)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->join('tb_subcategory', 'tb_subcategory.id_subCategory = tb_goods.id_subCategory')
                        ->from('tb_category')
                        ->count_all_results();
        } else {
            return $this->db->where('tb_category.name_category', $name_category)
                        ->where('tb_subcategory.name_subCategory', $name_subCategory)
                        ->join('tb_goods', 'tb_goods.id_category = tb_category.id_category')
                        ->join('tb_subcategory', 'tb_subcategory.id_subCategory = tb_goods.id_subCategory')
                        ->from('tb_category')
                        ->count_all_results();
        }
    }

    public function total_records_collection_all(){
        return $this->db->where('tb_goods.status_goods', 1)
				 		->from('tb_goods')
				 		->count_all_results();
    }

    public function get_goods_collection_all($limit, $start){
        return $this->db->limit($limit, $start)
                        ->where('tb_goods.status_goods', 1)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
                        ->get('tb_goods')
                        ->result();
    }

    public function total_records_collection_sale(){
        return $this->db->where('tb_goods.status_goods', 1)
                        ->where('tb_goods.id_promo !=', 0)
				 		->from('tb_goods')
				 		->count_all_results();
    }

    public function get_goods_collection_sale($limit, $start){
        return $this->db->limit($limit, $start)
                        ->where('tb_goods.status_goods', 1)
                        ->where('tb_goods.id_promo !=', 0)
                        ->order_by('tb_goods.id_goods', 'DESC')
                        ->join('tb_images', 'tb_images.id_goods = tb_goods.id_goods')
                        ->join('tb_category', 'tb_category.id_category = tb_goods.id_category')
                        ->join('tb_promo', 'tb_promo.id_promo = tb_goods.id_promo')
                        ->group_by('tb_images.id_goods')
                        ->get('tb_goods')
                        ->result();
    }

    public function get_instagram() {
        return $this->db->order_by('nomor', 'ASC')
                        ->get('tb_images_instagram')
                        ->result();
    }
}