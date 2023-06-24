<?php

namespace App\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 *  @OA\Schema(
 *      schema="Success",
 *      title="Success Response",
 *      @OA\Property(property="success", type="boolean"),
 *      @OA\Property(property="message", type="string"),
 *      @OA\Property(property="data", type="object", nullable=true,
 *          @OA\Property(property="id", type="integer",example=1),
 *          @OA\Property(property="name", type="string",example="name"),
 *          @OA\Property(property="created_at", type="date",example="2023-10-10 20:20:20"),
 *      ),
 *      @OA\Property(property="code", type="integer")
 *  )
 * @OA\Schema(
 *      schema="SuccessAll",
 *      title="Success Response",
 *      @OA\Property(property="success", type="boolean"),
 *      @OA\Property(property="message", type="string",example="message data"),
 *      @OA\Property(property="data", type="array",
 *          @OA\Items(type="object",
 *              @OA\Property(property="id", type="integer",example=1),
 *              @OA\Property(property="name", type="string",example="name"),
 *              @OA\Property(property="created_at", type="date",example="2023-10-10 20:20:20"),
 *          ),
 *      ),
 *      @OA\Property(property="code", type="integer",example="200")
 *  )
 */
class ValidatorResponse
{
    public $fails = false;

    public $response;

    public function check(Request $request, $rules)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $result = "";
            $messages = json_decode(json_encode($validator->messages()), true);
            foreach ($messages as $value) {
                foreach ($value as $item) {
                    $result = $item;
                }
            }
            $this->fails = true;
            $this->response = $result;
        } else {
            $this->fails = false;
        }
    }
}
