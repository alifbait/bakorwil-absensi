<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // $this->session = service('session');
    }
    protected function generateAbsensiHarian()
    {
        $db = \Config\Database::connect();

        $today = date('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | CEK SETTING
        |--------------------------------------------------------------------------
        */

        $setting = $db->table('settings')->get()->getRowArray();

        if (!$setting || $setting['auto_alpha'] != 1) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | CEK HARI AKTIF
        |--------------------------------------------------------------------------
        */

        $hari = strtolower(date('l'));

        $mapping = [
            'monday' => 'hari_senin',
            'tuesday' => 'hari_selasa',
            'wednesday' => 'hari_rabu',
            'thursday' => 'hari_kamis',
            'friday' => 'hari_jumat',
            'saturday' => 'hari_sabtu',
            'sunday' => 'hari_minggu',
        ];

        $fieldHari = $mapping[$hari];

        if ($setting[$fieldHari] != 1) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL SEMUA PESERTA AKTIF
        |--------------------------------------------------------------------------
        */

        $peserta = $db->table('peserta')
            ->where('status', 'aktif')
            ->get()
            ->getResultArray();

        /*
        |--------------------------------------------------------------------------
        | GENERATE ALPHA
        |--------------------------------------------------------------------------
        */

        foreach ($peserta as $p) {

            $cek = $db->table('absensi')
                ->where('peserta_id', $p['id'])
                ->where('tanggal', $today)
                ->get()
                ->getRowArray();

            if (!$cek) {

                $db->table('absensi')->insert([

                    'peserta_id' => $p['id'],

                    'tanggal' => $today,

                    'status' => 'alpha',

                    'created_at' => date('Y-m-d H:i:s'),

                    'updated_at' => date('Y-m-d H:i:s')

                ]);
            }
        }
    }
}
