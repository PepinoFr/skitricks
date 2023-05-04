<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('ondisk', [$this, 'ondisk']),
        ];
    }
    public function ondisk($file)
    {
        $file = "../public".$file;
        return file_exists($file);
    }

}
?>