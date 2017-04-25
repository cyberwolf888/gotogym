<?php

namespace Mini\Core;

class Controller
{

    /*--------------------------------------- bagian untuk mengelola tampilan ------------------------------------*/
    protected function view($data = array(),$params = array())
    {

        if(!is_null($params)){
            extract($params);
        }

        //memasukan css ke header (nama variable jangan dirubah!)
        if(isset($data['plugin_css']))
            $plugin_css = APP . $data['plugin_css'];

        if(isset($data['page_css']))
            $page_css = APP . $data['page_css'];

        //memasukan script ke footer (nama variable jangan dirubah!)
        if(isset($data['plugin_script']))
            $plugin_script = APP . $data['plugin_script'];

        if(isset($data['page_script']))
            $page_script = APP . $data['page_script'];

        //memanggil tampilan
        if(isset($data['header']))
            require APP . $data['header'];

        if(isset($data['content']))
            require APP . $data['content'];

        if(isset($data['footer']))
            require APP . $data['footer'];
    }
}