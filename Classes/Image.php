<?php

declare(strict_types=1);

namespace Classes;

class Image
{
    public const IMAGES_COUNT = 5;

    private $imagePath;

    public function __construct()
    {
        $imageNumber = rand(1, self::IMAGES_COUNT);
        $this->imagePath = "img/$imageNumber.jpeg";
    }

    public function getImage()
    {
        try {
            return imagejpeg(imagecreatefromjpeg($this->imagePath));
        } catch (\Exception $e) {
            //Обработчик отстуствия изображения
        }
    }
}
