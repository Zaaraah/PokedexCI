<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Pokemons extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pokemons_model');
                $this->load->helper('url_helper');
                $this->load->helper('form_helper');
        }

        public function index()
        {
                if($this->session->userdata('logged_in'))
                {
                    $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];

                    $data['pokemons'] = $this->pokemons_model->get_pokemons();
                    // $data['color'] = $this->pokemons_model->get_color($data['pokemons']);

                    $data['title'] = 'All Pokémon';

                    $this->load->view('templates/header-index', $data);
                    $this->load->view('pokemons/index', $data);
                    $this->load->view('templates/footer');
                }
                else
                {
                     //If no session, redirect to login page
                     //redirect('login', 'refresh');

                    $data['pokemons'] = $this->pokemons_model->get_pokemons();

                    $data['title'] = 'All Pokémon';

                    $this->load->view('templates/header-index', $data);
                    $this->load->view('pokemons/index', $data);
                    $this->load->view('templates/footer');

                }    
        }

        public function search()
        {
                if($this->session->userdata('logged_in'))
                {
                    $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];
                    
                    $this->load->helper(array('form'));
                    $searchdata = $this->input->post('search');
                    $data['pokemons'] = $this->pokemons_model->search_pokemons($searchdata);

                    $data['title'] = ucfirst($searchdata);

                    $this->load->view('templates/header-search', $data);
                    $this->load->view('pokemons/index', $data);
                    $this->load->view('templates/footer');
                }
                else
                {
                     //If no session, redirect to login page
                     //redirect('login', 'refresh');

                    $this->load->helper(array('form'));
                    $searchdata = $this->input->post('search');
                    $data['pokemons'] = $this->pokemons_model->search_pokemons($searchdata);

                    $data['title'] = ucfirst($searchdata);

                    $this->load->view('templates/header-search', $data);
                    $this->load->view('pokemons/index', $data);
                    $this->load->view('templates/footer');
                }    
        }

        public function view($slug = NULL)
        {
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];

                $data['a_pokemon'] = $this->pokemons_model->get_pokemons($slug);
            
                if (empty($data['a_pokemon']))
                {
                    show_404();
                }

                $data['title'] = $data['a_pokemon']['pokemon_name'];

                $this->load->view('templates/header-mp', $data);
                $this->load->view('pokemons/view', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $data['a_pokemon'] = $this->pokemons_model->get_pokemons($slug);
            
                if (empty($data['a_pokemon']))
                {
                    show_404();
                }

                $data['title'] = $data['a_pokemon']['pokemon_name'];

                $this->load->view('templates/header-search', $data);
                $this->load->view('pokemons/view', $data);
                $this->load->view('templates/footer');
            }
        }

        public function logout()
        {
           $this->session->unset_userdata('logged_in');
           session_destroy();
           redirect('login', 'refresh');
        }

        public function mypokemon()
        {

                if($this->session->userdata('logged_in'))
                {
                    $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];
                    $_SESSION['user'] = $session_data['id'];

                    $this->load->view('templates/header-mp', $data);
                    $this->load->view('users/mypokemon', $_SESSION);
                    $this->load->view('templates/footer');
                }
                else
                {
                     //If no session, redirect to login page
                     redirect('login', 'refresh');
                }    
        }

        public function myfiles()
        {

                if($this->session->userdata('logged_in'))
                {
                    $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];
                    $_SESSION['user'] = $session_data['id'];

                    $this->load->view('templates/header-mp', $data);
                    $this->load->view('users/myfiles', $_SESSION);
                    $this->load->view('templates/footer');
                }
                else
                {
                     //If no session, redirect to login page
                     redirect('login', 'refresh');
                }    
        }
}