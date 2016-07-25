<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
	 *Dynamically add Javascript files to header page
	 * Note: This function creats config variable of all js files
	 *
	 * @access    public
	 * @param    string (file name)
	 */
	 
if(!function_exists('add_js')){
    function add_js($file='',$sLocation='header',$include_default_js='yes'){	
        $str = '';
        $ci = &get_instance();
        $header_js  = $ci->config->item('header_js');
		$footer_js  = $ci->config->item('footer_js');
		
        if($include_default_js=='no'){
			$footer_js=array();
		}
		
		if(empty($file)){
            return;
        }
		
		if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
			if($sLocation == 'footer') {
				foreach($file AS $item){
					if(!in_array($item, $footer_js)) {
						  $footer_js[] = $item;
					}              
				}
				$ci->config->set_item('footer_js',$footer_js);
			}
			else {
				foreach($file AS $item){
					if(!in_array($item, $header_js)) {
						  $header_js[] = $item;
					}              
				}
				$ci->config->set_item('header_js',$header_js);
			}
            
        }else{
            $str = $file;
			if($sLocation == 'footer') {
				if(!in_array($str, $footer_js)) {
					$footer_js[] = $str;
				}
				$ci->config->set_item('footer_js',$footer_js);
		
			}
			else {
				if(!in_array($str, $header_js)) {
					$header_js[] = $str;
				}
				$ci->config->set_item('header_js',$header_js);
			}
        }
		//echo '<pre>';print_r($footer_js);exit;
		
    }
}


/**
	 *Dynamically add css files to header page
	 * Note: This function creats config variable of all css files
	 *
	 * @access    public
	 * @param    string (file name)
	 */
if(!function_exists('add_css')){
    function add_css($file='')     {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if(empty($file)){			
            return;
        }

        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   			
				if(!in_array($item, $header_css)) {
					$header_css[] = $item;
				}              
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
			if(!in_array($str, $header_css)) {
				$header_css[] = $str;
			}
            $ci->config->set_item('header_css',$header_css);
        }
    }
}

/**
	 * 
	 * Note: This function prints all css files
	 *
	 * @access    public
	*/
	 
if(!function_exists('put_css')){
	
    function put_css()
    {		
		$ci = &get_instance();
       	$ci->load->library('carabiner');
		// add a css file
		$header_css   = $ci->config->item('header_css');
		if(is_array($header_css) and !empty($header_css)) {
			foreach($header_css as $sCSSFile) {
				$ci->carabiner->css($sCSSFile);
			}
		}
		
		$str=$ci->carabiner->display('css');			
    }
}

/**
	 * 
	 * Note: This function prints all header js files
	 *
	 * @access    public
	 */
	 
if(!function_exists('put_js')){
    function put_js()     {
		$ci = &get_instance();
       	$ci->load->library('carabiner');
		// add a css file
		$header_js   = $ci->config->item('header_js');
		if(is_array($header_js) and !empty($header_js)) {
			foreach($header_js as $sJSFile) {
				$ci->carabiner->js($sJSFile);
			}
		}
		$ci->carabiner->display('js');	
    }
}


/**
	 * 
	 * Note: This function prints all footer js files
	 *
	 * @access    public
	 */
	 
if(!function_exists('put_footer_js')){
    function put_footer_js()     {
		$ci = &get_instance();
       	$ci->load->library('carabiner');
		// add a css file
		$footer_js   = $ci->config->item('footer_js');		
		if(is_array($footer_js) and !empty($footer_js)) {
			foreach($footer_js as $sJSFile) {
				$ci->carabiner->js($sJSFile);
			}
		}
		$ci->carabiner->display('js');	
    }
}


?>
