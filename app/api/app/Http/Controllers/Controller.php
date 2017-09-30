<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="api.mmilko.git",
 *     basePath="/api/v1/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Lumen with OAUTH2 API",
 *         description="",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email=""
 *         ),
 *         @SWG\License(
 *             name="Private License",
 *             url="URL to the license"
 *         )
 *     ),
 *      @SWG\SecurityScheme(
 *         securityDefinition="Bearer",
 *         type="apiKey",
 *         name="Authorization",
 *         in="header"
 *     ), 
 *     @SWG\ExternalDocumentation(
 *         description="Find out more about my website",
 *         url="http..."
 *     ),
 *
 * )
 */
class Controller extends BaseController
{
    //
}
