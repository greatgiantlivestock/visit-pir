<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_mobile extends CI_Controller {

	public function index() {
			$id_rph = $this->session->userdata("id_rph");
			$d['pakan'] = $this->App_model->get_pakan_sapi_filter();
			$d['indnr'] = "";
			$d['desa'] = "";
			$d['combo_indnr'] = $this->App_model->get_combo_petani_index();
			$d['judul'] = 'Detail Realisasi Pengiriman Pakan';	
			$d['btn_nota'] = '<button style="border-radius: 25px;background:rgba(0,0,0,0.2);" class="btn btn-xs btn-primary"><i class="fa fa-search"> </i> Cek Pakan</button>';
			$this->load->view('top_mobile',$d);
			$this->load->view('menu');
			$this->load->view('pakan/pakan_table_mobile.php');
			$this->load->view('bottom');	
	}

	function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('indnr');
		$get=$this->db->query("SELECT desa FROM trans_index WHERE indnr = '$id' GROUP BY indnr")->row();
		$desa= $get->desa;
		if($modul=="desa"){
			echo strval($desa);
		}
		if($modul=="indnr"){
			echo strval($id);
		}
	}

	public function get_pakan_filter(){
			$id_rph = $this->session->userdata("id_rph");
			$d['pakan'] = $this->App_model->get_pakan_sapi_filter($this->input->post("indnr"));
			$d['indnr'] = $this->input->post("indnr");
			$d['desa'] = $this->input->post("desa");
			$d['combo_indnr'] = $this->App_model->get_combo_petani_index($this->input->post("indnr"));
			$d['judul'] = 'Detail Realisasi Pengiriman Pakan';	
			$d['btn_nota'] = '<button style="border-radius: 25px;background:rgba(0,0,0,0.2);" class="btn btn-xs btn-primary"><i class="fa fa-search"> </i> Cek Pakan</button>';
			$this->load->view('top_mobile',$d);
			$this->load->view('menu');
			$this->load->view('pakan/pakan_table_mobile.php');
			$this->load->view('bottom');
	}

	public function get_pengiriman() {
		// $id_pengiriman = $this->input->post("id_pengiriman");
		// $id_rph = $this->session->userdata("id_awo");
		$no = 1;	
		$get = $this->db->query("SELECT tp.*,nama_obat,trd.indnr,name1,desa FROM trx_pengobatan tp JOIN trx_rencana_detail trd ON tp.id_rencana_detail=trd.id_rencana_detail 
								JOIN mst_obat mo ON mo.kode_obat=tp.kode_obat WHERE status_release=0");
		echo '<table id="dataTables-example" class="table table-bordered">
					<thead>
						<tr>
							<th><input style="width:20px;height:20px;" type="checkbox" value="0"class="ceksemua" id="checkAll"/> All </th>
							<th>No.</th>
							<th>Nama Petani</th>
							<th>Lokasi</th>
							<th>Index</th>
							<th>Nama Obat</th>
							<th>Qty</th>
						</tr>
					</thead>
					<tbody>';
		foreach($get->result_array() as $data) { 
					echo '<tr>
							<td>
								<input style="width:20px;height:20px;" class="checksemua" id="rel_id" type="checkbox" name="ck_id_detail[]" value="'.$data['id_trx_pengobatan'].'">
								<span class="lbl"></span>
							</td>
							<td>'.$no.'</td>
							<td>'.$data['name1'].'</td>
							<td>'.$data['desa'].'</td>
							<td>'.$data['indnr'].'</td>
							<td>'.$data['nama_obat'].'</td>
							<td>'.$data['qty'].'</td>
						  </tr>';
		$no++; }
		echo		'</tbody>
				</table>';	
	}
}
