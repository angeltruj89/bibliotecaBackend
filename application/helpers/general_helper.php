<?php
    function successResponse($data,$msg,$context,$extras='',$merge='')
    {
        http_response_code(200);
        $response = array();
        $response['status_code'] = 200;
        $response['success'] = true;
        $response['msg'] = $msg;
        $response['extras'] = $extras;
        $response['data'] = $data;
        if($merge !== ''){
            $response = array_merge($response, $merge);
        }
        output_json($response, $context);
    }

    function failResponse($msg, $context)
    {
        http_response_code(401);
        $response = array();
        $response['success'] = false;
        $response['error_code'] = 401;
        $response['error_msg'] = $msg;
        output_json($response, $context);
    }

    function output_json($response, $context)
    {
        $context->output->set_header('Content-type: application/json; charset=UTF-8');
        $context->output->set_output(json_encode($response, JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES));
    }