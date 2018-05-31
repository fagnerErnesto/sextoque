<?php
/**
 * Created by PhpStorm.
 * User: fagner
 * Date: 30/11/17
 * Time: 18:18
 */

namespace App\Services\Contracts;


use Illuminate\Http\Request;

interface FileInterface
{
    const IMG = 'image';
    const DOC = 'document';

    public function setFileType($fileType);
    public function setFileNameFromRequest(Request $request);
    public function getFileName();
    public function uploadFile();
    public function getPublicPath();
}