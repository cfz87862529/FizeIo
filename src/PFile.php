<?php

namespace fize\io;

/**
 * 进程文件
 */
class PFile
{

    use FileTrait;

    /**
     * 构造
     * @param string $command 命令
     * @param string $mode    模式
     */
    public function __construct(string $command, string $mode)
    {
        $this->stream = popen($command, $mode);
    }

    /**
     * 析构
     */
    public function __destruct()
    {
        if ($this->stream && get_resource_type($this->stream) == 'stream') {
            $this->close();
        }
    }

    /**
     * 关闭文件
     * @return int
     */
    public function close(): int
    {
        $result = pclose($this->stream);
        if ($result) {
            $this->stream = null;  // 如果正确关闭了则清空当前对象的file_resource
        }
        return $result;
    }
}