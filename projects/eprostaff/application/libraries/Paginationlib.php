<?php
  /**
     *Initialize the pagination rules for cities page 
     * @return Pagination
     */
class Paginationlib {
    //put your code here
	private $ci;
    function __construct() {
         $this->ci =& get_instance();
    }
 
    public function initPagination($module_id,$base_url,$total_rows){
				
        $config['per_page']          = get_app_config($module_id,'row');
        $config['uri_segment']       = 3;
        $config['base_url']          = base_url().$base_url;
        $config['total_rows']        = $total_rows;
        $config['use_page_numbers']  = TRUE;
        $config['num_links'] = 1;		
		
        $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '
';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '';
        
	
        
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><a class='active'>";
        $config['cur_tag_close'] = "</a></span></li>";
        $this->ci->pagination->initialize($config);
        return $config;    
    }
    
}
?>
