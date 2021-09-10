<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_mobile extends CI_Controller {

	public function index() {
			$id_rph = $this->session->userdata("id_rph");
			$d['pakan'] = $this->App_model->get_pakan_sapi();
			$d['pakan_keterangan'] = $this->App_model->get_pakan_sapi_keterangan();
			$d['judul'] = 'Data Pakan Sapi';	
			// $d['pemotongan_sapi_ggl_stts'] = $this->App_model->get_penerimaan_detail_rph2_no_tgl_stts1($id_rph,'','2');	
			$this->load->view('top_mobile',$d);
			$this->load->view('menu');
			$this->load->view('pakan/pakan_table_mobile.php');
			$this->load->view('bottommobile');
		
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
