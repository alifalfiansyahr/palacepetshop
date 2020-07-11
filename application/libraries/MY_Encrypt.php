<?php
class MY_Encrypt extends CI_Encrypt
{
    /**
     * Encodes a string.
     *
     * @param string $string The string to encrypt.
     * @param string $key[optional] The key to encrypt with.
     * @param bool $url_safe[optional] Specifies whether or not the
     * returned string should be url-safe.
     * @return string
     */
    public function __construct()
    {
        parent::__construct();
    }

    function encodes($string)
    {
        $ret = parent::encodes($string);

        if (!empty($string)) {
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

    /**
     * Decodes the given string.
     *
     * @access public
     * @param string $string The encrypted string to decrypt.
     * @param string $key[optional] The key to use for decryption.
     * @return string
     */
    function decodes($string)
    {
        $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

        return parent::decodes($string);
    }
}
