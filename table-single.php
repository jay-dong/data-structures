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

            $pre=$now;//双链表,记录本级
            //指定下次查找的子级
            $now=$now->next;
            

        }
        $node=new stdClass();
        $node->pre=$pre;
        $node->id=$id;
        $node->name=$name;
        $node->next=null;
        $now->next=$node;

    }
    /**
     *  输出所有数据
     */
    public function outPut(){

        return $this->storage;
    }

}
$table=new TableSingle();
$table->addData(19910908,'Jack');
$table->addData(19910909,'Jay');
$table->addData(19910910,'Alice');
var_dump($table->outPut());