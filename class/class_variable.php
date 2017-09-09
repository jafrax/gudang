<?php
class variable extends database{
    function currency($str,$dec){
            $curr = number_format($str,$dec,',','.');
            return $curr;
    }
    function pilih_gudang($kode_cab,$setup_var){
        $sql_gudang = "SELECT value FROM setup_variable 
                        WHERE jenis='gudang' AND cabang_id='$kode_cab' AND variable='$setup_var'";
        $dat_gudang = $this->datasql($sql_gudang);
        return $dat_gudang['value'];
    }
    
    function pilih_kasbank($kode_cab,$setup_var){
        $sql_kasbank = "SELECT value FROM setup_variable 
                        WHERE jenis='kasbank' AND cabang_id='$kode_cab' AND variable='$setup_var'";
        $dat_kasbank = $this->datasql($sql_kasbank);
        return $dat_kasbank['value'];
    }

    function saldo_akhir($kode,$gudang){
        $sql = "SELECT saldo FROM stock_saldo WHERE gudang_id='$gudang' AND item_id='$kode'";
        $dat = $this->datasql($sql);
        if($dat['saldo']=='')
            $stock = 0;
        else
            $stock = $dat['saldo'];
        return $stock;
    }
    
    function saldo_akhir_kasbank($mst_kasbank_id){
        $sql = "SELECT saldo FROM kasbank_saldo WHERE kasbank_mst_id='$mst_kasbank_id'";
        $dat = $this->datasql($sql);
        if($dat['saldo']=='')
            $saldo = 0;
        else
            $saldo = $dat['saldo'];
        return $saldo;
    }
    
    function pilih_hutang($id_relasi){
        $sql = "SELECT id FROM hutang WHERE id_relasi='$id_relasi'";
        $dat = $this->datasql($sql);
        return $dat['id'];
    }
    
    function saldo_akhir_hutang($supplier_id){
        $sql = "SELECT saldo FROM hutang_history WHERE supplier_id='$supplier_id' ORDER by id DESC LIMIT 1 OFFSET 0";
        $dat = $this->datasql($sql);
        if($dat['saldo']=='')
            $saldo = 0;
        else
            $saldo = $dat['saldo'];
        return $saldo;
    }
    
    function saldo_akhir_hutang_detil($hutang_id){
        $sql = "SELECT saldo FROM hutang_detil WHERE hutang_id='$hutang_id' ORDER by id DESC LIMIT 1 OFFSET 0";
        $dat = $this->datasql($sql);
        if($dat['saldo']=='')
            $saldo = 0;
        else
            $saldo = $dat['saldo'];
        return $saldo;
    }
    
    function konversi_sat($item_id){
        $sql = "SELECT * FROM item WHERE id='$item_id'";
        $dat = $this->datasql($sql);
        $sat1 = $dat['satuan_id_1'];
        $sat2 = $dat['satuan_id_2'];
        $sat3 = $dat['satuan_id_3'];
        $conv2 = $this->currency($dat['conv_2'],0);
        $conv3 = $this->currency($dat['conv_3'],0);
        $jml_sat = "";
        if($sat1!=''){
                $jml_sat.= "$sat1";
        }
        if($conv2>0){
                $jml_sat.= ", $sat2/$conv2 ";
        }
        if($conv3>0){
                $jml_sat.= ", $sat3/$conv3 ";
        }


        return $jml_sat;

    }
    
    
}
?>
