<?php
class MY_Encrypt extends CI_Encrypt
{

    public function encode($string, $key="", $url_safe=TRUE)
    {
        $ret = parent::encode($string, $key);

        if ($url_safe)
        {
            $ret = strtr(
                    $ret,
                    array(
                        '+' => '.',
                        '=' => '-',
                        '/' => '~'
                    )
                );
        }

        return $ret;
    }


   public function decode($string, $key="")
    {
        $string = strtr(
                $string,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
                )
            );

        return parent::decode($string, $key);
    }
}
?>