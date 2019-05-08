<?php

class MY_Controller extends CI_Controller
{
    public $is_public;
    public $action_list;
    public $permission_list;

    public function __construct()
    {
        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
        }

        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            }

            exit(0);
        }
        parent::__construct();
        $this->is_public = false;
        $this->token_header = 'ax-auth';//'ax_auth'
    }

    public function login_user($from_db = false)
    {
        $user = null;
        //         TODO: Descomentar para produccion.
        $user = $this->readToken();
        if ($from_db && isset($user)) {
            $user = $this->user_model->get($user['id']);
        }
        return empty($user) ? false : $user;
    }
    // TODO: Descomentar para Desarrollo.
//        $header = $this->input->get_request_header($this->token_header);
//        if ($header) {
//
//            $user = $header;
//
//            if ($from_db && isset($user)) {
//                $user = $this->user_model->get($user['id']);
//            }
//            return empty($user) ? false : $user;
//        }
//    }

    public function json_result($result, $message, $data = array(), $user = "")
    {
        $r['complete'] = $result;
        $r['message'] = $message;
        $r['data'] = $data;
        if ($this->input->get_request_header($this->token_header)) {
            try {
                $token = explode(" ", $this->input->get_request_header($this->token_header));
                $payload = JWT::decode(trim($token[1], '"'));
                if ($payload->exp < time()) {
                    $r["message"] = "Tu sesion ha expirado";
                    $r["complete"] = false;
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($r));
                } else {

                    // 10800 Tiempo
                    $payload->iat = time();
                    $payload->exp = time() + 10800000000; // Expira en 3 horas
                    $jwt = JWT::encode($payload, '');
                    $r['token'] = $jwt;
                }
            } catch (UnexpectedValueException $e) {
            }
        }

        if ($user != "") {
            $r["role"] = array("username" => $user["username"], "email" => $user["email"],
                "name" => $user["first_name"], "role" => $user["role"]);
        }
        $this->output
//            ->set_status_header(401)
            ->set_content_type('application/json')
            ->set_output(json_encode($r));
    }


    public function check_authenticated()
    {

        $u = $this->login_user();

        if (!$u) {
            echo json_encode(array(
                'complete' => false,
                'message' => lang_extension('access.deny')
            ));
            exit;
        }
    }

    public function check_access($role = array())
    {
        // TODO: Descomentar para produccion
        $u = $this->login_user();
//        var_dump(!$u);
//        var_dump($u['role'] != 'admin');
        if (!$u && in_array($u['role'], $role)) {

            echo json_encode(array(
                'complete' => false,
                'message' => lang_extension('access.deny', $role["role"]),
                'rol' => false
            ));
            exit;
        }
//        }
        // TODO: Descomentar para desarrollo
//        $u = $this->login_user();
//        if (!$u || ($u != 'admin' && $u != $role)) {
//            echo json_encode(array(
//                'complete' => false,
//                'message' => lang_extension('access.deny', array($role))
//            ));
//            exit;
//        }
    }
//    public function check_access($role = 'user')
//    {
////        if ($this->input->get_request_header($this->token_header) != "admin") {
//        // TODO: Descomentar para produccion
//        $u = $this->login_user();
//        if ((!$u || ($u['role'] != 'admin') && $u['role'] != $role)) {
//            echo json_encode(array(
//                'complete' => false,
//                'message' => lang_extension('access.deny', array($role)),
//                'rol' => false
//            ));
//            exit;
//        }
////        }
//        // TODO: Descomentar para desarrollo
////        $u = $this->login_user();
////        if (!$u || ($u != 'admin' && $u != $role)) {
////            echo json_encode(array(
////                'complete' => false,
////                'message' => lang_extension('access.deny', array($role))
////            ));
////            exit;
////        }
//    }

    //$to is array list of ids user or id of user
    public function sent_advanced_email($to, $subject, $template, $vars = array(), $vars_otr = array(), $lang = '', $from)
    {
        $from = isset($from) ? $from : $this->config->item('app_email');
        $template_path = './email_template/' . $lang . '/' . $template . '.html';

        $content = file_get_contents($template_path);
        $vars['access_url'] = str_replace('api/', (isset($vars['access_url']) ? $vars['access_url'] : ''), substr(base_url(), stripos('api', base_url())));

        foreach ($vars as $a => $b) {
            $content = str_replace("{{{$a}}}", $b, $content);
        }
        //Mail definition
        $this->load->library('email');
        $this->email->initialize();

        $this->email->clear();
        $this->email->from($from, isset($vars_otr['from_name']) ? $vars_otr['from_name'] : $from);
        $this->email->subject($subject);
        $this->email->message($content);
        $this->email->to($to);
        $this->email->send(true);
//        echo $this->email->print_debugger();

        return mail($from, $subject, $content, $to);

//        return mail($from, $subject, $content, $recipients);

    }

    /**
     * Get all params from request
     * @param bool $id = false including id
     * @return array
     */
    public function get_post_all($id = true)
    {
        $data = $this->input->post_get();
        if (count($data) === 0) {
            $data = $this->input->get_post();
        }
        if (count($data) === 0) {
            $data = (array)json_decode(file_get_contents('php://input'), TRUE);
        }
        if ($id) {
            return $data;
        } else {
            unset($data['id']);
            return $data;
        }
    }

    /**
     * Get all post params from request by field's name
     * @param array
     * @return array
     */
    public function get_post_by($fields = array())
    {
        $data = array();
        foreach ($fields as $key) {
            $data[$key] = $this->input->post($key);
        }

        return $data;
    }

    /**
     * @param $fileName
     * @param $paper
     * @param $info
     * @param $view
     * @param $method
     * @param bool $server
     * @param string $folder
     * @return mixed
     */
    public function generatePDF($fileName, $paper, $info, $view, $method, $server = false, $folder = "")
    {

        $this->load->library('Html2pdf');

//        Set folder to save PDF to
        $this->html2pdf->folder('./assets/pdfs/');

//        Set the filename to save/download as
        $this->html2pdf->filename($fileName);

//        Set the paper defaults
        $this->html2pdf->paper("p1", "portrait");

        $this->html2pdf->html(iconv("UTF-8", "CP1252", $this->load->view($view, $info, true)));


        $res = $this->html2pdf->create($method);

        return $res ? true : false;
    }

    /**
     * @return array|object
     */
    public function readToken()
    {
        if ($this->input->get_request_header($this->token_header)) {
            try {
                $token = explode(" ", $this->input->get_request_header($this->token_header));
                $payload = JWT::decode(trim($token[1], '"'));
                $user = $payload;
                if (is_object($user)) {
                    $a = array();
                    foreach (get_object_vars($user) as $f => $v) {
                        $a[$f] = $v;
                    }
                    $user = $a;
                }
            } catch (UnexpectedValueException $e) {

            }
        }
        return $user;
    }

    public function pdf_result($pdf)
    {
        $this->output
            ->set_content_type('application/pdf')
            ->set_output($pdf);
    }
}
