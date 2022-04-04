<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\ORM\TableRegistry;
use GuzzleHttp\Client;

/**
 * Media component
 *
 * @property \App\Model\Table\MediaTable $media
 */
class FileComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    /**
     * @param $file
     * @param null $used_for
     * @return \Cake\Datasource\EntityInterface|null
     */
    public function upload($file, $used_for = null)
    {
        if ($filePath = $file['tmp_name']) {
            $tmp = $file['tmp_name'];

            $dir = new Folder(WWW_ROOT . 'uploads/', true, 0755);

            if (!empty($used_for)) {
                $dir = new Folder(WWW_ROOT . 'uploads/' . $used_for . '/', true, 0755);
            }

            $dirPath = 'uploads/' . $used_for . '/';
            //$dirPath = 'F:/Web projects/Aegenius/dashboard/webroot/uploads/';
            $newFile = sha1_file($tmp);
            $uploadImage = $file['name'];
            $ext = pathinfo($uploadImage, PATHINFO_EXTENSION);
            list($width, $height, $imageType, $attr) = getimagesize($tmp);

            $media = new \stdClass();

            $newFileName =  $newFile.'.'.$ext;

            if (move_uploaded_file($tmp, $dirPath . $newFileName)) {
                $media->name = $newFileName;
                $media->url = $dirPath . $newFile . '.' . $ext;
                $media->type = $file['type'];
                $media->size = round($file['size'] / 1024 / 1024, 5) . ' MB';
                $media->height = $height;
                $media->width = $width;
                $media->used_for = $used_for;

                return $media;

            }
        }

        return null;
    }

    public function uploadImage($file)
    {
        $mediaTable = TableRegistry::getTableLocator()->get('Media');
        $media = $mediaTable->newEmptyEntity();

        if ($filePath = $file['tmp_name']) {
            $maxDimensions = 600;//  width of the image
            $uploadedFile = $file['tmp_name'];
            $newFileName = sha1_file($uploadedFile);
            $dirPath = "uploads/";
            $uploadImage = $file['name'];
            $ext = pathinfo($uploadImage, PATHINFO_EXTENSION);

            list($width, $height, $imageType, $attr) = getimagesize($uploadedFile);

            if ($width > $maxDimensions || $height > $maxDimensions) {

                $ratio = $width / $height;
                if ($ratio > 1) {
                    $new_width = $maxDimensions;
                    $new_height = $maxDimensions / $ratio;
                } else {
                    $new_width = $maxDimensions * $ratio;
                    $new_height = $maxDimensions;
                }
                $src = imagecreatefromstring(file_get_contents($uploadedFile));
                $tmp = imagecreatetruecolor($new_width, $new_height);
                // start changes
                switch ($imageType) {
                    case IMAGETYPE_GIF:
                    case IMAGETYPE_PNG:
                        imagesavealpha($tmp, true);
                        $trans_colour = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
                        imagefill($tmp, 0, 0, $trans_colour);
                        break;
                    default:
                        break;
                }
                // end changes
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagedestroy($src);
                // adjust format as needed
                switch ($imageType) {

                    case IMAGETYPE_PNG:
                        imagepng($tmp, $dirPath . $newFileName . "_thumb." . $ext);
                        break;
                    case IMAGETYPE_JPEG:
                        imagejpeg($tmp, $dirPath . $newFileName . "_thumb." . $ext);
                        break;
                    case IMAGETYPE_GIF:
                        imagegif($tmp, $dirPath . $newFileName . "_thumb." . $ext);
                        break;
                    default:
                        echo "Invalid Image type.";
                        exit;
                        break;
                }
                imagedestroy($tmp);
                $thumbnail_url = $dirPath . $newFileName . "_thumb." . $ext;
            } else {//image dimensions default
                $thumbnail_url = $dirPath . $newFileName . "." . $ext;
            }
            if (move_uploaded_file($uploadedFile, $dirPath . $newFileName . "." . $ext)) {
                $media->name = $newFileName . "." . $ext;
                $media->url = $dirPath . $newFileName . "." . $ext;
                $media->type = $ext;
                $media->size = round($file['size'] / 1024 / 1024, 1) . ' MB';
                $media->height = $height;
                $media->width = $width;
                $media->thumbnail_url = $thumbnail_url;

                if ($mediaTable->save($media)) {
                    return $media;
                } else {
                    return null;
                }
            }
        }

        return null;

    }


    public function getImage($id)
    {
        $mediaTable = TableRegistry::getTableLocator()->get('Media');
        $media = $mediaTable->get($id, [
            'contain' => [],
        ]);

        if (!empty($media)) {
            return $media;
        }

        return $media;
    }

    /**
     *
     * remove image background
     * @param $path
     * @param $id
     * @return \Cake\Datasource\EntityInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function removeBackground($path, $id)
    {
        $client = new Client();

        $res = $client->post('https://api.remove.bg/v1.0/removebg', [
            'multipart' => [
                [
                    'name' => 'image_file',
                    'contents' => fopen($path, 'r')
                ],
                [
                    'name' => 'size',
                    'contents' => 'auto'
                ]
            ],
            'headers' => [
                'X-Api-Key' => env('REMOVE_BACKGROUND_API_KEY'),
            ]
        ]);

        $mediaTable = TableRegistry::getTableLocator()->get('media');
        $media = $mediaTable->get($id);

        $fp = fopen($media->url, "wb");
        fwrite($fp, $res->getBody()->getContents());
        fclose($fp);


        if (!empty($media)) {
            return $media;
        }

        return $media;
    }

}
