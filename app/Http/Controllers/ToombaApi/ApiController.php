<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public $STATUS_CODE_CONTINUE = 100;
    public $STATUS_CODE_SWITCHING_PROTOCOLS = 101;
    public $STATUS_CODE_PROCESSING = 102;
    public $STATUS_CODE_OK = 200;
    public $STATUS_CODE_CREATED = 201;
    public $STATUS_CODE_ACCEPTED = 202;
    public $STATUS_CODE_NON_AUTHORITATIVE_INFORMATION = 203;
    public $STATUS_CODE_NO_CONTENT = 204;
    public $STATUS_CODE_RESET_CONTENT = 205;
    public $STATUS_CODE_PARTIAL_CONTENT = 206;
    public $STATUS_CODE_MULTI_STATUS = 207;
    public $STATUS_CODE_ALREADY_REPORTED = 208;
    public $STATUS_CODE_IM_USED = 226;
    public $STATUS_CODE_MULTIPLE_CHOICES = 300;
    public $STATUS_CODE_MOVED_PERMANENTLY = 301;
    public $STATUS_CODE_FOUND = 302;
    public $STATUS_CODE_SEE_OTHER = 303;
    public $STATUS_CODE_NOT_MODIFIED = 304;
    public $STATUS_CODE_USE_PROXY = 305;
    public $STATUS_CODE_TEMPORARY_REDIRECT = 307;
    public $STATUS_CODE_PERMANENT_REDIRECT = 308;
    public $STATUS_CODE_BAD_REQUEST = 400;
    public $STATUS_CODE_UNAUTHORIZED = 401;
    public $STATUS_CODE_PAYMENT_REQUIRED = 402;
    public $STATUS_CODE_FORBIDDEN = 403;
    public $STATUS_CODE_NOT_FOUND = 404;
    public $STATUS_CODE_METHOD_NOT_ALLOWED = 405;
    public $STATUS_CODE_NOT_ACCEPTABLE = 406;
    public $STATUS_CODE_PROXY_AUTHENTICATION_REQUIRED = 407;
    public $STATUS_CODE_REQUEST_TIMEOUT = 408;
    public $STATUS_CODE_CONFLICT = 409;
    public $STATUS_CODE_GONE = 410;
    public $STATUS_CODE_LENGTH_REQUIRED = 411;
    public $STATUS_CODE_PRECONDITION_FAILED = 412;
    public $STATUS_CODE_PAYLOAD_TOO_LARGE = 413;
    public $STATUS_CODE_REQUEST_URI_TOO_LONG = 414;
    public $STATUS_CODE_UNSUPPORTED_MEDIA_TYPE = 415;
    public $STATUS_CODE_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    public $STATUS_CODE_EXPECTATION_FAILED = 417;
    public $STATUS_CODE_I’M_A_TEAPOT = 418;
    public $STATUS_CODE_MISDIRECTED_REQUEST = 421;
    public $STATUS_CODE_UNPROCESSABLE_ENTITY = 422;
    public $STATUS_CODE_LOCKED = 423;
    public $STATUS_CODE_FAILED_DEPENDENCY = 424;
    public $STATUS_CODE_UPGRADE_REQUIRED = 426;
    public $STATUS_CODE_PRECONDITION_REQUIRED = 428;
    public $STATUS_CODE_TOO_MANY_REQUESTS = 429;
    public $STATUS_CODE_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    public $STATUS_CODE_CONNECTION_CLOSED_WITHOUT_RESPONSE = 444;
    public $STATUS_CODE_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    public $STATUS_CODE_CLIENT_CLOSED_REQUEST = 499;
    public $STATUS_CODE_INTERNAL_SERVER_ERROR = 500;
    public $STATUS_CODE_NOT_IMPLEMENTED = 501;
    public $STATUS_CODE_BAD_GATEWAY = 502;
    public $STATUS_CODE_SERVICE_UNAVAILABLE = 503;
    public $STATUS_CODE_GATEWAY_TIMEOUT = 504;
    public $STATUS_CODE_HTTP_VERSION_NOT_SUPPORTED = 505;
    public $STATUS_CODE_VARIANT_ALSO_NEGOTIATES = 506;
    public $STATUS_CODE_INSUFFICIENT_STORAGE = 507;
    public $STATUS_CODE_LOOP_DETECTED = 508;
    public $STATUS_CODE_NOT_EXTENDED = 510;
    public $STATUS_CODE_NETWORK_AUTHENTICATION_REQUIRED = 511;
    public $STATUS_CODE_599_NETWORK_CONNECT_TIMEOUT_ERROR = 512;

    /**
     * with this you can send all results to the output whith JSON style
     *
     * @param Array|Model $data all results data in output
     * @param string $message a message for last status of process for example : Error, Not Valid Inputes,...
     * @param int $code a code for showing last status of process for example : 200 = OK , 404 = Not Found , 503 = Not Valid Inputs
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function json($data = null, $code = 200,$message = null)
    {
        if(!$message) {
            $message = ["OK"];
        }

        if(!is_array($message)){
            $message = [$message];
        }

        if(is_array($data) && count($data) === 0){
            $data = null;
        }

        if($data === null){
            $code =  $this->STATUS_CODE_NOT_FOUND;
        }

        $json = [
            'data'=> $data,
            'timestamp'=>time(),
            'message'=>$message,
            'code'=>$code
        ];

        return response()->json($json,$code);
    }



}
