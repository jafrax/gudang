<?php

class dropdown extends database{
    
    public function guru($attr=array('name'=>'guru_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                        'option_all'=>NULL)){
        $sql = "SELECT * FROM guru ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }

    public function kelas($attr=array('name'=>'kelas_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                        'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM kelas ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-mini';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }
    
    public function mapel($attr=array('name'=>'mapel_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM mapel ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }

    public function semester($attr=array('name'=>'semester_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM semester ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }
    
    public function tahun_akademik($attr=array('name'=>'tahun_akademik_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                                'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM tahun_akademik ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }
    //=================================================================

	public function propinsi($id){
		$sql = "SELECT * FROM propinsi ORDER BY id";
		$data = $this->fetchdata($sql);
                echo "<option value=''>Pilih</option>";
		foreach ($data as $dat) {
			if($id == $dat['id']){
				echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
			}else{
				echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
			}
		}
	}

	// fungsi menampilkan dropdown di form detail
	public function kabupaten($id, $propinsi_id){
		$sql = "SELECT * FROM kabupaten WHERE propinsi_id='".$propinsi_id."' ORDER BY id";
		$data = $this->fetchdata($sql);
                echo "<option value=''>Pilih</option>";
		foreach ($data as $dat) {
			if($id == $dat['id']){
				echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
			}else{
				echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
			}
		}
	}

	public function kecamatan($id, $kabupaten_id){
		$sql = "SELECT * FROM kecamatan WHERE kabupaten_id='".$kabupaten_id."' ORDER BY id";
		$data = $this->fetchdata($sql);
                echo "<option value=''>Pilih</option>";
		foreach ($data as $dat) {
			if($id == $dat['id']){
				echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
			}else{
				echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
			}
		}
	}

	public function desa($id, $kecamatan_id){
		$sql = "SELECT * FROM desa WHERE kecamatan_id='".$kecamatan_id."' ORDER BY id";
		$data = $this->fetchdata($sql);
                echo "<option value=''>Pilih</option>";
		foreach ($data as $dat) {
			if($id == $dat['id']){
				echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
			}else{
				echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
			}
		}
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
