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

    protected function flash( $name = '', $message = '', $class = 'alert-success' )
    {
        //We can only do something if the name isn't empty
        if( !empty( $name ) )
        {
            //No message, create it
            if( !empty( $message ) && empty( $_SESSION[$name] ) )
            {
                if( !empty( $_SESSION[$name] ) )
                {
                    unset( $_SESSION[$name] );
                }
                if( !empty( $_SESSION[$name.'_class'] ) )
                {
                    unset( $_SESSION[$name.'_class'] );
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;
            }
            //Message exists, display it
            elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
            {
                $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'alert-success';

                //echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                echo '<div class="alert alert-block '.$class.' fade in">';
                echo '<button type="button" class="close" data-dismiss="alert"></button>';
                echo '<p>'.$_SESSION[$name].'</p>';
                echo '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }
}