<?php
/** Google two factor authentication controller.
 *
 * @since  0.1.0
 * @author Jon Penny <jon@jonppenny.co.uk>
 */

namespace App\Http\Controllers;

use Crypt;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\View\View;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use ParagonIE\ConstantTime\Base32;

class Google2FAController extends Controller
{

    use ValidatesRequests;

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     *
     * @param Request $request
     *
     * @return Factory|Application|Response|View
     * @throws Exception
     */
    public function enableTwoFactor(Request $request): view
    {
        $user             = $request->user();
        $google2fa_secret = $user->google2fa_secret;
        $enabled          = true;
        $secret           = $this->generateSecret(10);

        $recovery_codes = [
            '0' => $this->generateRecoveryCode(111111, 999999),
            '1' => $this->generateRecoveryCode(111111, 999999),
            '2' => $this->generateRecoveryCode(111111, 999999),
            '3' => $this->generateRecoveryCode(111111, 999999),
            '4' => $this->generateRecoveryCode(111111, 999999),
            '5' => $this->generateRecoveryCode(111111, 999999),
        ];

        if (!$google2fa_secret) {
            $user->google2fa_secret = Crypt::encrypt($secret);
            $user->recovery_codes   = json_encode($recovery_codes);
            $user->save();

            $enabled = false;
        }

        //generate image for QR barcode
        $imageDataUri = (new Google2FA)->getQRCodeInline(
            $request->getHttpHost(),
            $user->email,
            $secret
        );

        return view('2fa/enableTwoFactor', [
            'image'          => $imageDataUri,
            'secret'         => $secret,
            'enabled'        => $enabled,
            'recovery_codes' => $recovery_codes,
        ]);
    }

    /**
     *
     * @param Request $request
     *
     * @return Factory|Application|Response|View
     */
    public function disableTwoFactor(Request $request): View
    {
        $user = $request->user();

        //make secret column blank
        $user->google2fa_secret = null;
        $user->recovery_codes   = null;
        $user->save();

        return view('2fa/disableTwoFactor');
    }

    /**
     * Generate a secret key in Base32 format
     *
     * @param int $length The length of the random string that should be returned in bytes.
     *
     * @return string
     * @throws Exception
     */
    private function generateSecret(int $length): string
    {
        $randomBytes = random_bytes($length);

        return Base32::encodeUpper($randomBytes);
    }

    /**
     * Generate a secret key in Base32 format
     *
     * @param int $min Minimum number
     * @param int $max Maximum number
     *
     * @return string
     * @throws Exception
     */
    private function generateRecoveryCode(int $min, int $max): string
    {
        return random_int($min, $max);
    }
}
