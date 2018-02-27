<?php 

namespace Think;

/**
* 文件操作类
*/
class File
{
	/**
	 * 创建文件夹
	 * @return boolean 创建成功返回true，否则返回false
	 */
	public function makeDir($path)
	{
		$dir = iconv('utf-8', 'gbk', $path);
		return (!file_exists($dir)) ? (mkdir($dir,0777,true) ? true : fale) : false;
	}

	/**
	 * 获取文件夹中文件数量
	 */
	public function getDirFiles($dir)
	{
		$sl = 0;
		$arr = glob($dir);
		foreach ($arr as $v){
			if(is_file($v)){
				$sl++;
			}else{
				$sl += $this->getDirFiles($v."/*");
			}
		}
		return $sl;
	}

	/**
	 * 获取子文件夹的数量
	 */
	public function countDirs($dir)
	{
		return count(scandir($dir)) - 2;
	}

	/**
	 * 获取文件夹大小
	 */
	public function getDirSize($dir)
	{
		static $size = 0; 
		$dh = opendir($dir);
		while (false!==($file = @readdir($dh))){ 
			if($file != "." && $file != ".."){
				if(is_dir("$dir/$file")){ 
		 			$size += $this->getDirSize("$dir/$file"); 
				}else{ 
					$size += filesize("$dir/$file"); 
				}
			} 
		}
		closedir($dh);
		return $this->formatBytes($size);
	}

	/**
	 * 空间单位转换
	 */
	public function formatBytes($size,$digit = 2) {
        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++){$size /= 1024;}
        return round($size, $digit).$units[$i];
    }


	/**
	 * 删除文件夹
	 */
	/**
	 * [delDir description]
	 * @param  string  $dir  文件夹地址
	 * @param  integer $type 删除类型，1删除文件及文件夹，否则保留文件夹
	 * @return boolean 删除成功返回ture，否则返回false
	 */
	public function delDir($dir,$type = 1)
	{
		// 先删除目录下的文件
		if(!is_dir($dir)){
			$flag = false;
		}else{
			$dh = opendir($dir);
			while ($file = readdir($dh)){
				if($file != "." && $file!=".."){
					$fullpath = $dir."/".$file;
					(!is_dir($fullpath)) ? unlink($fullpath) : $this->delDir($fullpath);
				}
			}
			closedir($dh);
			$flag = ($type == 1) ? (rmdir($dir) ? true : false) : true;
		}
		return $flag;
	}


	/**
	 * 移动文件
	 * @return boolean 成功返回true,否则返回false
	 */
	public function moveFiles($old, $new = '')
	{
		if(is_array($old)){
			foreach ($old as $k => $v) {
				$flag = (!empty($new)) ? rename($v, $new) : unlink($v);
			}
		}else{
			$flag = (!empty($new)) ? rename($old, $new) : unlink($old);
		}
		return $flag;
	}
	
}