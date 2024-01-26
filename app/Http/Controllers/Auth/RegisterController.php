<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Services\Register\Action\RegisterAction;
use App\Services\Register\Dto\RegisterDto;
/**
 * @OA\Info(
 *     title="Test swagger",
 *     version="1.0.0",
 * ),
 * @OA\Server(
 *     description="Test swagger",
 *     url="http://127.0.0.1:8000/api"
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="Authorization Token",
 *      type="apiKey",
 *      in="header",
 *      name="Authorization",
 *  )
 */

class RegisterController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="register user",
     *     description="Register in a user using the provided credentials.",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", description="User login identifier"),
     *             @OA\Property(property="lastName", type="string", description="User login identifier"),
     *             @OA\Property(property="patronymic", type="string", description="User login identifier"),
     *             @OA\Property(property="email", type="string", description="User login identifier"),
     *             @OA\Property(property="phone", type="string", description="User login identifier"),
     *             @OA\Property(property="password", type="string", description="User password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *     )
     * )
     */

    public function __invoke(
        RegisterRequest $request,
        RegisterAction $registerAction
    ) {
        $dto = RegisterDto::fromRequest($request);

        $data = $registerAction->run($dto);
        return response()->json($data);
    }
}
