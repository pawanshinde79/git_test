<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        
        $config['use_page_numbers'] = TRUE;		
		$config['base_url'] = base_url();		
		
		$config['per_page'] = 10;		
        $config['num_links'] = 2;		
        $config['cur_tag_open'] = '<a class="active">';
        $config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';		
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
      
		
