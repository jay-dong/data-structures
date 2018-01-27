<?php

class TableSingle{

    public function __construct(){

        @$this->storage->id=null;
        @$this->storage->name=null;
        @$this->storage->next=null;

    }
    /**
     *  添加数据
     * 
     */
    public function addData($id,$name){
        $now=$this->storage;
        $pre=null;
            while($now->next!=null){
                //指定下次查找的子级
                $now=$now->next;
            }
        // if($this->id!=null){
            $node=new stdClass();
            $node->pre=$now;
            $node->id=$id;
            $node->name=$name;
            $node->next=null;
            $now->next=$node;
        // }
        
    }

    /**
     *  根据编号查找指定数据
     * 
     */
    public function find($id){

        $now=$this->storage;
        while($now->id!=$id){

            $now=$now->next;

        }
        return  "名称:".$now->name.';id:'.$now->id."\n";

    }
    /**
     *  删除指定数据
     * 
     */

    public function delete($id){

        $now=$this->storage;
        //查找符合节点
        while($now->id!=$id){

            $now=$now->next;

        }

        $p=$now->pre;
        //修改父节点的子节点
        $now->pre->next=$now->next;
        //修改子节点的父节点
        $now->next->pre=$p;
        unset($now);

    }

    /**
     *  输出所有数据
     */
    public function outPut(){
        
        $now=$this->storage;
        while($now->next!=null){

            $now=$now->next;
            echo "名称:".$now->name,';id:'.$now->id."\n";
           
        }

    }

}
$table=new TableSingle();
$table->addData(19910908,'Jack');
$table->addData(19910909,'Jay');
$table->addData(19910910,'Alice');
$table->addData(19910911,'Maray');

// $table->outPut();
// echo $table->find(19910909);
$table->delete(19910909);

$table->outPut();

 