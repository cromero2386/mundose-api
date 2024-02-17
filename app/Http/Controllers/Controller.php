<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="Example of crud for MundosE",
 *      version="1.0.0",
 *      description="It has to create, read, update and delete people, also list provinces using the external API of argentina.gob.ar.",
 *      @OA\Contact(
 *          name="Lic. Romero, Carlos Alberto",
 *          email="cromero2386@gmail.com",
 *      ),
 *      @OA\License(
 *          name="GNU General Public License (GPL)",
 *          url="https://www.gnu.org/philosophy/philosophy.html"
 *      )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
