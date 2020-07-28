<?php


namespace App\Helpers;

/**
 * Class First
 * @package App\Helpers
 * Класс хелпера в котором реализованна логика рекурсивного поиска фала с именем count по маске, с выводом результата его содержимого
 */
class First
{

    function glob_recursive($dir, $mask)
    {
        foreach (glob($dir . '/*') as $filename) {
            if (strtolower(substr($filename, strlen($filename) - strlen($mask), strlen($mask))) == strtolower($mask))
                echo array_sum(file($filename));
            if (is_dir($filename)) self::glob_recursive($filename, $mask);
        }
    }


}
