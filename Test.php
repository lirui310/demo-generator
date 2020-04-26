<?php


class Test
{
    // 模拟数据库只有4页数据
    private $page = 4;

    // 模拟数据库中4页数据
    private $dataBase = [
        1 => [['name' => 'test1', 'age' => 12], ['name' => 'test2', 'age' => 8]],
        2 => [['name' => 'test3', 'age' => 13], ['name' => 'test4', 'age' => 15]],
        3 => [['name' => 'test5', 'age' => 4], ['name' => 'test6', 'age' => 23]],
        4 => [['name' => 'test7', 'age' => 5], ['name' => 'test8', 'age' => 12]],
    ];


    // 获取结果
    public function getResult($page)
    {
        $dataBase = $this->dataBase;
        return $dataBase[$page] ?? [];
    }

    // 模拟分块处理数据
    public function chunk($page, callable $callback)
    {
        do {
            $result = $this->getResult($page);

            if (!$result) break;

            $callback($result);

            $page++;
        } while ($page <= $this->page);

        return true;
    }
}

$test = new Test();

// 从第几页开始取
$test->chunk(1, function ($data) {

    foreach ($data as $k => $v) {
        $str = 'name: ' . $v['name'] . '-' . 'age: ' . $v['age'] . "\n";
        // 直接输出
        echo $str;
        // 或者写入文件
        //file_put_contents('text.txt', $str, FILE_APPEND);
        // 想怎么处理 你自己看着办吧 哈哈哈哈哈
    }
});

