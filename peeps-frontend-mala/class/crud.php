<?php
class crud
{
    public function delete($query,$konek){
        if ($konek->query($query)===TRUE){
            $result="success";
        }else{
            $result='failed'.$konek->error;
        }
        echo json_encode($result);
        $konek->close();
    }
    public function addData($query,$konek){
        if ($konek->query($query)===TRUE){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $result='failed'.$konek->error;
        }
        echo json_encode($result);
        $konek->close();
    }
    public function multiAddData($queryCek,$multiQuery,$konek){
        if ($konek->query($queryCek)->num_rows > 0){
            $result="ada data";
        }else{
            if ($konek->multi_query($multiQuery)==TRUE){
                $result="success";
            }else{
                $result='failed'.$konek->error;
            }
        }
        echo json_encode($result);
        $konek->close();
    }
    public function update($query,$konek,$url){
        if ($konek->multi_query($query)===TRUE){
            $result=$url;
        }else{
            $result='failed'.$konek->error;
        }
        echo json_encode($result);
        $konek->close();
    }
    public function multiUpdate($queryCek,$multiQuery,$konek,$url){
        if ($konek->query($queryCek)->num_rows > 0){
            $result="ada data";
        }else{
            if ($konek->multi_query($multiQuery)==TRUE){
                $result=$url;
            }else{
                $result='failed'.$konek->error;
            }
        }
        echo json_encode($result);
        $konek->close();
    }
}