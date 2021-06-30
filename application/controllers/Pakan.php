<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan extends CI_Controller {

	public function index() {
		if($this->session->userdata('id_role') <=4 ) {
			$id_rph = $this->session->userdata("id_rph");
			$d['pakan'] = $this->App_model->get_pakan_sapi();
			$d['pakan_keterangan'] = $this->App_model->get_pakan_sapi_keterangan();
			$d['judul'] = 'Data Pakan Sapi';	
			// $d['pemotongan_sapi_ggl_stts'] = $this->App_model->get_penerimaan_detail_rph2_no_tgl_stts1($id_rph,'','2');	
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('pakan/pakan_table.php');
			$this->load->view('bottom');
		}
		else {
			redirect("login");
		}
	}

	public function release(){
		date_default_timezone_set("Asia/Bangkok");
		$date = date("Ymd");
		if($this->input->post("ck_id_detail") != ''){
			$getNR = $this->db->query("SELECT max(nomor_release) as jml FROM trx_release")->row();
			$noRelease = $getNR->jml+1;
			foreach($this->input->post("ck_id_detail") as $data_id) {
				$get = $this->db->query("SELECT indnr,kode_obat,qty,DATE(tanggal)as tanggal FROM trx_pengobatan tp JOIN trx_rencana_detail trd ON tp.id_rencana_detail=trd.id_rencana_detail WHERE id_trx_pengobatan='$data_id'")->row();
					$fp = fopen("../interface/To/RP_".$noRelease."_".$date.".txt","a") or die("Unable to open file!");
					$fp1 = fopen("../interface/To_backup/RP_".$noRelease."_".$date.".txt","a") or die("Unable to open file!");
					$data1 = $get->indnr;
					$data2 = $get->kode_obat;
					$data3a = strpos($get->qty,'.');
					$data3b = strpos($get->qty,',');
					$data4 = str_replace("-","",$get->tanggal);
					if($data3a==''){
						if($data3b==''){
							$data3 = '000000000000000'.$get->qty.'00';
						}else{
							$data3 = '000000000000000'.number_format((float)$get->qty, 2, '', '');
						}
					}else{
						$data3 = '000000000000000'.number_format((float)$get->qty, 2, '', '');
					}
					$content = $data1.$data2.substr($data3,-8).$data4."\n";
					if($data1 != ''){
						fwrite($fp,$content);
						fclose($fp);
						fwrite($fp1,$content);
						fclose($fp1);
						$where['id_trx_pengobatan'] = $data_id;
						$inUpdate['status_release'] = 1;
						$inR['id_trx_pengobatan'] = $data_id;
						$inR['nomor_release'] = $noRelease;
						$this->db->insert("trx_release",$inR);
						$this->db->update("trx_pengobatan",$inUpdate,$where);
						$this->session->set_flashdata("success_release","Release Data Pengobatan Berhasil");
					}else{
						fclose($fp);
						fclose($fp1);
						unlink("../interface/To/RS_".$noRelease."_".$date.".txt");
						unlink("../interface/To_backup/RS_".$noRelease."_".$date.".txt");
						$this->session->set_flashdata("error_release","Sebagian Data Gagal Dirilis");
					}
			}
			redirect("Release_pengobatan");
		}else{
			$this->session->set_flashdata("error","Belum ada data yang dipilih, silahkan pilih data release terlebih dahulu");
			redirect("Release_pengobatan");
		}	
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
