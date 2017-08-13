<?php
class Pokemons_model extends CI_Model {

	public function __construct()
        {
                $this->load->database();
        }

	public function get_pokemons($slug = FALSE)
	{

	        if ($slug === FALSE)
	        {
	                $query = $this->db->get('pokemon_t');
	       
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('pokemon_t', array('pokemon_id' => $slug));
	        return $query->row_array();
	}

	public function search_pokemons($slug)
	{

		$this->db->like('pokemon_name', $slug);
		$query = $this->db->get('pokemon_t');

	    return $query->result_array();
	}

	// public function get_color($slug)
	// {
	//         $this->db->select('t.type_hexcolor');
	//         $this->db->from('pokemon_t p');
	//         $this->db->join('pokemon_type_t pt');
	//         $this->db->on('p.pokemon_id=pt.pokemon_id');
	//         $this->db->join('type_t t');
	//         $this->db->on('pt.type_id=t.type_id');
	//         $this->db->where('p.pokemon_id' = $slug);
	//         $query = $this->db->get();
	//         return $query->result_array();
	// }
}