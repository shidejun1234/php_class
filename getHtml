public function test() {
        /**
         * @param $path
         * @return array
         */
        $getDir = function ($path) use (&$getDir) {
            $lists = [];
            //判断目录是否为空
            if (!file_exists($path)) {
                return $lists;
            }

            $files = scandir($path);
            foreach ($files as $v) {
                /**@var string $v */
                $newPath = $path . DIRECTORY_SEPARATOR . $v;
                if (is_dir($newPath) && $v != '.' && $v != '..') {
                    $lists[] = [
                        "title" => $v,
                        "lists" => $getDir($newPath)
                    ];
                } else if (is_file($newPath)) {
                    $lists[] = [
                        "title" => $v,
                        "lists" => []
                    ];
                }
            }

            return $lists;
        };
        $path = realpath(__DIR__ . '/../view\Test\test');
        $list = $getDir($path);

        /**
         * @param $list
         * @param $path
         * @param string $fpath
         * @return mixed
         */
        $getTitle = function ($list, $path, $fpath = '') use (&$getTitle) {
            foreach ($list as $v) {
                if (isset($v['lists'])) {
                    $str_s = $path . '/' . $fpath . $v['title'];
                    echo $str_s;
                    echo "<br>";
                    $file_path = $str_s;

                    //读取文件
                    if (is_file($file_path)) {
                        $fp = fopen($file_path, "r");
                        echo "this is here";
                        $str = "";
                        $buffer = 1024; //每次读取 1024 字节
                        while (!feof($fp)) { //循环读取，直至读取完整个文件
                            $str .= fread($fp, $buffer);
                        }
                        $str = str_replace("\r\n", "<br />", $str);//文件内容
                        dump($str);
                    }
                    $getTitle($v['lists'], $path, $fpath . $v['title'] . '/');
                }
            }
        };
        $getTitle($list, $path);
        $this->assign('test', $list);
        return $this->fetch();

    }
