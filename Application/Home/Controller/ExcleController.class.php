<?php
namespace  Home\Controller;
use Think\Controller;

class ExcleController extends CommonController
{
    public function join()
    {
        $project=$_GET['project'];
        $type=$_GET['type'];
        if ($_FILES["linktab"]["error"]==0)
        {
            $tmp_file = $_FILES ['linktab'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['linktab'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];

            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls")
            {
                if(strtolower ( $file_type ) != "xlsx") {
                    $this->error('不是Excel文件，重新上传');
                }
            }
            /*设置上传路径*/
            $savePath = 'data/Upload/Excel/';
            /*以时间+类型来命名上传的文件*/
            //  links  域名    keyword  关键词
            $str = date ( 'Ymd' );
            $file_name = $project.$type.$str.".".$file_type;
            $a= $savePath . $file_name;
            /*是否上传成功*/
            if (!move_uploaded_file( $tmp_file, $savePath . $file_name ))
            {
                $this->error ( '上传失败' );
            }
            $res=$this->read($savePath.$file_name );
            print_r($res);
            exit;



        }else if($_FILES["keywordtab"]["error"]){
            // 导入keyword 表
        }
        $this->display();
    }

    public function read($file,$encode='utf-8')
    {
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
            import("Org.Util.PHPExcel");
            $PHPExcel=new \PHPExcel();
        $extension = strtolower( pathinfo($file, PATHINFO_EXTENSION) );
        if ($extension =='xlsx') {
            import("Org.Util.PHPExcel.Reader.Excel2007");
            $objReader = new \PHPExcel_Reader_Excel2007();
        } else if ($extension =='xls') {
            import("Org.Util.PHPExcel.Reader.Excel5");
            $objReader = new \PHPExcel_Reader_Excel5();
        }
        $objPHPExcel = $objReader->load($file);
        $currentSheet=$objPHPExcel->getSheet(0);
        //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
            }
        }
       return $arr;
    }


}
