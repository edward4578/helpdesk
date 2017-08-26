<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * An HTTP status code value
     * 
     * @var Integer 
     */
    protected $codeHttp = 200;

    /**
     * Description of the error. Same as errors.message.
     * 
     * @var String 
     */
    protected $message = '';

    /**
     * Data response
     * 
     * @var Array|Object 
     */
    protected $data;

    /**
     * A container for the error details.
     * 
     * @var Array 
     */
    protected $errors = array();

    /**
     * Evaluate if the input is valid
     * 
     * @param Request $request Request
     * @param Array $rules Rules validation
     * @return boolean
     */
    protected function isValidInput(Request $request, $rules) {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $keys = $errors->keys();
            foreach ($keys as $field) {
                $error = $errors->get($field);
                $this->errors[] = array(
                    'locationType' => 'parameter',
                    'location' => $field,
                    'message' => $error[0],
                    'code' => config('constants.PROCESS_STATES.ERROR_DATA_VALIDATION')
                );
            }
            $this->message = 'Invalid data';
            $this->codeHttp = config('constants.HTTP_STATUS.UNPROCESSABLE_ENTITY');
            return false;
        }
        return true;
    }

    protected function processingError($code, $message = null) {
        switch ($code) {
            case config('constants.PROCESS_STATES.ERROR_DATA_NOT_FOUND'):
                $this->codeHttp = config('constants.HTTP_STATUS.NOT_FOUND');
                $this->message = 'Resource not found';
                $this->errors[] = array(
                    'locationType' => '',
                    'location' => '',
                    'message' => 'Not Found ',
                    'code' => config('constants.PROCESS_STATES.ERROR_DATA_VALIDATION')
                );
                break;
            case config('constants.PROCESS_STATES.ERROR_DATA_VALIDATION'):
                $this->codeHttp = config('constants.HTTP_STATUS.NOT_FOUND');
                $this->message = $message;
                $this->errors[] = array(
                    'locationType' => 'business',
                    'location' => '',
                    'message' => $message,
                    'code' => config('constants.PROCESS_STATES.ERROR_DATA_VALIDATION')
                );
                break;
        }
    }

}
