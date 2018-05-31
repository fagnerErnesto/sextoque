<?php
/**
 * Created by PhpStorm.
 * User: fagner
 * Date: 30/11/17
 * Time: 17:53
 */

namespace App\Services;


use App\Services\Contracts\FileInterface;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class File implements FileInterface
{
    /**
     * @var UploadedFile
     */
    protected $objFile;
    protected $fileName;
    protected $fileType;
    protected $publicPath;

    /**
     *
     */
    public function uploadFile() {
        $image = Image::make($this->objFile);
        $image->resize(150,150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($this->getPublicPath() . $this->fileName);
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param Request $request
     */
    public function setFileNameFromRequest(Request $request)
    {
        $this->objFile = $request->file($this->fileType);
        $this->fileName = time(). '.' . $this->objFile->getClientOriginalExtension();
    }


    /**
     * @param mixed $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
        $this->publicPath = public_path(DIRECTORY_SEPARATOR . $this->fileType);
    }

    /**
     * @return mixed
     */
    public function getPublicPath()
    {
        return $this->fileType . DIRECTORY_SEPARATOR;
    }


}