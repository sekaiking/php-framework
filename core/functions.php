<?php

function LoadView($page_url = '', $data = array())
{
    global $config, $ow;

    $page = R.'/src/views/' . $page_url . '.html';
    if (!file_exists($page)) {
        die("Error loading the view <br/> Missing file : $page");
    }
    $page_content = '';
    ob_start();
    require $page;
    $page_content = ob_get_contents();
    ob_end_clean();
    if (!empty($data) && is_array($data)) {
        foreach ($data as $key => $replace) {
            $object_to_replace = "{{" . $key . "}}";
            $page_content = str_replace($object_to_replace, $replace, $page_content);
        }
    }
    $page_content = preg_replace_callback("/{{CONFIG (.*?)}}/", function ($m) use ($config) {
        return (isset($config[$m[1]])) ? $config[$m[1]] : '';
    }, $page_content);


    return $page_content;
}




function ToArray($obj)
{
    if (is_object($obj)) {
        $obj = (array) $obj;
    }

    if (is_array($obj)) {
        $new = array();
        foreach ($obj as $key => $val) {
            $new[$key] = ToArray($val);
        }
    } else {
        $new = $obj;
    }
    return $new;
}
function ToObject($array)
{
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = ToObject($value);
        }
        if (isset($value)) {
            $object->$key = $value;
        }
    }
    return $object;
}
