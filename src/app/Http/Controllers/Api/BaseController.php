<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Response;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Medicine API Documentation",
 *      description="Medicine API",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * @OA\Tag(
 *     name="Substances"
 * )
 * @OA\Tag(
 *     name="Manufacturers"
 * )
 * @OA\Tag(
 *     name="Medicines"
 * )
 * @OA\Server(
 *      url="http://127.0.0.1:8080/public/api",
 *      description="Medicine API Server"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 * )
 */
class BaseController extends Controller {
    
}
