<?php

namespace Simulator;

class Path
{
    public $currentPath;

    function __construct($path) {
        $this->currentPath = $path;
    }

    /**
     * @param $newPath
     */
    public function cd($newPath): void
    {
        $newPath = trim($newPath);

        if (0 === strcmp(DIRECTORY_SEPARATOR, $newPath)) {
            $this->currentPath = DIRECTORY_SEPARATOR;
            return;
        }

        if (strpos($newPath, DIRECTORY_SEPARATOR) === 0) {
            $this->currentPath = $newPath;
        } else {
            $this->currentPath .= DIRECTORY_SEPARATOR . $newPath;
        }

        $path = explode(DIRECTORY_SEPARATOR, $this->currentPath);

        $this->arrayUnsetRecursive($path);

        $this->currentPath = implode(DIRECTORY_SEPARATOR, $path);
        return;
    }

    /**
     * @param $array
     * @param null $previousKey
     */
    protected function arrayUnsetRecursive(&$array, $previousKey = null) {
        foreach ($array as $key => &$value) {
            if ('..' == $value) {
                unset($array[$key]);
                if (!is_null($previousKey) && array_key_exists($previousKey, $array)) {
                    unset($array[$previousKey]);
                }
                $this->arrayUnsetRecursive($array);
            }
            if ('.' == $value) {
                unset($array[$key]);
                $this->arrayUnsetRecursive($array);
            }
            $previousKey = $key;
        }
    }
}