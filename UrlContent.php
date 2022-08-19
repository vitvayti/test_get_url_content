<?php

/**
 * Class UrlContent
 */
class UrlContent
{
    private $url;
    private $content;

    /**
     * UrlContent constructor.
     * @param string $url
     */
    public function __construct(string $url){
        $this->url = $url;
        $this->content = '';
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url){
        $this->url = $url;
    }

    /**
     *
     */
    public function getContent(){
        try{
            $ctx = stream_context_create([
                    'http' => [
                        'timeout' => 10
                    ]
                ]
            );
            $content = file_get_contents($this->url,0,$ctx);
            if($content == false) {
                throw new \Error('Не удалось подключиться');
            }
        }catch (\Throwable $throwable){
            echo $throwable;
        }
        $this->content = $content;
        return $content;
    }

    /**
     * @param array $arr
     * @return false|string|string[]
     */
    public function changeTextArr(array $arr){
        $content = $this->content;
        foreach ($arr as $row){
            $content = str_replace($row[0], $row[0] . ' ' . $row[1],$content);
        }
        $this->content = $content;
        return $content;
    }

    /**
     * @param string $str1
     * @param string $str2
     * @return false|string|string[]
     */
    public function changeText(string $str1, string $str2){
        $content = $this->content;
        $content = str_replace($str1, $str1 . ' ' . $str2,$content);
        $this->content = $content;
        return $content;
    }
}